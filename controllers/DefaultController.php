<?php

require_once("AppController.php");

require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/UserMapper.php';


class DefaultController extends AppController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $text = 'Hello there 👋';

        $this->render('index', ['text' => $text]);
    }

    public function login()
    {
        $mapper = new UserMapper();

        if ($this->isPost()) {
            if (!($user = $mapper->getUser($_POST['email']))) {
                return $this->render('login', ['message' => ['Email not recognized']]);
            }

            if ($user->getPassword() !== md5($_POST['password'])) {
                return $this->render('login', ['message' => ['Wrong password']]);
            } else {
                $_SESSION['login'] = $user->getLogin();
                $_SESSION["email"] = $user->getEmail();
                $_SESSION["role"] = $user->getRole();

                $url = "http://$_SERVER[HTTP_HOST]/GeneratorKostki";
                header("Location: {$url}?page=index");
                exit();
            }
        }
        $this->render('login');
    }

    public function logout()
    {
        session_unset();
        session_destroy();
        $url = "http://$_SERVER[HTTP_HOST]/GeneratorKostki";
        header("Location: {$url}?page=index");
    }

    public function register()
    {
        $userMapper = new UserMapper();
        if ($this->isPost()) {
            if ($userMapper->getUser($_POST['email']) != null)
                return $this->render('register', ['message' => ['This email is already registered']]);
            if ($_POST['password'] != $_POST['password_confirmation'])
                return $this->render('register', ['message' => ['Wrong password']]);
            $userMapper->setUser($_POST['login'], $_POST['email'], md5($_POST['password']));
            $url = "http://$_SERVER[HTTP_HOST]/GeneratorKostki";
            echo "<script> alert('Zarejestrowano!'); window.location.href='{$url}?page=index'; </script>";
            exit();
        }
        $this->render('register');
    }
}

