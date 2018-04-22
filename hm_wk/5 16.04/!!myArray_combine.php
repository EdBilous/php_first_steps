<?php
//array_combine — Создает новый массив, используя один массив в качестве ключей, а другой для его значений


// !!все значения нового массива- это первое значение массива $b[]
function myArray_combine($a, $b)
{
$c = array();
    
    foreach ($b as $keyb => $value) {
    	foreach ($a as $keya => $val) {
         $c[$val] = $value[$keyb];
     }

    }
    return $c;
}

$a = array('green', 'red', 'yellow');
$b = array('avocado', 'apple', 'banana');
print_r(myArray_combine($a, $b));