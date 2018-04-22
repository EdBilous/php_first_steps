<?php
//in_array — Проверяет, присутствует ли в массиве значение

function myIn_array($value, $arr)
{
    foreach ($arr as $key => $val) {
            if ($value == $val) {
                return true;
            }
        }
    return false;
}
    
$arr = array("Mac", "NT", "Irix", "Linux");
$value = "Mac";
var_dump(myIn_array($value, $arr));