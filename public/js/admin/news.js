$('form[action="/admin/addnews"]').on("submit", function (event) {
    event.preventDefault();

    $.ajax({
        url: $(this).attr("action"),
        type: "POST",
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function (response) {
            alert(response.success);
            $('form[action="/admin/addnews"]').trigger("reset");
            location.reload();
        },
        error: function (xhr) {
            var errors = xhr.responseJSON.errors;
            var errorMsg = "Gagal: ";
            for (var key in errors) {
                errorMsg += errors[key].join(", ") + "\n";
            }
            alert(errorMsg);
        },
    });
});

$("body").on("submit", 'form[id^="editModal"]', function (event) {
    event.preventDefault();

    var news_id = $(this).attr("action").split("/").pop();
    $.ajax({
        url: $(this).attr("action"),
        type: "POST",
        data: new FormData(this),
        contentType: false,
        processData: false,
        success: function (response) {
            alert(response.success);
            $("#editModal" + news_id).modal("hide");
            location.reload();
        },
        error: function (xhr) {
            var errors = xhr.responseJSON.errors;
            var errorMsg = "Gagal: ";
            for (var key in errors) {
                errorMsg += errors[key].join(", ") + "\n";
            }
            alert(errorMsg);
        },
    });
});

$("body").on("submit", 'form[id^="deleteModal"]', function (event) {
    event.preventDefault();

    var news_id = $(this).attr("action").split("/").pop();
    $.ajax({
        url: $(this).attr("action"),
        type: "POST",
        data: $(this).serialize(),
        success: function (response) {
            alert(response.success);
            $("#deleteModal" + news_id).modal("hide");
            location.reload();
        },
        error: function (xhr) {
            alert("Gagal menghapus berita: " + xhr.responseText);
        },
    });
});
