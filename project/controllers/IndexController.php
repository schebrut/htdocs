<?php


namespace project\Controllers;

use core\Controller;
use project\models\SessionChat;

class IndexController extends Controller
{
    protected $layout = 'default';
    public function start()
    {
        $session = SessionChat::getUserSesion();
        $session->user;
        if (isset($session->user)){
            header("location: /id{$session->user->id}");
        }else{
            SessionChat::destroyinstance();
            header("location: /login");
        }
        exit;
    }


}

