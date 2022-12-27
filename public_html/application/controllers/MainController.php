<?php

namespace application\controllers;

use application\core\Controller;
use application\lib\Db;


// контроллер для работы с главной страницей сайта
class MainController extends Controller
{

    public function indexAction(){

        $result = $this->model->getNews();

        $vars = [
            'news' => $result
        ];

        $this->view->render('Главная страница', $vars);

    }


}
