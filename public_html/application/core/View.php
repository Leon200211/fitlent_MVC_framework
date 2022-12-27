<?php

namespace application\core;



// базовый класс для шаблонов
use application\exceptions\RouteException;

class View
{

    public $path;
    public $route;
    public $layout = 'default';



    public function __construct($route){

        $this->route = $route;

        $this->path = $this->route['controller'] . '/' . $this->route['action'];

    }

    public function render($title, $vars = []){

        // получаем переменные массива
        extract($vars);

        if(file_exists('application/views/' . $this->path . '.php')){
            ob_start();
            require 'application/views/' . $this->path . '.php';
            $content = ob_get_clean();
            require 'application/views/layouts/' . $this->layout . '.php';
        }else{
            throw new RouteException("Вид не найден", 1);
        }

    }


    // метод редиректа
    public function redirect($url){
        header('Location: ' . $url);
    }


    public function message($status, $message){
        exit(json_encode(['status' => $status, 'message' => $message]));
    }
    public function location($url){
        exit(json_encode(['url' => $url]));
    }


}
