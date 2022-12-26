<?php

namespace application\controllers;

use application\core\Controller;



// контроллер для работы с главной страницей сайта
class MainController extends Controller
{

    public function indexAction(){
        $this->view->render('Главная страница');
    }


}
