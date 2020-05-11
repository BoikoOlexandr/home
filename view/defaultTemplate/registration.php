
<?=$this->SetHeader()?>
<main class="containerMin">
    <div class="registration">
        <h1 class="center">Registration</h1>
            <div class="row">
                <div class="col-4 labels">
                    <label for="name">Enter Your Name</label>
                    <label  for="password">Enter password</label>
                    <label for="re-password"> Repeat password</label>
                    <label for="email">Email</label>
                </div>
                <div class="col-4 inputs">
                    <input id = 'name' autocomplete="off" name = 'name'type="text">
                    <input id = "password" autocomplete="off" value="" name = 'password' type="password">
                    <input id = "repeat" autocomplete="off" value="" name = 'repeat' type="password">
                    <input id = 'email' autocomplete="off" name = 'email' type="text">
                </div>
                <div class="col-4 buttons">
                    <div class="loginButton" onclick="Registr()">
                        Registration
                    </div>
                    <div class="googleButton" >
                        login with Google
                    </div>
                </div>
            </div>
            <div id = "massage" class="massage">
            </div>
    </div>
</main>
<?=$this->SetFooter()?>