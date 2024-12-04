$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#formAdd").submit(function (e) {
        e.preventDefault();
        let formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: "/admin/students/add",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                Swal.fire({
                    icon: "success",
                    title: "Berhasil",
                    text: response.message,
                });
                $("#modalAdd").modal("hide");
                location.reload();
            },
            error: function (xhr) {
                let message =
                    xhr.status === 400
                        ? xhr.responseJSON.message ||
                          "Terjadi kesalahan pada data yang dimasukkan."
                        : "Terjadi kesalahan: " +
                          JSON.stringify(xhr.responseJSON.errors);
                Swal.fire({
                    icon: "error",
                    title: "Gagal",
                    text: message,
                });
            },
        });
    });

    $(document).on("click", ".btn-edit", function () {
        let id = $(this).data("id");

        $.get("/admin/students/" + id + "/edit", function (response) {
            if (response.student) {
                // Tampilkan data siswa di form edit
                $("#edit-id").val(response.student.id);
                $("#edit-class").val(response.student.class);
                $("#edit-amount").val(response.student.amount);
                $("#edit-semester").val(response.student.semester);

                $("#current-major").text(response.student.major.name);

                let majorOptions = "";
                response.majors.forEach(function (major) {
                    majorOptions += `<option value="${major.id}" ${
                        major.id === response.student.major_id ? "selected" : ""
                    }>${major.name}</option>`;
                });
                $("#edit-major_id").html(majorOptions);

                $("#modalEdit").modal("show");
            } else {
                Swal.fire({
                    icon: "error",
                    title: "Siswa Tidak Ditemukan",
                    text: "Data siswa yang ingin diedit tidak ditemukan.",
                });
            }
        }).fail(function (xhr) {
            Swal.fire({
                icon: "error",
                title: "Terjadi Kesalahan",
                text: "Gagal memuat data siswa.",
            });
        });
    });

    $("#formEdit").submit(function (e) {
        e.preventDefault();
        let formData = new FormData(this);
        let id = $("#edit-id").val();

        $.ajax({
            type: "POST",
            url: "/admin/students/" + id,
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                Swal.fire({
                    icon: "success",
                    title: "Berhasil",
                    text: response.message,
                });
                $("#modalEdit").modal("hide");
                location.reload();
            },
            error: function (xhr) {
                let errors = xhr.responseJSON.errors;
                let errorMessage = "Terjadi kesalahan:\n";
                $.each(errors, function (key, value) {
                    errorMessage += `${value[0]}\n`;
                });

                Swal.fire({
                    icon: "error",
                    title: "Gagal",
                    text: errorMessage,
                });
            },
        });
    });

    $(document).on("click", ".btn-delete", function () {
        let id = $(this).data("id");
        $("#delete-id").val(id);
        $("#modalDelete").modal("show");
    });

    $("#confirmDelete").click(function () {
        let id = $("#delete-id").val();

        $.ajax({
            type: "DELETE",
            url: "/admin/students/" + id,
            success: function (response) {
                Swal.fire({
                    icon: "success",
                    title: "Berhasil",
                    text: response.message,
                });
                $("#modalDelete").modal("hide");
                $("#student-" + id).remove();
                location.reload();
            },
            error: function (xhr) {
                Swal.fire({
                    icon: "error",
                    title: "Terjadi kesalahan",
                    text:
                        "Terjadi kesalahan: " +
                        JSON.stringify(xhr.responseJSON.errors),
                });
            },
        });
    });
});
