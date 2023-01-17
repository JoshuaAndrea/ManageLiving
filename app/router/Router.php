<?php

class Router{

    public function route($uri){
        
        require_once("../controllers/HomeController.php");
        require_once("../controllers/EmployeeController.php");
        require_once("../controllers/TenantController.php");

        switch($uri){
            case "/home/index":
            case "/":
                $controller = new HomeController();
                $controller->index();
                break;
            case "/home/housesearch":
                $controller = new HomeController();
                $controller->housesearch();
                break;
            case "/employee/login":
                $controller = new EmployeeController();
                $controller->loadLoginScreen();
                break;
            case "/tenant/main":
                $controller = new TenantController();
                $controller->main();
                break;
            default:
                echo "Error 404 Page not found";
        }
    }
}
?>