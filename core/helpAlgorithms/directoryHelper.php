<?php


namespace core\helpAlgorithms;


class directoryHelper
{
    public static function GetClassList($dir, $pattern = 'php'){
        $temp = scandir(dir.$dir);
        $i = 0;
        foreach ($temp as $item)
        {
            if(
            preg_match('/([\w]+)(.'.$pattern.')$/',$item)
            )
            {
                if(is_file(dir.$dir.$item)) {
                    $pat = '/(\.'.$pattern.')/';
                    $item = preg_replace($pat, '', $item);
                    $sortList[$i]['dir'] = $dir;
                    $sortList[$i]['class'] = $item;
                    $i++;
                }
            }
        }
        if (isset($sortList)){
            return $sortList;
        }else{
            echo "there are no files in ".$dir;
            exit();

        }
    }
}