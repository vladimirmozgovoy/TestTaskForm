<?php

namespace Routes;

use Core\Response;

abstract class Route
{
    /** Роутинг
     * @param $url
     * @return mixed
     */
    public static function route($url)
    {
        $method = "get";
        switch ($_SERVER['REQUEST_METHOD']) {
            case "GET":
                $method = "get";
                break;
            case "POST":
                $method = "post";
                break;
            case "PUT":
                $method = "put";
                break;
            case "DELETE":
                $method = "delete";
                break;
        }
        $routes = ApiRoutes::getAllRoutes();

        if (isset($routes[$method][$url])) {
            $route = $routes[$method][$url];

            $class = $route['class'];
            $action = $route['action'];
            return ($class::$action());
        }
        return Response::setResponse(404);
    }

}