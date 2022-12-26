<?php

namespace application\core;

// базовый класс контроллеров


abstract class Controller
{

    public $route;

    public function __construct($route){
        $this->route = $route;
    }


}
