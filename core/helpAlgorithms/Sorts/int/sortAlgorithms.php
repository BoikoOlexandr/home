<?php


namespace core\helpAlgorithms\Sorts\int;


interface sortAlgorithms
{

    public function __construct(&$array, &$arrayLarge, &$performance);
    public function Run();
    public function Algorithm(&$array, &$arrayLarge, &$performance);

}