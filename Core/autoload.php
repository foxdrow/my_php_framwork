<?php

namespace Core;

class Autoload
{

    static function register()
    {

        spl_autoload_register([
            __CLASS__,
            'autoload'
        ]);
    }

    static function autoload($class)
    {

        $path = explode('\\', $class);

        if ($path[0] == 'Controller') {
            $dir = str_replace('/Core', '', __DIR__);
            $file = $dir . '/src/' . $path[0] . '/' . $path[1] . '.php';
            require_once $file;
        } elseif ($path[0] == 'Core') {
            $dir = str_replace('/Core', '', __DIR__);
            $file = $dir . '/' . $path[0] . '/' . $path[1] . '.php';
            require_once $file;
        } else if ($path[0] == 'Model') {
            $dir = str_replace('/Core', '', __DIR__);
            $file = $dir . '/src/' . $path[0] . '/' . $path[1] . '.php';
            require_once $file;
        } else if ($path[0] == 'DbModel') {
            $dir = str_replace('/Core', '', __DIR__);
            $file = $dir . '/src/' . 'Model' . '/' . $path[0] . '.php';
            require_once $file;
        } 
    }
}
