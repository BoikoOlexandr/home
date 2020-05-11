<?php


namespace models;


use core\controller;

class logOut extends controller
{
    private $salt;
    private $tableName = 'users';

    public function __construct($di)
    {
        $this->InitComponents($di);
    }

    public function logOut()
    {
        foreach ($_COOKIE as $key=>$value)
        {
            unset($_COOKIE[$key]);
            setcookie($key, '' , time()-3600, '/');
        }
    }
}