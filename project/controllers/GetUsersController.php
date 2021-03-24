<?php

namespace project\controllers;
use core\Controller;
use project\models\GetAllUsers;

class GetUsersController extends Controller
{
    private $allUsers;
    public function getUsersList(){
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $getUsers = new GetAllUsers();
        $this->allUsers = $getUsers->getUsersList();
        $this->title =  "А страницчки такой не существует";
        $this->layout = 'getdata';
        $render = ['getusers/index', $this->allUsers];
        }else{
            $this->layout = 'error';
            $this->title =  "А страницчки такой не существует";
            $render = ['errorPage/index'];
        }
        return $this->render(...$render);
    }
}