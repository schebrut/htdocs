<?php


namespace project\controllers;


use core\Controller;
use core\Model;
use project\models\Logout;
use R;
use project\models\SessionChat;


class LoguotController extends Controller
{
    public function doLogout(){
        $logout = new Logout();
        $logout->doLogout();
    }

}