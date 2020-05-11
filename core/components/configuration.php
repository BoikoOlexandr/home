<?php


namespace core\components;



class configuration
{
    private $di;
    private array $globalConfig;



    public function __construct($di)
    {
        $this->di = $di;
    }

    public function InitDi()
    {
        $this->InitGlobalConfig();
    }

    public function GetGlobalConfig($key)
    {
        if(isset($this->globalConfig[$key]))
        {
            return $this->globalConfig[$key];
        }else{
            echo "There are no $key in Global Configurations";
            return 0;
        }
    }

    public function InitGlobalConfig()
    {
        $this->di->Get("dataBase")->Query('SELECT * FROM `configuration` WHERE 1');
        $db = $this->di->getDataByKey('Query');

        foreach ($db as $key=>$value)
        {
            $this->globalConfig[$value['type']] = $value['value'];
        }
   }

    private function Replace()
    {

    }





}