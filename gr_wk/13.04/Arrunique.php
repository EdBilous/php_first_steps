<?php
function myArray_unique($arr) 
{ 
	$resultArr = []; 
	foreach ($arr as $value) { $count = 0; foreach ($resultArr as $item) { if ($value == $item) { $count++; } } if ($count == 0) { $resultArr[] = $value; } } return $resultArr; }