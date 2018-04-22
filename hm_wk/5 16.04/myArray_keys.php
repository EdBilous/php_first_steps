<?php
//array_keys — Возвращает все или некоторое подмножество ключей массива
function myArray_keys($arr)
{
	$arrkey = [];
	foreach ($arr as $key => $value) {
		$arrkey[] = $key;
		}
	return $arrkey;
}

$arr = array(0 => 100, "color" => "red", "mass" => "70");
var_dump(myArray_keys($arr));