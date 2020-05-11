<?php


namespace models;


use core\controller;

class cookie extends controller
{
    public function __construct($di)
    {
        $this->InitComponents($di);
    }
    //cookie:   sessionID -> hash User Id + UserName + role
    //          userName -> userName
    //          role    -> admin/user
    public function SetStartCooke()
    {
        $sessionId = md5(
            $this->di->GetdataByKey('entyty')['ID'].
                $this->di->GetdataByKey('entyty')['userName'].
                $this->di->GetdataByKey('entyty')['role']
        );
        $this->entyty
            ->SetData('session', $sessionId)
            ->Save(true);
        setcookie('userName',  $this->di->GetdataByKey('entyty')['userName'], 0, '/');
        setcookie('sessionId', $sessionId , 0, '/');
        setcookie('role',  $this->di->GetdataByKey('entyty')['role'], 0, '/');
    }

    public function DeleteAllCookies()
    {
        $this->entyty
            ->SetTable('users')
            ->SetData('session', $_COOKIE['sessionId'])
            ->GetFromTable();
        $this->entyty
            ->SetData('session', 0)
            ->Save(true);
        foreach ($_COOKIE as $key => $value) {
            unset($_COOKIE[$key]);
            setcookie($key, '', time() - 3600, '/');
        }
    }
}