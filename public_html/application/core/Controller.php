<?php

namespace application\core;



// базовый класс контроллеров


abstract class Controller
{

    public $route;
    public $view;
    public $model;

    public function __construct($route){
        $this->route = $route;
        $this->view = new View($route);
        $this->model = $this->loadModel($this->route['controller']);
    }


    // метод для подключения модели
    public function loadModel($name){
        $path = 'application\models\\' . ucfirst($name);

        if(class_exists($path)){
            return new $path;
        }

    }


}
