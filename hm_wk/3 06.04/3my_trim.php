<?php
// trim — Удаляет пробелы (или другие символы) из начала и конца строки
function myTrim($string) {
    while(substr($string, 0,1)==" ") 
    {
        $string = substr($string, 1);
        myTrim($string);
    }
    while(substr($string, -1)==" ")
    {
        $string = substr($string, 0, -1);
        myTrim($string);
    }
    return $string;
}
//substr возвращает подстроку строки string, начинающейся с start символа по счету и длиной length символов.

echo myTrim(" Elfkbnm skjahja uasg ");