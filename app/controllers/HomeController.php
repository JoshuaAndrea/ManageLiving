<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../services/UserService.php';

class HomeController
{
    private UserService $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function index() : void
    {
        require __DIR__ . '/../views/home/index.php';
    }

    public function housesearch() : void
    {
        require __DIR__ . '/../views/home/housesearch.php';
    }

    public function login() : void
    {
        require __DIR__ . '/../views/home/login.php';
        $this->verifyLogin();
    }

    public function verifyLogin() : void
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['loginRequest']))
        {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $user = $this->userService->verifyLogin($email, $password);

            if ($user == null) {
                $this->login();
            } 
            else {
                $_SESSION['user'] = $user;
                header('Location: /employee/main');
            }
        }
    }
}