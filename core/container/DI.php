<?php


namespace core\container;


use core\helpAlgorithms\directoryHelper;

class DI
{
    //переменная контейнер в которой будут хранится все другие переменные
    //далее гетер и сетер для нее!
    private array $container = [];
    private array $data = [];


    public function Set($key, $value)
    {
        if(!array_key_exists($key, $this->container)) {
            $this->container[$key] = $value;
        }
        else{
            echo "Class ".$key." already exist!";
        }
    }

    public function Get($key)
    {
        if(array_key_exists($key, $this->container))
        {
            return $this->container[$key];
        }
        else{
            echo 'There are no '.$key.' in container!';
            return false;
        }
    }

    public function InitDependeces()
    {
        $list = directoryHelper::GetClassList(ds."core".ds."components".DIRECTORY_SEPARATOR);
        foreach($list as $item)
        {
            $fulclass = $item["dir"].$item["class"];
            $fulclass = slashNamespasehReplase($fulclass);
            $this->Set($item["class"], new $fulclass($this));
        }
        foreach($list as $item)
        {
            $this->Get($item["class"])->InitDi();
        }
    }

    /**
     * @return bool
     */
    public function getData() :array
    {
        return $this->data;
    }

    public function getDataByKey($key)
    {
        if(array_key_exists($key, $this->data))
        {
            return $this->data[$key];
        }
        else {
            echo 'There are no '.$key.' in data';
            return false;
        }
    }

    /**
     * @param array $data
     */
    public function setData($key, $value)
    {
        $this->data[$key] = $value;
    }
}