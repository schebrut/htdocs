<?php


namespace project\controllers;

use core\Controller;
use project\models\Register;

class RegisterController extends Controller
{
    public function show(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $register = new Register($_POST['login'], $_POST['password'], $_POST['password-repeat']);
            $register->completeRegistration();
        }

        $this->layout = 'login';
        $this->title =  "Вход";
        return $this->render('register/index');
    }
}