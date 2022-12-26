<?php

namespace application\core;



// базовый класс контроллеров


abstract class Controller
{

    public $route;
    public $view;

    public function __construct($route){
        $this->route = $route;

        $this->view = new View($route);
    }


}
