<?php


namespace core;

class Router
{
    public function getTrack($routes, $uri)
    {
        foreach ($routes as $route) {
            $path = trim($route->path, '/');
            $path = '#^' . $path . '$#';
            $uri = trim($uri, '/');

            if (preg_match($path, $uri, $params)) {
                return new Track($route->controller, $route->action, $params);
            }
        }
        return new Track('error', 'notFound');
    }
}

