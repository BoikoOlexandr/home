<?php


namespace core\helpAlgorithms;

use core\helpAlgorithms\Sorts\bubleSort;
use core\helpAlgorithms\Sorts\combSort;
use core\helpAlgorithms\Sorts\quickSort;
use core\helpAlgorithms\Sorts\shakerSort;

class sort
{
    //Контейнер всех алгоритмов сортировки
    protected array $sortContainer;
    //Исходный массив не обрабатывается
    protected array $array;
    //количество элементов массива передается по ссылке
    protected int $arraySize;
    //"сортированый массив" копия масива передается по ссылке
    protected array $sortedArray;
    //"качество" алгоритмов сортировки передается по ссылке
    protected int $performance = 0;

    public function getSortedArray()
    {
        return $this->sortedArray;
    }

    public function GetPerformance()
    {
        return $this->performance;
    }

    public function SetArray($array)
    {
        $this->array = $array;
        $this->sortedArray = $this->array;
        $this->arraySize = count($array);
        $this->InitializeSortAlgorithms();
    }

    public function GetArray()
    {
        return $this->array;
    }

    public function GetSort($className)
    {
        $algorithmName = $this->PtotectAlgorithmName($className);
        return $this->sortContainer[$algorithmName];
    }

    public function GetSortList()
    {
        return directoryHelper::GetClassList('core/helpAlgorithms/Sorts/');
    }

    public function SetRandomArray($large, $min = 0, $max = 100)
    {
        $this->arraySize = $large;
        if(!isset($this->array)) {
            for ($i = 0; $i < $large; $i += 1)
                $this->array[$i] = rand($min, $max);

            $this->sortedArray = $this->array;
            $this->InitializeSortAlgorithms();
            return true;
        }
        else{
            return false;
        }
    }

    private function SetSortContainer($name, $class)
    {
        $this->sortContainer[$name] = $class;
    }
    //Создание контейнера
    public function InitializeSortAlgorithms()
    {
        foreach($this->GetSortList() as $className)
        {
            $fullClassName = 'core\helpAlgorithms\Sorts\\'.$className;
            $class = new $fullClassName($this->sortedArray, $this->arraySize, $this->performance);
            $this->SetSortContainer($className, $class);
        }
    }
    //"упрощенное" записывние названий сортировок
    private function PtotectAlgorithmName(string $className)
    {
        $classList = $this->GetSortList();
        $found = false;
        foreach ($classList as $item)
        {
            $pattern = '/'.$className.'/i';
            if(preg_match($pattern,$item)){
                if(!$found){
                    $found = true;
                    $resolt = $item;
                }
                else {
                    echo 'Не правильное имя сортировки';
                    exit();
                }
            }
        }
        return $resolt;
    }
    //очистка масивов
    public function unsetArrays()
    {
        unset($this->array);
        unset($this->sortedArray);
    }
    //замена элементов обычно Масива для дочерних классов
    protected function swap(&$a, &$b)
    {
        $temp = $a;
        $a = $b;
        $b = $temp;
    }
}