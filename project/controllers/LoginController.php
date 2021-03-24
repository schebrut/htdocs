<?php


namespace project\controllers;

use core\Controller;
use project\models\Login;

class LoginController extends Controller
{
    public function show()

    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $login = new Login($_POST['login'], $_POST['password']);
            $login->checkUser();
        }
        $this->layout = 'login';
        $this->title =  "Вход";
        return $this->render('login/index');
    }

}