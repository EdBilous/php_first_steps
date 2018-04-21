<?php
function get_sum($arr) {
    $sum = 0;
    foreach($arr as $elem)
        $sum += $elem;
    return $sum;
}
$values = array(1,2,5,100,-30);
echo get_sum($values);       