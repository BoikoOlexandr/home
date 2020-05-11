const user ={
    password: '',
    email: '',
    salt: '',
    hash: '',
};

function logining() {

    user.password = document.getElementById("password").value;
    user.email = document.getElementById("email").value;

    const p = new Promise(function (resolve, reject) {
        user.email = document.getElementById("email").value;
        $.ajax({
            type: "GET",
            url: "/getSalt/",
            data: {
                email: user.email,
            },
            success: function (data) {
               // console.log(data);
                user.salt =  data;
                resolve();
            }
        })
    }).then(()=>{
        console.log(user.password);
        console.log(user.salt);
        user.hash = CryptoJS.MD5(user.password + user.salt);
        console.log(user.hash.toString());
        $.ajax({
            type: "GET",
            url: "/checkLogin/",
            data: {
                email: user.email,
                hash: user.hash.toString()
            },
            success: function (data) {
                if(data)
                    window.location.href = "/";
                else{
                    document.getElementById('massage').innerHTML = '<p>Wrong email or password</p>';
                    $('#massage').animate({opacity: 1}, 1000);
                }
            }
        })
    });


}

function getSalt() {


}