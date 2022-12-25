<?php

// константа безопасности
define('VG_ACCESS', true);


// запускаем сессию
session_start();


require_once 'application/lib/Dev.php';

use \application\core\Router;


// функция по отлову ошибок подключения классов
spl_autoload_register(function($class) {
   $path_to_class = str_replace('\\', '/', $class . '.php');
   if(file_exists($path_to_class)){
       require $path_to_class;
   }
});




$a = new Router();
$a->run();
