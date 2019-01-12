<?php

require_once("AppController.php");


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
        $this->render('login');
    }
}