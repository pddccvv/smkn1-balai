$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#addMajorForm").submit(function (event) {
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
                    title: "Berhasil",
                    text: response.success,
                    timer: 6000,
                    timerProgressBar: true,
                });
                location.reload();
            },
            error: function (xhr) {
                Swal.fire({
                    icon: "error",
                    title: "Gagal",
                    text: "Gagal menambah jurusan",
                });
            },
        });
    });

    window.showEditModal = function (id) {
        $.get(`/admin/majors/${id}/edit`, function (data) {
            $("#editMajorId").val(data.id);
            $("#editName").val(data.name);
            $("#editDescription").val(data.description);
            $("#editMajorModal").modal("show");
        });
    };

    $("#editMajorForm").submit(function (event) {
        event.preventDefault();
        const id = $("#editMajorId").val();
        const formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: `/admin/majors/${id}/update`,
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                Swal.fire({
                    icon: "success",
                    title: "Berhasil",
                    text: response.success,
                    timer: 6000,
                    timerProgressBar: true,
                });
                location.reload();
            },
            error: function (xhr) {
                Swal.fire({
                    icon: "error",
                    title: "Gagal",
                    text: "Gagal memperbarui jurusan",
                });
            },
        });
    });

    window.showDeleteModal = function (id) {
        $("#deleteMajorForm").attr("action", `/admin/majors/${id}`);
        $("#deleteMajorModal").modal("show");
    };

    $("#deleteMajorForm").submit(function (event) {
        event.preventDefault();

        $.ajax({
            type: "DELETE",
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function (response) {
                Swal.fire({
                    icon: "success",
                    title: "Berhasil",
                    text: response.success,
                    timer: 6000,
                    timerProgressBar: true,
                });
                location.reload();
            },
            error: function (xhr) {
                Swal.fire({
                    icon: "error",
                    title: "Gagal",
                    text: "Gagal menghapus jurusan",
                });
            },
        });
    });
});
