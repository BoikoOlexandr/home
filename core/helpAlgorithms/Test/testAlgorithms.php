<?php


namespace core\helpAlgorithms\Test;


use core\helpAlgorithms\sort;

class testAlgorithms
{
    //тип сортировки=название класса
    private string $sortType;
    //эекземпляр класса
    private sort $sort;
    //количество элементов тестового массива
    private int $arraySize;
    //масив с "качеством" сортировки в каждом из тестов
    private array $sortPerformanseArray;
    //среднее значение верхнего массива
    private float $testResoult;

    public function __construct($arraySize = 100)
    {
        $this->arraySize = $arraySize;
        $this -> sort = new sort();

    }

    public function SetSorType($num)
    {
        $list = $this->sort->GetSortList();
        $this->sortType =  $list[$num];
    }

    public function GetSortPerformanseArray()
    {
        return $this->sortPerformanseArray;
    }
    /**
     * также передается количество элементов случайного массива
     * @param $countOfTests количество тестов
     */
    public function Test($countOfTests)
    {
        for($i = 0; $i < $countOfTests; $i+=1)
        {

            $this->sort->SetRandomArray($this->arraySize);
            $this->sort->GetSort($this->sortType)->Run();
            $this->sortPerformanseArray[$i] = $this->sort->GetPerformance();
            $this->sort->unsetArrays();
        }
    }



    public function Avarage()
    {
        $sum = 0;
        foreach ($this->sortPerformanseArray as $item)
        {
            $sum +=$item;
        }
        return $sum / count($this->sortPerformanseArray);
    }
    /**
     * Тесты по всем алгоритмам
     * @param int $arraySize
     * @param int $countOfTests
     */
    public function Demo($arraySize = 100, $countOfTests = 1000){
        $this->arraySize = $arraySize;
        $sortNames = $this->sort->GetSortList();
        for($i = 0; $i < count($sortNames); $i += 1)
        {
            $this->SetSorType($i);

            $this->Test($countOfTests);

            $this->testResoult[$i] = $this->Avarage();
            print_r($sortNames[$i]."\t--->\t".$this->Avarage());
            echo "\n";
        }
    }
    //относительные значения от пузырькоой сортиовки
    public function Analize()
    {
        $zero = $this->testResoult[0];
        foreach ($this->testResoult as $item)
        {
            echo $zero/$item."\n";
        }
    }
}