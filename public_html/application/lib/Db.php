<?php

namespace application\lib;

use PDO;

// класс для работы с базой данных
class Db
{

    protected $db;


    public function __construct(){
        $config = require 'application/config/db.php';
        $this->db = new PDO('mysql:host='.$config['host'].';dbname='.$config['dbname'].'', $config['username'], $config['password']);
    }



    public function myQuery($sql, $params = []){
        // защита от slq иньекций
        $stmt = $this->db->prepare($sql);

        if(!empty($params)){
            foreach ($params as $key => $param){
                $stmt->bindValue(":".$key, $param, PDO::PARAM_STR);
            }
        }

        $stmt->execute();

        return $stmt;
    }



    public function row($sql, $params = []){
        $result = $this->myQuery($sql, $params);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function column($sql, $params = []){
        $result = $this->myQuery($sql, $params);
        return $result->fetchColumn();
    }


}