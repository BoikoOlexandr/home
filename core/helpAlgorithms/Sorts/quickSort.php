<?php


namespace core\helpAlgorithms\Sorts;


use core\helpAlgorithms\sort;
use core\helpAlgorithms\Sorts\int\sortAlgorithms;

class quickSort extends sort implements sortAlgorithms
{
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

    public function Run()
    {
        $this->Algorithm($this->arrayPointer, $this->arrayLagePointer, $this->performancePointer);
    }
    /**
     * подготовительная часть
     * выбираеться элемент посередине и сортируется относительно него далее рекурсивно до конца
     * @param $array . исходный масив
     * @param $arrayLarge . размер исходного масива
     * @param $performance .  каество алгоритма
     * @return bool
     */
    public function Algorithm(&$array, &$arrayLarge, &$performance)
    {
        if(!isset($array) || !is_array($array))
        {
            echo 'This is not a array';
            return false;
        }
        $left = 0;
        $right = $arrayLarge - 1;
        $this->QuickSortAlgorithm($performance, $array, $left, $right);
        return true;
    }
    /**
     * Основной алгоритм
     * выбор опорного элемента
     * пропуск элементов  с лева которые меньше опорного с права которые больше "сужение границ"
     * замена элементов после предидущего шага
     * далее по циклу пока граници не пересекутся
     * выбор новых границ для "левых" и "правых" подмасивов
     * запуск реурсивно
     */
    public function QuickSortAlgorithm(&$performance, &$array, $left, $right)
    {
       $performance+=1;
        $middleElement = $this->FindMiddle($array, $left, $right);
        $localLeft = $left;
        $localRight = $right;
        $middle = $array[$middleElement];
        do
        {
            $performance+=1;
            while($array[$localLeft] < $middle)
            {
                $localLeft++;
            }

            while($array[$localRight] > $middle)
            {
                $localRight--;
            }

            if($localLeft <= $localRight)
            {
                $performance+=1;
                $this->swap($array[$localLeft],$array[$localRight]);
                $localLeft++;
                $localRight--;
            }
        }while($localLeft <= $localRight);


      if($left < $localRight) {
           $this->QuickSortAlgorithm($performance, $array, $left, $localRight);

      }
      if($right > $localLeft) {
           $this->QuickSortAlgorithm($performance, $array, $localLeft, $right);

      }

    }

    public function FindMiddle(&$array, $start, $end)
    {
        $res[1] = $array[$start];
        $res[2] = $array[round(($end+$start)/2)];
        $res[3] = $array[$end];

       $sum = $res[1] + $res[2] + $res[3];
       $sum = round($sum/3);
       $res[1] = abs($sum - $res[1]);
       $res[2] = abs($sum - $res[2]);
       $res[3] = abs($sum - $res[3]);
       $min = 1;
       if($res[2] <= $res[$min])$min = 2;
       if($res[3] < $res[$min]) $min = 3;
       if($min == 1)return $start;
       if($min == 2)return round(($end+$start)/2)-1;
       if($min == 3)return $end;
    }

}

