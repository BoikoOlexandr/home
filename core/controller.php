<?php


namespace core;


use core\components\view;

abstract class controller
{
    protected $di;
    protected $configuration;
    protected $view;
    protected $model;
    protected $dataBase;
    protected $router;
    protected $data;
    protected $get;
    protected $post;
    protected $entyty;

    /**
     * controller constructor.
     * @param $di
     */
    abstract public function __construct($di);

    public function InitComponents($di)
    {
        $this->di               =   $di;

        $this->model            =   $di->Get("model");
        $this->view             =   $di->Get("view");
        $this->configuration    =   $di->Get("configuration");
        $this->dataBase         =   $di->Get("dataBase");
        $this->router           =   $di->Get("router");
        $this->entyty           =   $di->Get("entyty");

        $this->data             =   &$di->Getdata();
        $this->get              =   $this->data['get'];
        $this->post              =   $this->data['post'];

    }
}