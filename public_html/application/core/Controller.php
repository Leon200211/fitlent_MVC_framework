<?php

namespace application\core;



// базовый класс контроллеров


abstract class Controller
{

    public $route;
    public $view;
    public $model;
    public $acl;

    public function __construct($route){
        $this->route = $route;
        $this->checkAcl();
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


    // метод для загрузки прав доступа
    public function checkAcl(){

        $this->acl = require 'application/acl/' . $this->route['controller'] . '.php';

        if($this->isAcl('all')){
            return true;
        }
        return false;

    }

    public function isAcl($key){
        return in_array($this->route['action'], $this->acl[$key]);
    }


}
