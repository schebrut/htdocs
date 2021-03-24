<?php


namespace core;


class Dispatcher
{
    public function getPage(Track $track)
    {
        $controllerName = ucfirst($track->controller) . 'Controller';
        $fullName = "\\project\\controllers\\$controllerName";

        if (class_exists($fullName)) {
            $controller = new $fullName;
            $result = $controller->{$track->action}();
            return $result;
        } else {
            echo "Controller not found {$fullName}";
            exit;
        }
    }

}