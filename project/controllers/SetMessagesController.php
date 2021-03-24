<?php

namespace project\controllers;

use core\Controller;
use project\models\AddMessage;

class SetMessagesController extends Controller
{
    public function setmessage(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $saveMessage = new AddMessage($_POST['message']);
            $saveMessage->addMessage();
            $messages = $saveMessage->getMessages();
            exit;
        }else{
            $this->layout = 'error';
            $this->title =  "А страницчки такой не существует";
            return $this->render('errorPage/index');
        }
    }
}