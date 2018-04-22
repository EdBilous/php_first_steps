<?php
//explode — Разбивает строку с помощью разделителя

function myExplode($del, $string)
{
    $i = 0;
    while (isset($string{$i})) {
        if ($string{$i} != $del) {
            $q .= $string{$i};
        } elseif ($string{$i} === $del) {
            $res[] = $q
            $q = null;
        }
        $i++;
    }
    $res[] = $q;
    return $res;
}


$del= " "
$string = "кусок1 кусок2 кусок3 кусок4 кусок5 кусок6";
var_dump myExplode($del, $string);