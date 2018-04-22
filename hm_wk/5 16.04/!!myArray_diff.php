<?php
//array_diff — Вычислить расхождение массивов

//!!не выходит обыграть это дело!!
function myArray_diff($arr1, $arr2)
{
    foreach ($arr1 as $key1 => $value1) {
		foreach ($arr2 as $key2 => $value2) {
			if ($value1 !== $value2){
				return  $arr1[$key1];
			}
			if ($value2 !== $value1) {
				return $arr2[$key2];
			}
		}
	}
	return false;
}
    
$arr1 = array("a" => "green", "red", "blue", "red");
$arr2 = array("b" => "green", "yellow", "red");
var_dump(myArray_diff($arr1, $arr2));