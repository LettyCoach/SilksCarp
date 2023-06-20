const changeStoreState = (value) => {
    if (value === "0") {
        $("#destination").attr("disabled", true);
    } else {
        $("#destination").attr("disabled", false);
    }
};

const checkData = () => {
    if (!window.confirm("本当に購入しますか？")) {
        return false;
    }

    const store_state = $("#store_state").val();

    if (store_state === "0") {
        $("#destination").attr("disabled", false);
        $("#destination").val(".");
    }
    return true;
};
