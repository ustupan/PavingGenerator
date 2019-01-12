<?php

require_once("AppController.php");
require_once(__DIR__.'/../models/User.php');


class DefaultController extends AppController
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $text = 'Hello there 👋';
        $as = "fuck the system";

        $this->render('index', ['text' => $text, 'as' => $as]);
    }

    public function login()
    {

        //sample users list until we connect to a database
        $users = [
            new User('Adrian', 'W', 'adrian.widlak@pk.edu.pl', 'test'),
            new User('Krzysztof', 'K', 'a',
                'a'),
        ];
        $user = null;

        if ($this->isPost()) {
            //we'll replace this with a query to the database
            foreach ($users as $u) {
                if ($u->getEmail() === $_POST['email']) {
                    $user = $u;
                    break;
                }
            }
            if(!$user) {
                return $this->render('login', ['message' => ['Email not recognized']]);
            }
            if ($user->getPassword() !== "a") {
                return $this->render('login', ['message' => ['Wrong password']]);
            } else {
                $_SESSION["id"] = $user->getEmail();
                $_SESSION["role"] = $user->getRole();
                $url = "http://$_SERVER[HTTP_HOST]/GeneratorKostki";
                header("Location: {$url}?page=index");
                exit();
            }
        }
        $this->render('login'); //todo czy to ma znaczenie gdzie dam?

    }

    public function logout()
    {
        session_unset();
        session_destroy();

        $this->render('index', ['text' => 'You have been successfully logged out!']);
    }
}