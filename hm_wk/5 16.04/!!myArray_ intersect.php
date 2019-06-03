<?php
//array_intersect — Вычисляет схождение массивов

//!!не выходит обыграть это дело!!
ffunction myArray_intersect($arr1, $arr2)
{
		foreach ($arr1 as $key1 => $value1) {
			foreach ($arr2 as $key2 => $value2) {
				if ($value1 === $value2){
					return $value1;
				} elseif ($value2 ===$value1) {
					return $value2;
				}
			}
		}
}
    
$arr1 = array("a" => "green", "red", "blue", "red");
$arr2 = array("b" => "green", "yellow", "red");
var_dump(myArray_intersect($arr1, $arr2));
