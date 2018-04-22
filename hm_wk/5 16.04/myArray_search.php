<?php
//array_search — Осуществляет поиск данного значения в массиве и возвращает ключ первого найденного элемента в случае удачи
function myArray_search($value, $arr)
{
    foreach ($arr as $key => $val) {
        if ($val === $value) {
            return $key;
        }
    }
    return false;
}

$arr = array(0 => 'blue', 1 => 'red', 2 => 'green', 3 => 'red');
$value = 'green';
var_dump(myArray_search($value, $arr));