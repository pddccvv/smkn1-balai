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

    $("#addGraduation").click(function (e) {
        e.preventDefault();
        let formData = new FormData();
        formData.append("major_id", $("#major_id").val());
        formData.append("year", $("#year").val());
        formData.append("file", $("#file")[0].files[0]);

        $.ajax({
            url: "/graduation",
            type: "POST",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                alert(response.message);
                location.reload();
            },
            error: function (xhr) {
                alert(xhr.responseJSON.message);
            },
        });
    });

    $(".btn-edit").click(function () {
        let id = $(this).data("id");
        $.ajax({
            url: `/graduation/${id}/edit`,
            type: "GET",
            success: function (response) {
                $("#editId").val(response.graduation.id);
                $("#editMajor_id").val(response.graduation.major_id);
                $("#editYear").val(response.graduation.year);
                $("#editModal").modal("show");
            },
        });
    });

    $("#editForm").submit(function (e) {
        e.preventDefault();
        let id = $("#editId").val();
        let formData = new FormData(this);

        $.ajax({
            url: `/graduation/${id}`,
            type: "PUT",
            data: formData,
            contentType: false,
            processData: false,
            success: function (response) {
                alert(response.message);
                location.reload();
            },
            error: function (xhr) {
                alert(xhr.responseJSON.message);
            },
        });
    });

    $(".btn-delete").click(function () {
        let id = $(this).data("id");
        $("#deleteForm").attr("action", `/graduation/${id}`);
        $("#deleteModal").modal("show");
    });
});
