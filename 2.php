<?php
function getArr(): array
{
$array = array();
for ($i = 0; $i < 10; $i++) {
    $array[]=rand(1,10);
}
return $array;
}

function search()
{
    $value = rand(0,10);
    $myArr = getArr();
    print_r($myArr);
    foreach ($myArr as $key => $item) {
        if ($item == $value) {
            unset($myArr[$key]);
        }
    }
    print_r($myArr);
}

$res = search();