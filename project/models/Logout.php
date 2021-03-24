<?php


namespace project\models;
use core\Model;
use project\models\SessionChat;

class Logout extends Model
{
    private $table = 'users';
    private $id;
    private $user;

    private function setID(){
        $session = SessionChat::getUserSesion();
        $this->id = $session->user->id;
    }

    private function findUser()
    {
        $this->setID();
        $this-> setTable($this->table);
        $this-> setQuery('id = ?');
        $this-> setData($this->id);
        $this->user = $this->getData();
    }

    public function doLogout()
    {
        $this->findUser();
        $this->user->loginstatus = false;
        $this->user->lastlogin = time();
        $this->setData($this->user);
        $this->save();
        SessionChat::destroyinstance();
        session_destroy();
        header('Location: /');
    }
}