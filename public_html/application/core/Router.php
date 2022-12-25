<?php

namespace application\core;

// класс для роутинга по сайту
class Router
{

    protected $routes = [];
    protected $params = [];


    public function __construct(){
        $routes_arr = require  'application/config/routes.php';

        foreach ($routes_arr as $key => $value){
            $this->add($key, $value);
        }

    }


    // метод для добавления маршрута
    public function add($new_route, $new_params){

        $new_route = '#^' . $new_route . '$#';
        $this->routes[$new_route] = $new_params;

    }


    // метод для проверки маршрута
    public function match(){

        // получаем текущий URL
        $url = trim($_SERVER['REQUEST_URI'], '/');


        // проходим по массиву маршрутов и ищем совпадения
        foreach ($this->routes as $route => $values){
            if(preg_match($route, $url, $matches)){
                $this->params = $values;

                return true;
            }
        }

        return false;

    }


    // метод для запуска маршрута
    public function run(){

        // если существует текущий маршрут
        if($this->match()){

            $controller = 'application\controllers\\' . ucfirst($this->params['controller']) . 'Controller.php';

            // проверка на существование контроллера
            if(class_exists($controller)){
                echo 123;
            }else{
                echo 'Не найден ' . $controller;
            }


        }else{
            echo "Маршрут не найден";
        }

    }



}


