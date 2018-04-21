<?php
function calc()
{
    if($_POST) {
        $operand = $_POST['operand'];
        $val1 = $_POST['val1'];
        $val2 = $_POST['val2'];

        if ($operand == '*') {
            return $val1 * $val2;
        } elseif ($operand == '/' && $val2 != 0) {
            return $val1 / $val2;
        } elseif ($operand == '-') {
            return $val1 - $val2;
        } elseif ($operand == '+') {
            return $val1 + $val2;
        } elseif ($val2 == 0) {
            return 'Error!';
        }

        return 'Error';
    }

    return '';
}