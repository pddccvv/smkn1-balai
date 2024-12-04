$(document).ready(function () {
    $("#year").datepicker({
        format: "yyyy",
        viewMode: "years",
        minViewMode: "years",
    });

    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#addAchievementForm").on("submit", function (e) {
        e.preventDefault();
        var formData = new FormData(this);

        $.ajax({
            url: "/admin/achievements/store",
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
                Swal.fire({
                    icon: "error",
                    title: "Gagal!",
                    text: xhr.responseJSON.error || "Terjadi kesalahan.",
                });
            },
        });
    });

    $(".editAchievementBtn").on("click", function () {
        var id = $(this).data("id");

        $.ajax({
            url: "/admin/achievements/" + id + "/edit",
            method: "GET",
            success: function (response) {
                $("#edit_id").val(response.id);
                $("#edit_name").val(response.name);
                $("#edit_member").val(response.member);
                $("#edit_champion").val(response.champion);
                $("#edit_year").val(response.year);

                if (response.certificate) {
                    $("#edit_certificate_preview").html(
                        "Lihat Sertifikat: " + response.certificate
                    );
                }

                $("#editAchievementModal").modal("show");
            },
            error: function () {
                alert("Gagal memuat data prestasi.");
            },
        });
    });

    $("#editAchievementForm").on("submit", function (e) {
        e.preventDefault();

        var id = $("#edit_id").val();
        var formData = new FormData(this);

        $.ajax({
            url: "/admin/achievements/" + id,
            method: "PUT",
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
                Swal.fire({
                    icon: "error",
                    title: "Gagal!",
                    text: xhr.responseJSON.error || "Terjadi kesalahan.",
                });
            },
        });
    });

    $(".deleteAchievementBtn").on("click", function () {
        var id = $(this).data("id");

        $("#deleteAchievementId").val(id);
        $("#deleteAchievementModal").modal("show");
    });

    $("#deleteAchievementForm").on("submit", function (e) {
        e.preventDefault();

        var id = $("#deleteAchievementId").val();

        $.ajax({
            url: "/admin/achievements/destroy/" + id,
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
