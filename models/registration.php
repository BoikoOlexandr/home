<?php


namespace models;


use core\controller;

class registration extends controller
{
    private $tableName = 'users';
    private $salt;
    private $cookie;

    public function __construct($di)
    {
        $this->InitComponents($di);
        $this->cookie = $this->model->Get('cookie', $di);
    }

    public function GenerateSalt()
    {
        $this->salt =  time();

        $this->entyty
            ->SetTable($this->tableName)
                ->SetData('salt', $this->salt)
                ->SetData('userName',$this->get['user'])
                ->SetData('password','@')
                ->SetData('email',  $this->get['email'])
            ->Save(false);
        print_r($this->salt);
    }

    public function SavePassword()
    {
        $this->entyty
            ->SetTable($this->tableName)
            ->SetData('userName',  $this->get['user'])
            ->SetData('email',  $this->get['email'])
            ->GetFromTable();
        $this->entyty
            ->SetData('password', $this->get['hash']);
        $this->entyty
                ->Save(true);
        $this->cookie->SetStartCooke();
    }

    public function CheckUserName($email)
    {
        $this->entyty
            ->SetTable($this->tableName)
            ->SetData('email',  $this->get['email'])
            ->GetFromTable();
        if(
            isset($this->di->GetDataByKey('entyty')['error'])
        ){
            return false;
        }
        else{
            return true;
        }
    }


}