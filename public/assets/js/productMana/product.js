$(document).ready(function () {
    viewDataTable();
});

function viewDataTable(page) {
    if (page == undefined) {
        page = 1;
    }
    const pageSize = $("#pageSize").val();

    $.get(
        "/product/list",
        {
            page: page,
            pageSize: pageSize,
        },
        function (data) {
            if (data == "DateError") {
                toastr.warning("アクセス権はありません。");
                $("#data_div").html(str);
                return;
            }
            $("#data_div").html(data);
        }
    );
}

function showDataModal() {
    $("#dataModal").modal("show");
    getOxRegisterNumberListByPastoral();
}

function closeDataModal() {
    $("#dataModal").modal("hide");
}
