<?php
function myRound($var)
{
    //Решил вместо стринг привести флоат к интедж.(округляет к меньшему).
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
