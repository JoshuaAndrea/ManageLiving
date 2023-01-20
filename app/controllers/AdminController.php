<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../services/UserService.php';
require_once __DIR__ . '/../services/AddressService.php';
require_once __DIR__ . '/../services/TenantService.php';
require_once __DIR__ . '/../services/ContactMomentService.php';

class AdminController
{
    public function createUser() : void
    {
        require __DIR__ . '/../views/admin/createUser.php';
        $this->insertUser();
    }

    public function insertUser(){
        if(SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['insertUser'])){
            $firstName = htmlspecialchars($_POST['firstName']);
            $lastName = htmlspecialchars($_POST['lastName']);
            $password = htmlspecialchars($_POST['password']);
            $email = htmlspecialchars($_POST['email']);
            $userType = htmlspecialchars($_POST['role']);

            $userService = new UserService();
            $userService->createNewUser($firstName, $lastName, $email, $password);
        }
    }
}