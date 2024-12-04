$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });

    $("#addUserForm").on("submit", function (event) {
        event.preventDefault();

        $.ajax({
            type: "POST",
            url: $(this).attr("action"),
            data: $(this).serialize(),
            success: function (response) {
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: response.message,
                }).then(() => {
                    location.reload();
                });
            },
            error: function (xhr) {
                let errors = xhr.responseJSON.errors;
                let errorMessage = "";
                for (const key in errors) {
                    errorMessage += errors[key].join(", ") + "\n";
                }
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: errorMessage,
                });
            },
        });
    });

    window.showEditModal = function (user_id) {
        $.get(`/admin/users/${user_id}/edit`, function (data) {
            $("#editUserId").val(data.user_id);
            $("#editName").val(data.name);
            $("#editEmail").val(data.email);
            $("#editRole").val(data.role);
            $("#editModal").modal("show");
        });
    };

    $("#editForm").submit(function (e) {
        e.preventDefault();

        const user_id = $("#editUserId").val();
        const data = {
            name: $("#editName").val(),
            email: $("#editEmail").val(),
            role: $("#editRole").val(),
            password: $("#editPassword").val() || null,
        };

        $.ajax({
            url: `/admin/users/${user_id}/update`,
            type: "PUT",
            data: data,
            success: function () {
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: "User updated successfully.",
                }).then(() => {
                    location.reload();
                });
            },
            error: function (xhr) {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Error updating user: " + xhr.statusText,
                });
                // console.log(xhr.responseText);
            },
        });
    });

    window.showDeleteModal = function (user_id) {
        $("#deleteUserId").val(user_id);
        $("#deleteModal").modal("show");
    };

    $("#confirmDelete").click(function () {
        const user_id = $("#deleteUserId").val();

        $.ajax({
            url: `/admin/users/${user_id}/delete`,
            type: "DELETE",
            data: {
                _token: $('meta[name="csrf-token"]').attr("content"),
            },
            success: function (response) {
                Swal.fire({
                    icon: "success",
                    title: "Deleted",
                    text: response.message,
                }).then(() => {
                    location.reload();
                });
            },
            error: function (xhr) {
                Swal.fire({
                    icon: "error",
                    title: "Error",
                    text: "Gagal menghapus pengguna.",
                });
            },
        });
    });
});
