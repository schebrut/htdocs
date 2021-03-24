<?php
namespace project\controllers;

use core\Controller;

class IdController extends Controller
{
    public function chatroom()
    {
        $this->layout = 'default';
        $this->title = 'Наш самый лучший Чат';
        return $this->render('social/index');
    }
}
