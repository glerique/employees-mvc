<?php

namespace App\Lib;


class Application
{

    public static function start()
    {

        $params = [];
        if (isset($_GET['p'])) {
            $params = explode('/', $_GET['p']);

            if (!empty($params[0])) {
                $controllerName = ucfirst($params[0]);
            } else {
                $controllerName = "Employee";
            }

            if (!empty($params[1])) {
                $action = $params[1];
            } else {
                $action = "index";
            }

            $controllerName = "App\Controller\\" . $controllerName."Controller";

            $controller = new $controllerName();

            if (!empty($params[2])) {

                $controller->$action($params[2]);
            } else {
                $controller->$action();
            }
        }
    }
}