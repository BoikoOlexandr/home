<?php


namespace controller;


use core\controller;

class userController extends controller
{
    private $cookie;
    private $user;

    public function __construct($di)
    {
        $this->InitComponents($di);
        $this->cookie   = $this->model->Get('cookie', $di);
        $this->user     = $this->model->Get('user' , $di);
    }

    public function FeedBack()
    {
        $this->view->Render('userFeedBack');
    }

    public function SendFeedBack()
    {
        $this->user->SendFeedBack();
    }
}