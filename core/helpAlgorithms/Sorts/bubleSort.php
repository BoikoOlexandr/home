<?php


namespace core\helpAlgorithms\Sorts;
use core\helpAlgorithms\sort;
use core\helpAlgorithms\Sorts\int\sortAlgorithms;

class bubleSort extends sort implements sortAlgorithms
{

    //указатели на переменные родительского класса
    public  $performancePointer;
    private $arrayPointer;
    private $arrayLagePointer;
    public function __construct(&$array, &$arrayLarge, &$performance)
    {
        $this->performancePointer = &$performance;
        $performance = 0;
        $this->arrayPointer = &$array;
        $this->arrayLagePointer = &$arrayLarge;
    }
    //исполняемая функция
    public function Run()
    {
        $this->Algorithm($this->arrayPointer, $this->arrayLagePointer, $this->performancePointer);
    }
    /**
     * суть алгоритма:
     * слева на право по парно сравниваются элементы,
     * если не соответствуют условию меняются местами
     * при достижении конца масива начинает с начала
     * условие выхода за проход не было замен
     */
    public function Algorithm(&$array, &$arrayLarge, &$performance)
    {
        if(!isset($array)) {
            echo "Array is not set";
            return false;
        };

        $nextLap = false;
        $i = 1;
        while (true){
            $performance += 1;
            if($array[$i-1] > $array[$i])
            {
                $this->swap($array[$i-1],$array[$i]);
                $nextLap = true;
            }
                $i += 1;

            if($i == $arrayLarge)
            {
                if(!$nextLap)break;
                $i = 1;
                $nextLap = false;
            }
        }

        return true;
    }
}