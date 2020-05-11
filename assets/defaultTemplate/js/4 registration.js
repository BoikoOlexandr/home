const   pageData ={
    password: '',
    rePassword: '',
    hash: '',
    email: '',
    name: '',
    error: '',
    message: '',
    salt: null,
    Init: function(){
        this.message = document.getElementById('massage');
        this.password = document.getElementById('password');
        this.rePassword = document.getElementById('repeat');
        this.email = document.getElementById('email');
        this.name = document.getElementById('name');
    }
};
const emailMask = /^[a-z0-9\-_.]+[@][a-z]+[.][a-z]+$/;
const nameMask = /^[a-zA-Z0-9а-яА-Я\- _*.:;()]{4,}$/;



function Registr() {
    pageData.Init();
    Chacked();

}

function nameRules() {
    pageData.name.value = pageData.name.value.trim();
    if(pageData.name.value == '')
    {
        pageData.error += 'Enter your name<br>';
    }else if((!nameMask.exec(pageData.name.value)))
    {
        pageData.error += 'Name mast have more then 3 symbols ' +
            'and can include symbols <strong>- _ * . : ; ( )</strong><br>';
    }
}
function passwordRules() {
    if (pageData.password.value == '' || pageData.rePassword.value == '') {
        pageData.error += 'Enter the password<br>';
    } else if (pageData.password.value != pageData.rePassword.value) {
        pageData.error += 'Different Passwords<br>';
    } else if (pageData.password.value.length <= 3) {
        pageData.error += 'Password mast have more then 3 symbols<br>';
    }
}
function emailRules(data) {

        return new Promise(function (resolve) {
            if (pageData.email.value == '') {
                pageData.error += 'Enter the email<br>';
            } else {
                pageData.email.value = pageData.email.value.toLowerCase();
                if (!emailMask.exec(pageData.email.value)) {
                    pageData.error += 'Enter valid email address<br>';
                }
            }
            if (pageData.error == '') {
                $.ajax({
                        type: "GET",
                        url: "/registration/CheckUserName/",
                        data: {
                            email: pageData.email.value,
                        },
                        success: function (ok) {
                            if (ok == true) {
                                pageData.error += 'Email address is already exist<br>';
                            }
                            resolve(pageData.error);
                        }
                    }
                )
            }
            else resolve(pageData.error);
        })
    }

function Chacked() {
            const p = new Promise(function (resolve, reject) {
                    pageData.error = '';
                   nameRules();
                   passwordRules();
                    resolve(pageData.error);
            }).
            then(() => emailRules() ).
            then(
                finData=>{
                    pageData.error = finData;
                    console.log(finData);
                    return new Promise(function (resolve, reject) {
                        pageData.message.innerHTML = pageData.error;
                        $('#massage').animate({opacity: 1}, 1000);
                        resolve();
                    })
                }
            ).
            then(()=>{
                if(pageData.error == '') {
                    const p = new Promise(function (resolve, reject) {
                        $.ajax({
                                type: "GET",
                                url: "/registration/reqSalt/",
                                data: {
                                    user: pageData.name.value,
                                    email: pageData.email.value,
                                },
                                success: function (data) {
                                    pageData.salt = data;
                                    resolve();
                                }
                            }
                        )
                    });
                    p.then(function () {
                            passSalt(pageData.salt);
                        }
                    )
                }
            })
}
function passSalt(data) {
    console.log(pageData.password.value);
    console.log(data);
    pageData.hash = CryptoJS.MD5(pageData.password.value+data);
    console.log(pageData.hash.toString());
    $.ajax({
        type: "GET",
        url: "/registration/check/",
        data: {
            user: pageData.name.value,
            email: pageData.email.value,
            hash:  pageData.hash.toString()
        },
        success: function (data) {
            window.location.href = '/';
        }
    })
}



