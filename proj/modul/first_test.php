<?php

require_once("utils.php");

/**
 * Function receives an array with integer numbers,
 * should return its sum. It is not alowed to use built-in php functions.
 *
 * Функция получает на вход массив чисел, должна вернуть сумму этих чисел.
 * Не использовать встроенные функции суммирования php.
 *
 * @param array $arr
 * @return integer
 */
function my_sum($arr) {
    foreach ($arr as $value)
        $r += $value;
    return $r;}
/**

 * Function receives a long string with many words.
 * It should return the same string, but words,
 * larger then 6 symbols, should be changed, symbols
 * after the sixth one should be replaced by symbol *
 *
 * Функция получает на вход длинную строку с множеством слов.
 * Она должна вернуть ту же строку, но в словах, которые длиннее 6 символов,
 * функция должна вместо всех символов после шестого поставить одну звездочку.
 * Пример: Из слова 'verwijdering' должно получиться 'verwij*'
 *
 * @param string $shortMe
 * @return string
 */
function shortener($shortMe) {
    $arr = explode(" ", $shortMe);
    for ($i=0; $i < count($arr) ; $i++) {
        if (strlen($arr[$i]) > 6 )
            $arr[$i] = substr($arr[$i],0,6)."*";
    }
    $res = implode(" ", $arr);
    return $res;
}

/**
 * Function receives an array of strings.
 * Please return number of strings, which
 * length is at least 2 symbols and first character
 * is equal to the last character
 *
 * Функция получает на вход массив строк. Вернуть надо количество строк,
 * которые не короче двух символов и у которых первый и последний
 * символ совпадают.
 *
 * @param array $arr
 * @return number
 */
function compare_ends($arr) {
    foreach ($arr as  $value) {
        if (strlen($value) >= 2){
            if ((substr($value,0,1)) == (substr($value,-1)))
                $q++;
        }
    }return $q;
}


/**
 * Function receives a string, should return this string reversed.
 *
 * Функция получает на вход строку, должна вернуть ее перевернутой.
 *
 * @param string $str
 * @return string
 */
function reverse_string($str) {
    for ($i = 0; $i <= strlen($str); $i++)
        $revers .= substr($str, strlen($str) - $i, 1);
    return $revers;
}

test_shortener();

test_compare_ends();

test_my_sum();

test_reverse_string();
