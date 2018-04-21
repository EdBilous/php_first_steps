<?php
//strlen — Возвращает длину строки
function myStrlen($string)
{
$i=0; $count = 0;
while((isset($string{$i}) && $string{$i} != "")){ //isset — Определяет, была ли установлена переменная значением, отличным от NULL
$i++;
$count++;
}
return $count;
}
echo myStrlen(" Elfkbnm skjahja uasg ");