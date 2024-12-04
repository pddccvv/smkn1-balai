$(document).ready(function () {
    // Setup global AJAX settings
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    // Handle file input change (preview files before submit)
    $("#file").on("change", function () {
        var files = this.files;
        var preview = $("#file-preview");
        preview.empty(); // Mengosongkan area preview sebelumnya

        Array.from(files).forEach((file) => {
            var reader = new FileReader();
            reader.onload = function (e) {
                if (file.type.startsWith("video/")) {
                    // Jika file adalah video, tampilkan preview sebagai video
                    preview.append(
                        `<video width="100" controls>
                        <source src="${e.target.result}" type="${file.type}">
                        Your browser does not support the video tag.
                    </video>`
                    );
                }
            };
            reader.readAsDataURL(file);
        });
    });

    // Handle gallery form submission (multiple file upload)
    $("#galleryForm").on("submit", function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        var type = $("input[name='type']").val(); // Get the type value directly from hidden input

        // Log formData content to make sure video is included
        console.log("Form Data: ", formData);
        formData.forEach((value, key) => {
            console.log(key + ": " + value);
        });

        $.ajax({
            url: "/admin/galleries/" + type + "/store", // Correct URL with type
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                Swal.fire({
                    title: "Success!",
                    text: response.message,
                    icon: "success",
                    confirmButtonText: "OK",
                }).then(() => {
                    location.reload(); // Reload the page to show the uploaded gallery
                });
            },
            error: function (xhr, status, error) {
                console.error("XHR:", xhr);
                console.error("Status:", status);
                console.error("Error:", error);
                Swal.fire({
                    title: "Error!",
                    text: "There was an error: " + error,
                    icon: "error",
                    confirmButtonText: "OK",
                });
            },
        });
    });

    // Handle delete action
    window.deleteGallery = function (id, type) {
        $("#deletePhotoId").val(id);
        $("#deletePhotoModal").modal("show");
    };

    $("#deletePhotoForm").on("submit", function (e) {
        e.preventDefault();

        var id = $("#deletePhotoId").val();
        var type = "video"; // Set this dynamically based on your view's context (photo/video)

        $.ajax({
            url: "/admin/galleries/" + type + "/destroy/" + id,
            type: "DELETE",
            success: function (response) {
                Swal.fire({
                    title: "Deleted!",
                    text: response.message,
                    icon: "success",
                    confirmButtonText: "OK",
                }).then(() => {
                    location.reload();
                });
            },
            error: function (xhr, status, error) {
                Swal.fire({
                    title: "Error!",
                    text: "There was an error: " + error,
                    icon: "error",
                    confirmButtonText: "OK",
                });
            },
        });
    });
});
