<?php
$count1 = $_GET['count1'];
$count2 = $_GET['count2'];
$count3 = $_GET['count3'];

echo $count1 . $count3 . $count2 . '=';

switch ($count3) {
    case '+':
        echo $count1 + $count2;
        break;
  case '-':
        echo $count1 - $count2;
        break;
    case '*':
        echo $count1 * $count2;
        break;
   case '/':
        echo $count1 / $count2;
        break;
}
