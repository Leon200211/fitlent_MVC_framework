<?php

namespace application\core;

use application\exceptions\RouteException;


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

            $controller_path = '\application\controllers\\' . ucfirst($this->params['controller']) . 'Controller';


            // проверка на существование контроллера
            if(class_exists($controller_path)){

                $action = $this->params['action'] . 'Action';
                if(method_exists($controller_path, $action)){

                    $controller = new $controller_path($this->params);
                    $controller->$action();

                }else{
                    throw new RouteException('Не найден метод ' . $action, 1);
                }

            }else{
                throw new RouteException('Не найден ' . $controller_path, 1);
            }


        }else{
            throw new RouteException("Не корректная директория сайта", 1);
        }

    }



}


