const feedBacks = '';
$( function () {
    $.ajax({
        type: "GET",
        url: "/GetFeedBacks/",
        data: {},
        success: function (data) {
            data = feedBacks;
            console.log(data);

        }

    });
        const p = new Promise(function (resolve, reject) {
            resolve();

        })
            .then(function () {
            })
    }


);