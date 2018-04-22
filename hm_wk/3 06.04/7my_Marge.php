<?php
//array_merge — Сливает один или большее количество массивов

function customArrayMerge($arr1 , $arr2)
{
	foreach ($arr2 as $kay => $value){ // 1й массив не нужно переьирать.
		if (is_string($key) && $arr1[$key]) { // строка ли текущий элемент и существует ли он в первом массиве
			$arr1[$key] = $value; // переписываем значение в первый массив
		} else { // дозаписываем элементы не ассоциативного массива
			if (is_srting($key)) { //
				$arr1[] = $value;
			} else {
			$arr1[] = $value;
		 	}
		} 
	}
	return $arr1
}

$arr1 = [1, 2, 3]
$arr2 = [2, 4, 6]
