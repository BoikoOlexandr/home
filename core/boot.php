<?php

use \core\container\DI;

function slashNamespasehReplase($str)
{
    return str_replace(ds,'\\', $str);
}

$di = new DI();
$di->InitDependeces();
$di->Get('router')->Run();

