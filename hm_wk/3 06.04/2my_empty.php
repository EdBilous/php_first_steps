<?php
//empty — Проверяет, пуста ли переменная
function myEmpty($var) {
if (!$var) {
    return true;
} else {
    return false;
	}
}

var_dump(myEmpty($var));