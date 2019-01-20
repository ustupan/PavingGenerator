<?php
/**
 * Created by PhpStorm.
 * User: andrzej
 * Date: 2019-01-20
 * Time: 12:47
 */

class PavingController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function paving(): void
    {
        if(!isset($_SESSION) || empty($_SESSION)){
            $url = "http://$_SERVER[HTTP_HOST]/GeneratorKostki";
            header("Location: {$url}?page=login");
        }
        else{
            $text = 'Hello there 👋';
            $this->render('paving', ['text' => $text]);
        }
    }
}