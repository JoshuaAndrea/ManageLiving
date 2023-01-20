<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../services/UserService.php';

class EmployeeController
{
    private UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

   
}