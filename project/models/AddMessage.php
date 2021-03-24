<?php


namespace project\models;

use core\Model;
use R;
use project\models\SessionChat;

class AddMessage extends Model
{
    private $message;
    private $table = 'messages';
    private $user;
    private $session;

    public function __construct($message)
    {
        parent::__construct();
        $this->message = $message;
        $this->session = SessionChat::getUserSesion();
    }

    private function findUser()
    {
        $this-> setTable('users');
        $this-> setQuery('login = ?');
        $this-> setData($this->session->user->login);
        $this->user = $this->getData();
    }
    private function changeActionTime()
    {
        $this->findUser();
        $this->user->lastlogin = time();
        $this->user->loginstatus = true;
        $this->setData($this->user);
        $this->save();
    }
    public function addMessage()
    {
        $data = R::dispense($this->table);
        $data->user = $this->session->user->login;
        $data->message = $this->message;
        $data->messagetime = time();
        $this->setData($data);
        $this->save();
        $this->changeActionTime();
    }
}
