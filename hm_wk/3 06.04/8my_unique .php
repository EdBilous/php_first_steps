<?php
    //array_unique — Убирает повторяющиеся значения из массива
    function my_unique($array,$key)
    {
       $temp_array = [];
       foreach ($array as &$v) {
           if (!isset($temp_array[$v[$key]]))
           $temp_array[$v[$key]] =&$v;
       }
       $array = array_values($temp_array);
       return $array;

    }

$arr= array("a" => "green", "red", "b" => "green", "blue", "red");

echo "<pre>";
print_r($arr); // первоначальный вид массива.
print_r(my_unique($arr)); // после функции

?>