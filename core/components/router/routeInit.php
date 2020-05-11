<?php


namespace core\components\router;


use core\components\router;

class routeInit
{

    public $container;
    private array $data = [];
    private array $types = [
        "str",
        "int"
    ];
    private array $pregTypes =[
        "str" => '/^([0-9a-zA-Z@_\.\-]+)$/',
        "int" => '/^[0-9]+$/'
    ];
    private $index = null;
    public function __construct()
    {
        $this->InitializeRoutes();
    }

    public function Add($name, $url, $controller, $method)
    {
       $this->container[$name] = new routeDependence($name, $url, $controller, $method);
    }

    public function InitializeRoutes()
    {
        require_once dir.ds.'routes.php';

    }

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }
    public function GetRoute($url)
    {
        foreach ($this->container as $item)
        {
            if(
                $this->CheckUrl($url, $item->getUrl())
            ) {
                return $item;
            }
        }
        $this->data = [
          "error" => $url
        ];
        return $this->container["routerError"];
    }

    public function CheckUrl($url1, $url2)
    {
        $url = preg_split('%/%', $url1, -1, PREG_SPLIT_NO_EMPTY );
        $rule = preg_split('%/%', $url2, -1, PREG_SPLIT_NO_EMPTY );
        $OK = true;
        if(count($url)!=count($rule))return false;
        for($i = 0; $i < count($url); $i++) {

            if (!isset($rule[$i])) return false;

            if (preg_match($this->Preg($rule[$i], $i), $url[$i])) {
                if(isset($this->index))
                {
                    $this->data[$this->index] = $url[$i];
                }

                $OK = true;
            }
            else return false;
        }
        return $OK;
    }

    private function Preg($rule, $i)
    {
        foreach($this->types as $type)
        {
            if(preg_match($this->Match($type) , $rule))
            {
                $this->Replace($type,$rule);
                return $this->pregTypes[$type];
            }
        }
        $this->index = null;
        return '/' . $rule . '/';
    }

    private function Match($type)
    {
        return"/^(\{\(".$type.":)[0-9a-zA-Z]+(\)\})$/";
    }

    private function Replace($type, $rule)
    {
        $this->index = preg_replace("/(\{\(".$type.":)|(\)\})/",'',$rule);
        return 0;
    }

}



