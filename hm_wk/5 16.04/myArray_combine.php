<?php
//array_combine — Создает новый массив, используя один массив в качестве ключей, а другой для его значений

function myArray_combine($arr1, $arr2)
{
		$arr = [];
	for($i= 0; $i< count($arr1); $i++) {
    	$arr[$arr1[$i]] = $arr2[$i];
	}
	return $arr;
}
$arr1 = array('green', 'red', 'yellow');
$arr2 = array('avocado', 'apple', 'banana');
print_r(myArray_combine($arr1, $arr2));
