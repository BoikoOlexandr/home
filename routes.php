<?php

// int mast be higher
//test
$this->Add('test1', "/test/", "defaultController", "Test");

//default
$this->Add('start', "/", "defaultController", "Start");
$this->Add('about', "/about/", "defaultController", "About");
$this->Add('about2', "/about/{(int:someName)}/", "defaultController", "AboutInt");
$this->Add('about1', "/about/{(str:name1)}/{(str:name2)}/{(int:name4)}/", "defaultController", "AboutStr");

//registrations
$this->Add('registration', "/registation/", "registrationController", "EnterData");
$this->Add('registrationAjax1', "/registration/reqSalt/", "registrationController", "GenerateSalt");
$this->Add('regisrationAjax2', "/registration/check/", "registrationController", "SavePassword");
$this->Add('regisrationAjax3', "/registration/CheckUserName/", "registrationController", "CheckUserName");
$this->Add('sendLetter', '/registation/sendLetter/{(str:email)}', "registrationController", "SendLetter");

//login
$this->Add('login', "/login/", "registrationController", "Login");
$this->Add('loginAjax1', "/getSalt/", "registrationController", "GetSalt");
$this->Add('loginAjax2', "/checkLogin/", "registrationController", "CheckLogin");
//logOut
$this->Add('logOutAjax1', "/logOut/", "registrationController", "LogOut");
//feedBack
$this->Add('userFeedBack', "/writeFeedBack/", "userController", "FeedBack");
$this->Add('sendFeedBackAjax1', "/SendFeedBack/", "userController", "SendFeedBack");
$this->Add('showFeedBackAdmin', "/ShowFeedBacks/", "adminController", "ShowFeedBacks");
$this->Add('GetFeedBacksAdminAjax1', "/GetFeedBacks/", "adminController", "GetFeedBacks");
//// errors
$this->Add('routerError', "", "errorController", "NoRotes");