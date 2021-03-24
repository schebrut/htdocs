<?php


namespace project\models;

use core\Model;
use project\models\SessionChat;
use R;

class Login extends Model

{
    private $user;
    private $errors = [];
    private $login;
    private $passord;
    private $user_session;

    private $table = 'users';

    public function __construct($login, $passord)
    {
        parent::__construct();

        $this->login = $login;
        $this->passord = $passord;
    }

    private function loginCheck()
    {
        if ($this->login != null) {
            return $this->login;
        }
        $this->errors[] = 'Введите имя пользователя';
    }

    private function passwordCheck()
    {
        if ($this->passord != null) {
            return $this->passord;
        }
        $this->errors[] = 'Введите пароль';
    }

    private function findUser()
    {
        $this->setTable($this->table);
        $this->setQuery('login = ?');
        $this->setData($this->login);
        $this->user = $this->getData();
    }

    public function checkUser()
    {
        $this->loginCheck();
        $this->passwordCheck();

        if (empty($this->errors)) {
            $this->findUser();
            if (is_null($this->user)) {
                echo 'Пользователь не найден';
            } else {
                if (password_verify($this->passord, $this->user->passord)) {
                    $this->user->loginstatus = true;
                    $this->user->lastlogin = time();
                    $this->setData($this->user);
                    $this->save();
                    $ses = SessionChat::getInstance();
                    $ses->getUser($this->user);

                    header("Location: id{$this->user->id}");
                } else {
                    echo 'Неверно указан пароль';
                }
            }
        } else {
            echo array_shift($this->errors);
        }
    }


}