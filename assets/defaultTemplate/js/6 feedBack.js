function SendFeedBack() {
    $.ajax({
        type: "POST",
        url: "/SendFeedBack/",
        data: {
            from: document.getElementById('fromFeedBack').value,
            text: document.getElementById('textFeedBack').value,
        },
        success: function (ok) {
            console.log(ok);
        }
    })
}