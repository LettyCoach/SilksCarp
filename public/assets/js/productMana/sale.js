const checkData = () => {
    if (!window.confirm("本当に購入しますか？")) {
        return false;
    }
    return true;
};
