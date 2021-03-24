<?php


namespace project\controllers;

use core\Controller;

class ErrorController extends Controller
{
    public function notFound()
    {
        $this->layout = 'error';
        $this->title = "А страницчки такой не существует";
        return $this->render('errorPage/index');
    }
}