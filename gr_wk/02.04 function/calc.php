<?php
// калькулятор с использованием +-/*
function calc(int $int1, int $int2, string $operant) {
	if ($operant == "*") {
		echo $int1 * $int2;
	} elseif (operant== "-") {
		echo $int1- $int2;
	} elseif (operant== "-") {
		echo $int1- $int2;
	elseif (operant== "+") {
		echo $int1+ $int2;
		elseif (operant== "/" && $int2 !=0) {
		echo $int1/ $int2;
	}else {
		echo "error";
	}
}
calc (0,2. "/")