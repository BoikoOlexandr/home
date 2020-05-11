<?php


namespace models;


use core\controller;

class user extends controller
{
    private $tableName = 'users';
    public function __construct($di)
    {
        $this->InitComponents($di);
    }

    public function SendFeedBack()
    {
        $userID = $this->GetUserIdBySessionId();
        print_r($this->post);
        $this->entyty
            ->SetTable('feedback')
                ->SetData('userName', $this->post['from'])
                ->SetData('value', $this->post['text'])
                ->SetData('userID', $userID)
            ->Save(false);
    }

    public function GetUserIdBySessionId()
    {
        $this->entyty
            ->SetTable('users')
            ->SetData('session', $_COOKIE['sessionId'])
            ->GetFromTable();
        return $this->entyty->GetData('ID');
    }



}