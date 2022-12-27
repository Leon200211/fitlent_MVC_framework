<?php


namespace application\core;


use application\lib\Db;


// класс для работы с моделью
abstract class Model {


    public function __construct(){
        $this->db = new Db;
    }


}

