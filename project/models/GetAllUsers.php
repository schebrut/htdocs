<?php

namespace project\models;

use core\Model;
use R;

class GetAllUsers extends Model
{
    private $table = 'users';
    private $allUser;
    private $user;

    public function getUsersList()
    {
        $this->setTable($this->table);
        $this->allUser = $this->getDataList();
        $this->checkUserStatus();
        return ($this->getDataList());
    }

    private function checkUserStatus()
    {
        foreach ($this->allUser as $user)
        {
            if ($user->loginstatus == true)
            {
                if (((time()-$user->lastlogin)/60)>= END_SESSION)
                {
                    $this-> setTable('users');
                    $this-> setQuery('login = ?');
                    $this-> setData($user->login);
                    $this->user = $this->getData();
                    $this->user->loginstatus = false;
                    $this->setData($this->user);
                    $this->save();
                }
            }

        }
    }
}