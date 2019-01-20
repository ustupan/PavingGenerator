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
        if(!isset($_SESSION) || empty($_SESSION)){
            $url = "http://$_SERVER[HTTP_HOST]/GeneratorKostki";
            header("Location: {$url}?page=login");
        }
        else{
            $userDetailsMapper = new UserDetailsMapper();
            $userMapper = new UserMapper();
            $userId = (int)$_SESSION['id'];
            if ($this->isPost()) {
                if($userDetailsMapper->getUserDetails($userId)){
                    $userDetailsMapper->updateUserDetails($userId, $_POST['imie'], $_POST['nazwisko'], $_POST['numerTel']);
                    print_r(array_values($userMapper->getUserDetails($userId)));
                }
                else{
                    $userDetailsMapper->setUserDetails($userId, $_POST['imie'], $_POST['nazwisko'], $_POST['numerTel']);
                    $userMapper->setUserDetails($userId, $userId);
                }
                print_r(array_values($userMapper->getUserDetails($userId)));
            }
            $this->render('update');
        }
    }

    public function display()
    {
        if(!isset($_SESSION) || empty($_SESSION)){
            $url = "http://$_SERVER[HTTP_HOST]/GeneratorKostki";
            header("Location: {$url}?page=login");
        }
        else{
            $userDetailsMapper = new UserDetailsMapper();
            if($userDetailsMapper->getUserDetails($_SESSION['id'])) {
                $userMapper = new UserMapper();
                $this->render('display', [ 'userDetails' => $userMapper->getUserDetails($_SESSION['id'])]);
            }
            else{
                $this->render('display', [ 'userDetails' => 0,0,0,0]);
            }
        }
    }
}
