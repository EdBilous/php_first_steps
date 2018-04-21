<?php
//implode — Объединяет элементы массива в строку
function myImplode($del, $arr)
{ 
 $res = null;
 $i = 0;
foreach ($arr as $value) {
 $res = $res .$value.$del;
} 
 $res = substr($res, 0, -1);
return $res;
}
  $arr= array('имя', 'почта', 'телефон');

echo(myImplode(" ,", $arr)); // после функции