<?php

//namespace Core;
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 'on');
require 'project/config/debug.php';
require 'project/config/conection.php';
require 'project/config/end_session.php';
require 'project/libs/rb.php';
require_once 'vendor/autoload.php';

use core\Router;
use core\Dispatcher;
use core\View;
use core\Model;
use project\models\SessionChat;

spl_autoload_register(
    function ($class) {
        $path = str_replace('\\', '/', $class) . '.php';
        if (file_exists($path)) {
            require $path;
        }
    }
);

$routes = require $_SERVER['DOCUMENT_ROOT'] . '/project/config/routes.php';
$track = (new Router)->getTrack($routes, $_SERVER['REQUEST_URI']);
$page = (new Dispatcher)->getPage($track);

echo (new View)->render($page);
