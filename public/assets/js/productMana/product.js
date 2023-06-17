var hostUrl = "";
var assetUrl = "";
var filePath = "assets/upload/";
var plusImgUrl = "";
var images = [];
const cntImage = 3;

$(document).ready(function () {
    hostUrl = $("#hostUrl").val();
    assetUrl = $("#assetUrl").val();
    plusImgUrl = $("#plusImgUrl").val();

    console.log($("#images").val());
    images = JSON.parse($("#images").val());

    initImages();
    displayImages();
});

const initImages = () => {
    const cnt = images.length;

    for (let i = 0; i < cntImage - cnt; i++) {
        images.push({
            name: "",
        });
    }
};

const displayImages = () => {
    images.forEach((e, i) => {
        const img_url =
            e.name === "" ? plusImgUrl : assetUrl + filePath + e.name;
        console.log(img_url);
        $(`#product_img_${i}`).attr("src", img_url);
    });
};

$(document).on("click", ".product_img_div img", function () {
    var input = document.createElement("input");
    input.type = "file";

    const thisObj = $(this);
    const id = thisObj.attr("id").split("_")[2];

    const _token = $("#_token").val();

    input.onchange = (e) => {
        var file = e.target.files[0];
        var formData = new FormData();
        formData.append("file", file);
        formData.append("filePath", filePath);
        formData.append("_token", _token);

        var postUrl = hostUrl + "/image/upload_path";

        $.ajax({
            type: "POST",
            url: postUrl,
            data: formData,
            contentType: false,
            enctype: "multipart/form-data",
            cache: false,
            processData: false,
            success: function (data, status) {
                images[id] = {
                    name: data,
                };

                const img_url = `${assetUrl}${filePath}${data}`;
                thisObj.attr("src", img_url);
            },
        });
    };
    input.click();
});

const checkData = () => {
    $("#images").val(JSON.stringify(images));
    return true;
};
