$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#formAddSubject").submit(function (e) {
        e.preventDefault();
        let formData = new FormData(this);

        $.ajax({
            type: "POST",
            url: "/admin/subjects/store",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                Swal.fire({
                    icon: "success",
                    title: "Berhasil!",
                    text: response.message,
                });
                $("#addSubjectModal").modal("hide");
                location.reload();
            },
            error: function (xhr) {
                let message = xhr.responseJSON.message || "Terjadi kesalahan";
                Swal.fire({
                    icon: "error",
                    title: "Gagal menambah data",
                    text: message,
                });
            },
        });
    });

    $(document).on("click", ".btn-edit", function () {
        const subjectId = $(this).data("id");

        $.ajax({
            url: `/admin/subjects/${subjectId}/edit`,
            method: "GET",
            success: function (response) {
                const subject = response.subject;
                const majors = response.majors;
                const classes = response.classes;
                const semesters = response.semesters;

                $("#edit-major_id").val(subject.major_id);

                const classDropdown = $("#edit-class");
                classDropdown.empty();
                classes.forEach(function (cls) {
                    classDropdown.append(
                        `<option value="${cls}" ${
                            cls == subject.class ? "selected" : ""
                        }>${cls}</option>`
                    );
                });

                const semesterDropdown = $("#edit-semester");
                semesterDropdown.empty();
                semesters.forEach(function (sem) {
                    semesterDropdown.append(
                        `<option value="${sem}" ${
                            sem == subject.semester ? "selected" : ""
                        }>${sem}</option>`
                    );
                });

                if (subject.photo) {
                    $("#edit-photo-preview").attr(
                        "src",
                        "/storage/" + subject.photo
                    );
                } else {
                    $("#edit-photo-preview").attr("src", "");
                }

                $("#formEdit").data("id", subjectId);

                $("#editSubjectModal").modal("show");
            },
            error: function () {
                Swal.fire({
                    icon: "error",
                    title: "Data tidak ditemukan",
                });
            },
        });
    });

    $("#formEdit").submit(function (e) {
        e.preventDefault();

        const subjectId = $("#formEdit").data("id");

        let formData = new FormData(this);
        formData.append("_method", "PUT");

        $.ajax({
            url: `/admin/subjects/${subjectId}`,
            method: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                Swal.fire({
                    icon: "success",
                    title: "Berhasil!",
                    text: response.message,
                });
                $("#editSubjectModal").modal("hide");
                location.reload();
            },
            error: function (xhr) {
                let message = xhr.responseJSON.message || "Terjadi kesalahan";
                Swal.fire({
                    icon: "error",
                    title: "Terjadi kesalahan",
                    text: message,
                });
            },
        });
    });

    $(document).on("click", ".btn-delete", function () {
        const subjectId = $(this).data("id");

        Swal.fire({
            title: "Yakin ingin menghapus?",
            text: "Data yang dihapus tidak dapat dikembalikan.",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, hapus!",
            cancelButtonText: "Batal",
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: `/admin/subjects/${subjectId}`,
                    method: "DELETE",
                    success: function (response) {
                        Swal.fire({
                            icon: "success",
                            title: "Berhasil!",
                            text: response.message,
                        });
                        location.reload();
                    },
                    error: function () {
                        Swal.fire({
                            icon: "error",
                            title: "Terjadi kesalahan",
                        });
                    },
                });
            }
        });
    });
});
