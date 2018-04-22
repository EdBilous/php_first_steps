<?php
//intval — Возвращает целое значение переменной

function myIntval($var)
{
    if ($var > 0) {
        $nvar = $var % ($var + 1);
        return $nvar;
    } else {
        $nvar = $var % ($var - 1);
        return $nvar;
    }
}

$var = 4.2;
echo myIntval($var);


echo myIntval(42);                      // 42
echo myIntval(4.2);                     // 4
echo myIntval('42');                    // 42
echo myIntval('+42');                   // 42
echo myIntval('-42');                   // -42