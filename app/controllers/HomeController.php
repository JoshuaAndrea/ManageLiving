<?php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../services/UserService.php';

class HomeController
{
    private $userService;

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

    public function contact(){
        require __DIR__ . '/../views/tenant/main.php';
    }

    public function login() : void
    {
        session_start();
        require __DIR__ . '/../views/home/login.php';
        
        if($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['loginRequest']))
        {
            $email = $_POST['email'];
            $password = $_POST['password'];

            //Sanitise input
            $email = htmlspecialchars($email);
            $password = htmlspecialchars($password);

            $user = $this->userService->verifyUser($email, $password);

            if ($user == null) {
                echo "<script>alert('Combination of email and password incorrect!');</script>";
                return;
            }
            else {
                //Store user in session
                $_SESSION['user'] = $user;
                
                echo "<script>alert('Login successful! Welcome, " . $user->getFirstname() . ".');</script>";
            }

            if($user->getUserType() == 'Employee'){
                echo "<script>location.href='/employee';</script>";
            }
            else if($user->getUserType() == 'Admin'){
                echo "<script>location.href='/admin';</script>";
            }
        }
    }
}