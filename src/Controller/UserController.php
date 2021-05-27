<?php

namespace Controller;

use Core\Controller;
use Model\UserModel;

class UserController extends Controller
{
    public function indexAction()
    {
        echo 'indexAction_User';
    }
    public function addAction()
    {
        echo 'execute: addAction';
    }
    public function saveAction()
    {
    }
    public function registerAction()
    {
        $pass = $this->request->request($_POST['pass']);
        $email = $this->request->request($_POST['email']);
        $UserModel = new UserModel;
        $UserModel->save($pass, $email);
    }
    public function renderRegisterAction()
    {
        $this->render('User/register');
    }
}
