<?php
/*
Создайте массив $bmw с ячейками “model”, “speed”, “doors”, “year”. Заполните ячейки значениями “X5”, 120, 5, 2006.
Создайте массивы $toyota и $opel аналогичные массиву $bmw и заполните их - $toyota “Carina”, 130, 4, 2007
$opel “Corsa”, 140, 5, 2007
Выведите значение всех трех массивов в виде:
name - model - speed - doors - year
*/
    $bmw = Array(
        'model' => "X5",
        'speed' => 120,
        'doors' => 5,
        'year'  => "2006"
    );
    $toyota = Array(
        'model' => "Carina",
        'speed' => 130,
        'doors' => 4,
        'year'  => "2007"
    );
    $opel = Array(
        'model' => "Corsa",
        'speed' => 140,
        'doors' => 5,
        'year'  => "2007"
    );
    echo "Модель:      $bmw[model] <br>
          Скорость:    $bmw[speed] <br>
          Двери:       $bmw[doors] <br>
          Год выпуска: $bmw[year]  <br> <hr>";
    echo "Модель:      $toyota[model] <br>
          Скорость:    $toyota[speed] <br>
          Двери:       $toyota[doors] <br>
          Год выпуска: $toyota[year]  <br> <hr>";
    echo "Модель:      $opel[model] <br>
          Скорость:    $opel[speed] <br>
          Двери:       $opel[doors] <br>
          Год выпуска: $opel[year]  <br> <hr>";
 ?>