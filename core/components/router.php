<?php


namespace core\components;


use core\components\router\routeInit;

class router
{

    private $di;
    public  $url;
    public $route;
    public $controller;

    public function __construct($di)
    {
        $this->di = $di;

    }

    public function InitDi()
    {
        $this->url = $_SERVER["REQUEST_URI"];
    }
    public function Run()
    {
        $routeInit = new routeInit();
        $this->InputGetPostData();
        $uri = explode('?', $_SERVER['REQUEST_URI'], 2);
        $this->url = $uri[0];
        $this->route = $routeInit->GetRoute($this->url);
        $this->CallMethod($routeInit->getData());
    }

    private function InputGetPostData()
    {
        $this->di->SetData('get',$_GET);
        $this->di->SetData('post',$_POST);
    }

    private function CallMethod($data)
    {
        $fullControllerName = ds.'controller'.ds.$this->route->getController();
        $fullControllerName = slashNamespasehReplase($fullControllerName);
        $this->controller = new $fullControllerName($this->di);
        if(!empty($data)) {
            $this->controller->{$this->route->getMethod()}($data);
        }else{
            $this->controller->{$this->route->getMethod()}();
        }
    }

}