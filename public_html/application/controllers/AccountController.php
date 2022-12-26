<?php

namespace application\controllers;

use application\core\Controller;



// контроллер для работы с аккаунтом
class AccountController extends Controller
{

    public function loginAction(){
        $this->view->render('Вход');
    }

    public function registerAction(){
        $this->view->render('Регистрация');
    }

}
