<?php
//implode — Объединяет элементы массива в строку
// function myImplode1($arr)
// { 
// 	$res = null;
// 	$i = 0;
// foreach ($arr as $value) {
// 	$res .= $value;
// }
// return $res;
// }

function myImplode2($del, $arr) {
	$res = null; $i = 0;
	foreach ($arr as $value) {
		$res = $res .$value; 
		if (isset($arr[$i + 1])) {
			$res .= $value.$del;
			} else {
				$res .= $value; }
			$i++;
		}
			return $res;
	}
	$arr= array('имя', 'почта', 'телефон');

print_r($arr); // первоначальный вид массива.
print_r(myImplode2(',', $arr)); // после функции

?>