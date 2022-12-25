<?php

// вывод ошибок на экран
ini_set('display_errors', 1);
error_reporting(E_ALL);


// вывод массива на экран для дебага
function print_arr($arr){
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
    exit;
}


