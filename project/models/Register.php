<?php


namespace project\models;

use core\Model;
use R;

class Register extends Model
{
    private $login;
    private $passord;
    private $password_repeate;
    private $errors = [];
    private $count_items;
    private $table = 'users';

   public function __construct($login, $passord, $password_repeate)
   {
        parent::__construct();

        $this->login = trim($login);
        $this->passord= trim($passord);
        $this->password_repeate = trim($password_repeate);
   }

   private function addUser()
   {
       $data = R::dispense($this->table);
       $data ->login = $this->login;
       $data ->passord = password_hash($this->passord,PASSWORD_DEFAULT);
       $data ->loginstatus = false;
       $data ->lastlogin = time();
       $this->setData($data);
       $this->save();
    }

    private function loginCheck()
   {
       if ($this->login!=null){
            return $this->login;
       }
       $this->errors[] = 'Введите имя пользователя';
   }

    private function passwordCheck()
    {
        if ($this->passord!=null){
            return $this->passord;
        }
        $this->errors[] = 'Введите пароль';
    }

    private function passordRepeatCheck()
    {
        if ($this->password_repeate!=null){
            return $this->password_repeate;
        }
        $this->errors[] = 'Введите пароль еще раз';
    }

    private function equalPasswords()
    {
        if($this->passwordCheck() === $this->passordRepeatCheck()){
            return true;
        }
        $this->errors[] = 'Пароли не совпадают';
    }

    private function countUser()
    {
        $this->count_items = (R::count($this->table,"login = ?", array("{$this->login}")));
        return $this->count_items;
    }

    private function checkUserRegistered()
    {
        if ($this->countUser()>0){
            $this->errors[] = 'Пользователь с таким уменем уже зарегистрирован';
        }
    }

    public function completeRegistration()
    {
        $this->checkUserRegistered();
        $this->loginCheck();
        $this->passwordCheck();
        $this->passordRepeatCheck();
        $this->equalPasswords();

        if (empty($this->errors)){
            $this->addUser();
            echo 'Вы успешно зарегистрированы';
        }else{
           echo array_shift($this->errors);
        }
    }
}


