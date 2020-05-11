<?php


namespace controller;


class errorController
{
    public function NoRotes($data)
    {
        echo 'This is '.__METHOD__.' and have data ';
        print_r($data);
    }
}