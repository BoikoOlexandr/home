<?php


namespace core\components\router;


class routeDependence
{
    private string $name;
    private string $url;
    private string $controller;
    private string $method;
    private $data;




    public function __construct($name, $url, $controller, $method)
    {
        $this->name = $name;
        $this->url = $url;
        $this->controller = $controller;
        $this->method = $method;
    }

    /**
     * @return
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param
     */
    public function setData(string $data): void
    {
        $this->data = $data;
    }


    /**
     * @return string
     */
    public function getController(): string
    {
        return $this->controller;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $controller
     */
    public function setController(string $controller): void
    {
        $this->controller = $controller;
    }

    /**
     * @param string $method
     */
    public function setMethod(string $method): void
    {
        $this->method = $method;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url): void
    {
        $this->url = $url;
    }

}