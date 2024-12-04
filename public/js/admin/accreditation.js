$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#addAccreditationForm").on("submit", function (e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "/admin/accreditations/add",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                Swal.fire({
                    icon: "success",
                    title: "Berhasil!",
                    text: response.success,
                }).then(() => {
                    location.reload();
                });
            },
            error: function (xhr) {
                var errorMessage = "Terjadi kesalahan.";
                if (xhr.responseJSON && xhr.responseJSON.errors) {
                    // Menampilkan pesan error validasi jika ada
                    errorMessage = Object.values(xhr.responseJSON.errors).join(
                        ", "
                    );
                } else if (xhr.responseJSON && xhr.responseJSON.error) {
                    // Menampilkan error umum
                    errorMessage = xhr.responseJSON.error;
                }

                Swal.fire({
                    icon: "error",
                    title: "Gagal!",
                    text: errorMessage,
                });
            },
        });
    });

    $(".editAccreditationBtn").on("click", function () {
        var id = $(this).data("id");

        $.ajax({
            url: "/admin/accreditations/" + id + "/edit",
            method: "GET",
            success: function (response) {
                $("#edit_id").val(response.id);
                $("#edit_name").val(response.name);
                $("#edit_major_id").val(response.major_id);
                $("#edit_certificate_preview").text(
                    "Lihat Sertifikat: " + response.url_certificate
                );
            },
        });
    });

    $("#editAccreditationForm").on("submit", function (e) {
        e.preventDefault();
        var id = $("#edit_id").val();
        var formData = new FormData(this);

        $.ajax({
            url: "/admin/accreditations/" + id + "/update",
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            headers: {
                "X-HTTP-Method-Override": "PUT",
            },
            success: function (response) {
                Swal.fire({
                    icon: "success",
                    title: "Berhasil!",
                    text: response.success,
                }).then(() => {
                    location.reload();
                });
            },
            error: function (xhr) {
                Swal.fire({
                    icon: "error",
                    title: "Gagal!",
                    text: xhr.responseJSON.error || "Terjadi kesalahan.",
                });
            },
        });
    });

    $(".deleteAccreditationBtn").on("click", function () {
        var id = $(this).data("id");
        $("#delete_id").val(id);
    });

    $("#deleteAccreditationBtn").on("click", function () {
        var id = $("#delete_id").val();

        $.ajax({
            url: "/admin/accreditations/" + id + "/destroy",
            method: "DELETE",
            success: function (response) {
                Swal.fire({
                    icon: "success",
                    title: "Berhasil!",
                    text: response.success,
                }).then(() => {
                    location.reload();
                });
            },
            error: function (xhr) {
                Swal.fire({
                    icon: "error",
                    title: "Gagal!",
                    text: xhr.responseJSON.error || "Terjadi kesalahan.",
                });
            },
        });
    });
});
