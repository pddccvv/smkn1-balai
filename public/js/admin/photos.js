$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#file").on("change", function () {
        var files = this.files;
        var preview = $("#file-preview");
        preview.empty();

        Array.from(files).forEach((file) => {
            var reader = new FileReader();
            reader.onload = function (e) {
                preview.append(
                    `<img src="${e.target.result}" width="100" class="mb-2">`
                );
            };
            reader.readAsDataURL(file);
        });
    });

    $("#galleryForm").on("submit", function (e) {
        e.preventDefault();

        var formData = new FormData(this);
        var type = $("input[name='type']").val();

        $.ajax({
            url: "/admin/galleries/" + type + "/store",
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

    window.deleteGallery = function (id, type) {
        $("#deletePhotoId").val(id);
        $("#deletePhotoModal").modal("show");
    };

    $("#deletePhotoForm").on("submit", function (e) {
        e.preventDefault();

        var id = $("#deletePhotoId").val();
        var type = "photo";

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
