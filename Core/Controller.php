<?php

namespace Core;

class Controller
{
    function __construct($view = '')
    {
        $this->view = $view;
        $this->request = new Request;
    }

    function __destruct()
    {
        $view = $this->view;
        include(implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', 'index']) . '.php');
    }

    protected function render($view, $scope = [])
    {
        extract($scope);

        $f = implode(DIRECTORY_SEPARATOR, [dirname(__DIR__), 'src', 'View', $view]) . '.php';

        if (file_exists($f)) {
            ob_start();
            include($f);
            $view = ob_get_clean();
            $this->view = $view;
        }
    }
}
