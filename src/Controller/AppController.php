<?php

namespace Controller;

use Core\Controller;

class AppController extends Controller
{
    public function indexAction()
    {
        echo 'indexAction_App';
    }
    public function echoGoodAction()
    {
        echo 'good_App';
    }
}
