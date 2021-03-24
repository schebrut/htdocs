<?php


namespace project\models;


use http\Client\Curl\User;
use mysql_xdevapi\Session;

class SessionChat //implements Session
{
    private static $instance;
    public $user;

    private function __construct()
    {
    }
    public function getUser($user){
        if (isset($user)) {
        $this->user = ($user);
        }
    }
    public static function getInstance()
    {
        if ($_SESSION['SessionClient']){
            self::$instance = $_SESSION['SessionClient'];
        }

        if (self::$instance === null) {
            self::$instance = new SessionChat();
            $_SESSION['SessionClient'] = self::$instance;
        }

        return self::$instance;
    }

    private function __wakeup()
    {
    }
    private function __clone()
    {
    }
    public static function getUserSesion()
    {
        $singl_sesseion = SessionChat::getInstance();
        $singl_sesseion = serialize($singl_sesseion);
        return @$singl_sesseion = unserialize($singl_sesseion);
    }
    public static function destroyinstance()
    {
        self::$instance = null;
        unset($_SESSION['SessionClient']);
    }

}
