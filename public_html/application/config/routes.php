<?php


// массив маршрутов
return $routes = [

    // главная страница сайта
    '' => [
        'controller' => 'main',
        'action' => 'index'
    ],

    // вход пользователя
    'account/login' => [
        'controller' => 'account',
        'action' => 'login'
    ],

    // регистрация пользователя
    'account/register' => [
        'controller' => 'account',
        'action' => 'register'
    ]


];



