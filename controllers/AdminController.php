<?php
require_once 'AppController.php';

require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/UserMapper.php';

class AdminController extends AppController
{
    //todo tu raczej nie szukac
    public function __construct()
    {
        parent::__construct();
    }

    public function adminPanel(): void
    {
        $user = new UserMapper();
            $this->render('adminPanel', ['user' => $user->getUser($_SESSION['email'])]);
    }

    public function getUsers()
    {
            $user = new UserMapper();

            header('Content-type: application/json');
            http_response_code(200);

            echo $user->getUsers() ? json_encode($user->getUsers()) : '';
    }


    public function userDelete()
    {
            if (!isset($_POST['id'])) {
                http_response_code(404);
                return null;
            }

            $user = new UserMapper();
            $id = (int)$_POST['id'];
            $user->delete($id);
            http_response_code(200);
    }
}