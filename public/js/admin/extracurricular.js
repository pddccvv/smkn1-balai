$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#addExtracurricularForm").submit(function (event) {
        event.preventDefault();
        const formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                Swal.fire({
                    icon: "success",
                    title: "Sukses",
                    text: response.message,
                }).then(() => {
                    location.reload();
                });
            },
            error: function (xhr) {
                Swal.fire({
                    icon: "error",
                    title: "Gagal",
                    text: "Gagal menambah ekstrakurikuler",
                });
            },
        });
    });

    window.showEditModal = function (id) {
        $.get(`/admin/extracurricular/${id}/edit`, function (data) {
            $("#editExtracurricularId").val(data.id);
            $("#editName").val(data.name);
            $("#editDescription").val(data.description);
            if (data.logo) {
                $("#editLogoPreview").attr("src", data.logo);
            } else {
                $("#editLogoPreview").attr("src", "/path/to/default-image.png");
            }
            $("#editExtracurricularModal").modal("show");
        });
    };

    $("#editExtracurricularForm").submit(function (event) {
        event.preventDefault();
        const id = $("#editExtracurricularId").val();
        const formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: `/admin/extracurricular/${id}/update`,
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                Swal.fire({
                    icon: "success",
                    title: "Sukses",
                    text: response.message,
                }).then(() => {
                    location.reload();
                });
            },
            error: function (xhr) {
                Swal.fire({
                    icon: "error",
                    title: "Gagal",
                    text: "Gagal memperbarui ekstrakurikuler",
                });
            },
        });
    });

    window.showDeleteModal = function (id) {
        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Ekstrakurikuler ini akan dihapus.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, Hapus!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "DELETE",
                    url: `/admin/extracurricular/${id}`,
                    success: function (response) {
                        Swal.fire({
                            icon: "success",
                            title: "Dihapus!",
                            text: response.message,
                        }).then(() => {
                            location.reload();
                        });
                    },
                    error: function (xhr) {
                        Swal.fire({
                            icon: "error",
                            title: "Gagal",
                            text: "Gagal menghapus ekstrakurikuler",
                        });
                    },
                });
            }
        });
    };
});
