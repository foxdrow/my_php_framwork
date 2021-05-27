<?php

namespace Core;

require_once('./src/routes.php');

class Router
{

    public static function choseRouter($type)
    {
        if ($type == 'static') {
            self::get($_GET['url']);
        } else if ($type == 'dynamic') {
            self::dynamicRouter();
        }
    }

    /*---------------------------- Static Router -----------------------------*/

    private static $routes;
    public static function connect($url, $route)
    {
        self::$routes[$url] = $route;
    }
    public static function get($url)
    {
        $url = '/' . $url;
        $routes = self::$routes;

        if (isset($routes[$url])) {

            $controller = $routes[$url]['controller'] . 'Controller';
            $controller = 'Controller\\' . $controller;
            $controller = new $controller();

            $action = $routes[$url]['action'] . 'Action';

            $controller->$action();
        } else {
            echo '404 not found';
        }
    }

    /*---------------------------- Dynamic Router -----------------------------*/

    public static function dynamicRouter()
    {
        $url = $_GET['url'];
        $url = explode('/', $url);

        if (empty($url)) {
            return false;
        } else {
            $controller = $url[0];


            if (!empty($url[0])) {
                $controller = $url[0];
            } elseif ($url[0] == '' || $url[0] == '/' || empty($url[0])) {
                $controller = 'App';
            }

            if (isset($url[1])) {
                $action = $url[1] . 'Action';
            } else {
                $action = 'indexAction';
            }
        }

        if($action == 'Action'){
            $action = 'indexAction';
        }


        $filename = './src/Controller/' . $controller . 'Controller.php';
        if (!file_exists($filename)) {
            echo '404 error';
            return false;
        }

        $controller = 'Controller\\' . $controller . 'Controller';
        $controller = new $controller();

        if (method_exists($controller, $action)) {
            $controller->$action();
        } else {
            echo '404 error';
            return false;
        }
    }
}
