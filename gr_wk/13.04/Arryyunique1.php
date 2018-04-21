<?php
function customArrayUnique($arr)
{
	foreach ($arr as $key) {
		$i= 0;
		foreach ($arr as $val) {
			if ($value == $val && $i>0) {
				unset($arr[$key]);
				$i = 0;
			}

		}
	}
	$i++;	
}

$arr = [1, 1, 2, 2, 3, 4, 5]
var_dump(customArrayUnique($arr));