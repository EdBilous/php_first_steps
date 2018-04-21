<?php
// Напишите функцию которая будет принимать на вход два числа, и будет выводить на экран болшее.

function getMax(int $x, int $y)
{
    if ($x > $y) {
        return $x;
    } elseif ($x == $y) {
    	return "Числа равны";
    }
    else {
        return $y;
    }
}

$a = 100;
$b = 44;

echo 'Большее число: ' . getMax($a, $b);