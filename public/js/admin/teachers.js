$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#formAdd").submit(function (e) {
        e.preventDefault();
        let formData = new FormData(this);

        // Validasi manual untuk memastikan kolom wajib diisi
        if (
            !formData.has("name") ||
            !formData.has("semester") ||
            !formData.has("class") ||
            !formData.has("major_id")
        ) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Semua kolom wajib diisi.",
            });
            return;
        }

        $.ajax({
            type: "POST",
            url: "/admin/subjects/add", // Sesuaikan URL endpoint untuk mata pelajaran
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                Swal.fire({
                    icon: "success",
                    title: "Berhasil!",
                    text: response.message,
                });
                $("#modalAdd").modal("hide");
                location.reload(); // Menyegarkan halaman setelah berhasil menambah data
            },
            error: function (xhr) {
                // Periksa apakah respons JSON memiliki property "errors"
                let errors = xhr.responseJSON?.errors;
                if (errors) {
                    // Jika ada error, tampilkan menggunakan SweetAlert
                    let errorMessages = Object.values(errors)
                        .map((err) => err[0])
                        .join("<br>");
                    Swal.fire({
                        icon: "error",
                        title: "Terjadi kesalahan",
                        html: errorMessages, // Menampilkan semua error dalam bentuk HTML
                    });
                } else {
                    // Jika tidak ada errors yang terstruktur, tampilkan pesan umum
                    Swal.fire({
                        icon: "error",
                        title: "Gagal menambah data",
                        text:
                            xhr.responseJSON?.message ||
                            "Terjadi kesalahan tidak terduga.",
                    });
                }
            },
        });
    });

    $(document).on("click", ".btn-edit", function () {
        let id = $(this).data("id");
        $.get("/admin/teachers/" + id + "/edit", function (response) {
            if (response.status === "success") {
                $("#edit-id").val(response.data.teacher.id);
                $("#edit-name").val(response.data.teacher.name);
                $("#edit-nip").val(response.data.teacher.nip);
                $("#edit-major_id").val(response.data.teacher.major_id);
                $("#modalEdit").modal("show");
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Guru tidak ditemukan",
                });
            }
        });
    });

    $("#formEdit").submit(function (e) {
        e.preventDefault();
        let id = $("#edit-id").val();
        let formData = new FormData(this);

        if (
            !formData.has("name") ||
            !formData.has("nip") ||
            !formData.has("major_id")
        ) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Semua kolom wajib diisi.",
            });
            return;
        }

        $.ajax({
            type: "POST",
            url: "/admin/teachers/" + id,
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                Swal.fire({
                    icon: "success",
                    title: "Berhasil!",
                    text: response.message,
                });
                $("#modalEdit").modal("hide");
                location.reload();
            },
            error: function (xhr) {
                let errors = xhr.responseJSON.errors;
                if (errors) {
                    Swal.fire({
                        icon: "error",
                        title: "Terjadi kesalahan",
                        text: JSON.stringify(errors),
                    });
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Gagal memperbarui data",
                    });
                }
            },
        });
    });

    $(document).on("click", ".btn-delete", function () {
        $("#delete-id").val($(this).data("id"));
        $("#modalDelete").modal("show");
    });

    $("#confirmDelete").click(function () {
        let id = $("#delete-id").val();
        $.ajax({
            type: "DELETE",
            url: "/admin/teachers/" + id,
            success: function (response) {
                Swal.fire({
                    icon: "success",
                    title: "Berhasil!",
                    text: response.message,
                });
                $("#modalDelete").modal("hide");
                location.reload();
            },
            error: function () {
                Swal.fire({
                    icon: "error",
                    title: "Gagal menghapus data",
                });
            },
        });
    });
});
