<?php


namespace controller;


use core\container\DI;
use core\controller;

class defaultController extends controller
{
    public $login;
    public $test;

    public function __construct($di)
    {
        $this->InitComponents($di);
        $this->login    = $this->model->Get('login',$di);
        $this->test     = $this->model->Get('test', $di);
    }

    public function Start()
    {
        $this->view->Render('home');
    }
    public function UserStart($str)
    {

        $this->login->SetCookie($str['name1']);
        $this->view->Render('home');
    }
    public function About()
    {
        echo 'This is '.__METHOD__.' and have data ';
    }
    public function AboutInt($data)
    {
        echo 'This is '.__METHOD__.' and have data ';
        print_r($data);
    }
    public function AboutStr($data)
    {
        echo 'This is '.__METHOD__.' and have data ';
        print_r($data);
    }
    /////////////////////////////////////////////////////////////////////////////
    public function Test()
    {
        $this->test->Test();
        //$this->view->Render('test');
    }

}