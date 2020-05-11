<?=$this->SetHeader()?>
<main class="containerMin">
    <div class="registration">
        <h1 class="center">Login</h1>
            <div class="row">
                <div class="col-4 labels">
                    <label for="email">Email</label>
                    <label  for="password">Enter password</label>
                </div>
                <div class="col-4 inputs">
                    <input id = 'email' name = 'email' type="text">
                    <input id = "password" value="" name = 'password' type="password">
                </div>
                <div class="col-4 buttons">
                    <div class="loginButton" onclick="logining()">
                        login
                    </div>
                    <div class="googleButton" >
                        login with Google
                    </div>
                </div>
            </div>
        <div id = "massage" class="massage">
    </div>
</main>
<?=$this->SetFooter()?>