<?php


namespace core\components;


use core\helpAlgorithms\directoryHelper;

class view
{

    public string $template;
    public string $templatePath;
    public string $assetsPath;
    public $di;
    public $header;
    public $footer;
    public $css;
    public $js;
    public $images;

    public function __construct($di)
    {
        $this->di = $di;
    }


    public function InitDi()
    {
        $this->SetTemplate();
    }
    public function SetTemplate()
    {
        $template = $this->di->Get("configuration")->GetGlobalConfig('template');

        $this->template = $template."Template";

        $this->assetsPath = ds.'assets'.ds.$this->template.ds;
        $this->templatePath = ds.'view'.ds.$this->template.ds;

        $this->images = ds.'assets'.ds.$this->template.ds.'images'.ds;
        $this->GetCss();
        $this->GetJs();
    }

    private function SetHeader()
    {
        require_once dir.$this->templatePath.'header.php';
    }

    private function SetFooter()
    {
        require_once dir.$this->templatePath.'footer.php';
    }

    private function GetCss()
    {
        $listCss = directoryHelper::GetClassList($this->assetsPath.'css'.ds,'css');
        for ($i = 0; $i < count($listCss); $i++)
        {
            $this->css[$i] = $listCss[$i]["dir"].$listCss[$i]["class"].".css" ;
        }
    }

    private function GetJs()
    {
        $listCss = directoryHelper::GetClassList($this->assetsPath.'js'.ds,'js');
        for ($i = 0; $i < count($listCss); $i++)
        {
            $this->js[$i] = $listCss[$i]["dir"].$listCss[$i]["class"].".js" ;
        }
    }


    public function Render($page, $data=[])
    {
        $diData = &$this->di->GetData();
        require_once dir.$this->templatePath.$page.'.php';
    }

}