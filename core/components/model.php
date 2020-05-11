<?php


namespace core\components;


use models\user;

class model
{
    private $di;



    public function __construct($di)
    {
        $this->di = $di;
    }


    public function InitDi()
    {

    }
//    public function __set($modelName, $di)
//    {
//        $modelName = "\models\\".$modelName;
//        $modelName = slashNamespasehReplase($modelName);
//        return new $modelName($di);
//    }

    public function Get($modelName, $di)
    {
        $modelName = "\models\\".$modelName;
        $modelName = slashNamespasehReplase($modelName);
        return new $modelName($di);
    }

}