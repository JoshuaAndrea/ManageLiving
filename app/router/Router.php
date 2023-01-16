<?php

class Router{

    public function route($uri){
        
        require("../controllers/HomeController.php");
        require("../controllers/EmployeeController.php");
        require("../controllers/TenantController.php");

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
                $controller->login();
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