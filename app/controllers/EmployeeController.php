<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/UserType.php';
require_once __DIR__ . '/../services/UserService.php';

class EmployeeController
{
    private UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function loadLoginScreen() : void
    {
        require __DIR__ . '/../views/employee/login.php';
    }

    public function login() : void
    {
        
    }
}