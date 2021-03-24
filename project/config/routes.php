<?php
    use core\Route;
return [
    new Route('/', 'index', 'start'),
    new Route('/login/', 'login', 'show'),
    new Route('/register/', 'register', 'show'),
    new Route('/loguot/', 'loguot', 'doLogout'),
    new Route('/messages/', 'setMessages', 'setmessage'),
    new Route('/getmessages/', 'getMessages', 'getAllMessages'),
    new Route('/userslist/', 'getUsers', 'getUsersList'),
    new Route('/id[0-9]+/', 'id', 'chatroom'),
];