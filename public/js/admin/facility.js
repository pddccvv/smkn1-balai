$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#addFacilityForm").submit(function (event) {
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
                    text: response.success,
                }).then(() => {
                    location.reload();
                });
            },
            error: function (xhr) {
                Swal.fire({
                    icon: "error",
                    title: "Gagal",
                    text: "Gagal menambah fasilitas",
                });
            },
        });
    });

    window.showEditModal = function (id) {
        $.get(`/admin/facility/${id}/edit`, function (data) {
            $("#editFacilityId").val(data.id);
            $("#editName").val(data.name);
            $("#editDescription").val(data.description);
            $("#editFacilityModal").modal("show");
        });
    };

    $("#editFacilityForm").submit(function (event) {
        event.preventDefault();
        const id = $("#editFacilityId").val();
        const formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: `/admin/facility/${id}/update`,
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                Swal.fire({
                    icon: "success",
                    title: "Sukses",
                    text: response.success,
                }).then(() => {
                    location.reload();
                });
            },
            error: function (xhr) {
                Swal.fire({
                    icon: "error",
                    title: "Gagal",
                    text: "Gagal memperbarui fasilitas",
                });
            },
        });
    });

    window.showDeleteModal = function (id) {
        Swal.fire({
            title: "Apakah Anda yakin?",
            text: "Fasilitas ini akan dihapus.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#d33",
            cancelButtonColor: "#3085d6",
            confirmButtonText: "Ya, Hapus!",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "DELETE",
                    url: `/admin/facility/${id}`,
                    success: function (response) {
                        Swal.fire({
                            icon: "success",
                            title: "Dihapus!",
                            text: response.success,
                        }).then(() => {
                            location.reload();
                        });
                    },
                    error: function (xhr) {
                        Swal.fire({
                            icon: "error",
                            title: "Gagal",
                            text: "Gagal menghapus fasilitas",
                        });
                    },
                });
            }
        });
    };
});
