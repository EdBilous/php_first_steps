<?php
//array_key_exists — Проверяет, присутствует ли в массиве указанный ключ или индекс

function myArray_key_exists($key, $arr)
{
    foreach ($arr as $k => $value) {
        if ($key === $k) {
            return true;
        }
    }
    return false;
}
$arr = ['second' => 4, 'third' => 8, 'first' => 1];
$key = 'third';
var_dump (myArray_key_exists($key, $arr));