<?php


namespace project\controllers;

use core\Controller;
use project\models\GetAllMessages;

class GetMessagesController extends Controller
{
    private $allMessages;
    public function getAllMessages(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $getMessages = new GetAllMessages();
            $this->allMessages = $getMessages -> getDataMessages();
            $this->layout = 'getdata';
            $this->title =  "";
            $render = ['getmessages/index', $this->allMessages];
        }else{
            $this->layout = 'error';
            $this->title =  "А страницчки такой не существует";
            $render = ['errorPage/index'];
        }
        return $this->render(...$render);
    }
}