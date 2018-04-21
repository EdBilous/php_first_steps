<?php
//Используя цикл for заполните массив от 0 до 100
$arr = [];
        echo '[';
        for ($i = 1; $i <= 100; $i++) {
                $arr[] = $i;
                echo $i . ' ';
        }
        echo ']';
        //var_dump($arr);
        echo '<br/><br/>';
?>