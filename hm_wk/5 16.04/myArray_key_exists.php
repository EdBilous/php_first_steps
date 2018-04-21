<?php
//array_key_exists — Проверяет, присутствует ли в массиве указанный ключ или индекс

// !!возвращает результат последнего сравнения в цикле.
function myArray_key_exists($keysearch, $arr)
{
	foreach ($arr as $key => $value) {
		if ($key == $keysearch) {
			return true;
		} else {
			return false;
		}
	}
}
$arr = ['second' => 4, 'third' => 8, 'first' => 1];
$keysearch = 'third';
var_dump (myArray_key_exists($keysearch, $arr));