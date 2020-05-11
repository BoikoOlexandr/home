<?php


namespace models;


use core\controller;

class test extends controller
{
    private $tableName = 'users';

    public function __construct($di)
    {
        $this->InitComponents($di);
    }

    public function Test()
    {
        $this->entyty->SetTable($this->tableName)
                ->SetData('ID', 67)
                ->GetFromTable();


        $this->entyty
            ->SetData('session', 'someSesions')
            ->Save(true);
        print_r($this->di->GetDataByKey('entyty'));
    }
}