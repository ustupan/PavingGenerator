<?php

require_once('controllers/DefaultController.php');
require_once('controllers/PersonalDataController.php');
require_once('controllers/AdminController.php');
require_once('controllers/PavingController.php');

class Routing
{
    public $routes = [];

    public function __construct()
    {
        $this->routes = [
            'index' => [
                'controller' => 'DefaultController',
                'action' => 'index'
            ],
            'login' => [
                'controller' => 'DefaultController',
                'action' => 'login'
            ],
            'logout' => [
                'controller' => 'DefaultController',
                'action' => 'logout'
            ],
            'register' => [
                'controller' => 'DefaultController',
                'action' => 'register'
            ],
            'update' => [
                'controller' => 'PersonalDataController',
                'action' => 'update'
            ],
            'display' => [
                'controller' => 'PersonalDataController',
                'action' => 'display'
            ],
            'adminPanel' => [
                'controller' => 'AdminController',
                'action' => 'adminPanel'
            ],
            'admin_users' => [
                'controller' => 'AdminController',
                'action' => 'getUsers'
            ],
            'admin_delete_user' => [
                'controller' => 'AdminController',
                'action' => 'userDelete'
            ],
            'paving' => [
                'controller' => 'PavingController',
                'action' => 'paving'
            ]
        ];
    }

    public function run()
    {
        $page = isset($_GET['page'])
        && isset($this->routes[$_GET['page']]) ? $_GET['page'] : 'index';

        if ($this->routes[$page]) {
            $class = $this->routes[$page]['controller'];
            $action = $this->routes[$page]['action'];

            $object = new $class;
            $object->$action();
        }
    }

}