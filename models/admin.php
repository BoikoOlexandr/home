<?php


namespace models;


use core\controller;

class admin extends controller
{
    public function __construct($di)
    {
        $this->InitComponents($di);
    }

    function GetFeedBacks()
    {

        $this->entyty
            ->SetTable('feedback')
            ->GetAllFromTables();
        return $this->di->getDataByKey('entyty');
    }

}