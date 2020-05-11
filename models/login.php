<?php


namespace models;


use core\controller;

class login extends controller
{
    private $salt;
    private $tableName = 'users';
    private $cookie;

    public function __construct($di)
    {
        $this->InitComponents($di);
        $this->cookie = $this->model->Get('cookie', $di);
    }



    public function GetSalt()
    {
        $this->entyty
            ->SetTable($this->tableName)
            ->SetData('email',  $this->get['email'])
            ->GetFromTable();
        print_r($this->di->GetdataByKey('entyty')['salt']);
    }

    public function CheckLogin()
    {
        $this->entyty
            ->SetTable($this->tableName)
            ->SetData('email', $this->get['email'])
            ->GetFromTable();
        if( $this->get['hash'] == $this->di->GetDataByKey('entyty')['password'])
        {
            $this->cookie->SetStartCooke();
            print_r(true);
        }
        else print_r(false);
    }
}