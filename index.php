<?php

use \core\helpAlgorithms\sort;

define("dir", __DIR__);
define("ds", DIRECTORY_SEPARATOR);

function register($class){
    $class = str_replace("\\", ds, $class);
   include $class.'.php';
}

spl_autoload_register('register');




$url = '/';
require_once dir.ds.'core'.ds.'boot.php';


////
//$sort = new sort();
//$sort->SetRandomArray(100000);
//$sort->GetSort('q')->Run();


////$sort->SetArray([6,5,3,8,5,0,3,5,54,8]);
////
//print_r($sort->GetPerformance());

//$test = new \core\helpAlgorithms\Sorts\Test\testAlgorithms(1000);
//$test->SetSorType(3);
//$test->Test(5000);
//echo $test->Avarage();
//
//$test = new \core\helpAlgorithms\Test\testAlgorithms();
//$test->Demo(1000, 100);
//$test->Analize();
