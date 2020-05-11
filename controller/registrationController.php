<?php


namespace controller;


use core\controller;

class registrationController extends controller
{
    private $login;
    private $registration;
    private $cookie;

    public function __construct($di)
    {
        $this->InitComponents($di);
        $this->registration  = $this->model->Get('registration', $di);
        $this->login  = $this->model->Get('login', $di);
        $this->cookie = $this->model->Get('cookie', $di);
    }
    /**
     * Render Login page
     */
    public function Login()
    {
        $this->view->Render('login');
    }

    /**
     *  render Registration page
     */
    public function EnterData()
    {
        $this->view->Render('registration');
    }
    ////////////////////////////ajax registration//////////////////////////
    /**
     * ajax
     */
    public function GenerateSalt()
    {
        $this->registration->GenerateSalt();
    }
    /**
     *
     */
    public function SavePassword()
    {
        $this->registration->SavePassword();
    }

    /**
     * boolean
     */
    public function CheckUserName()
    {
        print_r($this->registration->CheckUserName($this->get['user']));
    }
    public function SendLetter($email)
    {
        //$this->registration->SendLetter($email['email']);
    }
    //////////////////////////ajax login////////////////////////////
    /**
     *
     */
    public function GetSalt()
    {
        $this->login->GetSalt();
    }
    /**
     *
     */
    public function CheckLogin()
    {
        $this->login->CheckLogin();
    }
    ////////////////////////////////ajax logOut///////////////////////////
    public function LogOut()
    {
        $this->cookie->DeleteAllCookies();
    }
}