<?php


namespace application\models;

use application\core\Model;

// класс для работы с моделью
class Main extends Model {


    public function getNews(){
        $result = $this->db->row("SELECT * FROM `companies`");
        return $result;
    }


}

