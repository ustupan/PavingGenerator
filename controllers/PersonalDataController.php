<?php

require_once __DIR__.'/../models/UserDetails.php';
require_once __DIR__.'/../models/UserDetailsMapper.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/UserMapper.php';

class PersonalDataController extends AppController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function update()
    {
        $userDetailsMapper = new UserDetailsMapper();
        $userMapper = new UserMapper();
        $userId = $_SESSION['id'];
        if ($this->isPost()) {
            $userDetailsMapper->setUserDetails($userId, $_POST['imie'], $_POST['nazwisko'], $_POST['numerTel']);
            $userMapper->setUserDetails($userId, $userId);
            print_r(array_values($userMapper->getUserDetails($userId))); //todo do zrobienia ladny wyglad tego :)
        }
        $this->render('update');
    }
}