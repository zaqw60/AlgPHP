<?php
// линейный поиск соответственно 100, 100000 и 1000000 шагов
//бинарный поиск 100 - 7 шагов,  100000 - 15 шагов,  1000000 - 19 шагов
// интерполяция 100 - 1 шаг. 100000 - 1 шаг. 1000000 - 1 шаг
function getArr(): array
{
    $array = array();
    for ($i = 0; $i < 1000000; $i++) {
        $array[]=$i + 1;
    }
    return $array;
}


function LinearSearch($num) {
    $steps = 0;
    $myArray = getArr();
    $count = count($myArray);
    for ($i=0; $i < $count; $i++) {
        $steps++;
        if ($myArray[$i] == $num) {
            print_r($steps);
            echo "\n";
        }elseif ($myArray[$i] > $num)
            return null;
    } return null;
}


function binarySearch($num) {
    $steps = 0;
    $myArray = getArr();
    //определяем границы массива
    $left = 0;
    $right = count($myArray) - 1;
    while ($left <= $right) {
        //находим центральный элемент с округлением индекса в меньшую сторону
        $middle = floor(($right + $left) / 2);
        //print_r($middle);
        $steps++;
        //если центральный элемент и есть искомый
        if ($myArray[$middle] == $num) {
            print_r($steps);
            echo "\n";
            break;
        } elseif ($myArray[$middle] > $num) {
            //сдвигаем границы массива до диапазона от left до middle-1
            $right = $middle - 1;
        } elseif ($myArray[$middle] < $num) {
            $left = $middle + 1;
        }
        }
    return null;
}


function InterpolationSearch($num) {
    $steps = 0;
    $myArray = getArr();
    $start=0;
    $last=count($myArray) -1;
    while(($start<=$last) && ($num>=$myArray[$start]) && ($num<=$myArray[$last])) {
        $steps++;
        $pos=floor($start+ ( (($last-$start) / ($myArray[$last] -$myArray[$start])) * ($num-$myArray[$start]) ));
        if($myArray[$pos] == $num) {
            print_r($steps);
        }
        if($myArray[$pos] <$num) {
            $start=$pos+1;
        } else{
            $last=$pos-1;
        }
    }
    return null;
}

$resLin = LinearSearch(100);
$resBin = binarySearch(100);
$resInt = InterpolationSearch(100);