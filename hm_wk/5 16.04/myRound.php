<?php

function myRound($var)
{
	if (($var - (int)$var) >= 0.5) {
		$i = 1;
	} else {
		$i = 0;
	}
	$var = (int)$var + $i;

	return $var;
}

$var = 26.7;

var_dump(myRound($var));