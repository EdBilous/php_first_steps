<?php
//array_keys — Возвращает все или некоторое подмножество ключей массива

// !!array(3) { [0]=> string(5) "[0,0]" [1]=> string(9) "[1,color]" [2]=> string(9) "[2,mass]" }
function myArray_keys($arr)
{
	$temparr = array();
	
	$i = 0;
	foreach ($arr as $key => $value) {
		$temparr{$i}= '['.$i .','.$key.']';
		$i++;
		}
	return ($temparr);
}

$arr = array(0 => 100, "color" => "red", "mass" => "70");
print_r(myArray_keys($arr));