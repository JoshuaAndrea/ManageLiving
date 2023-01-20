<?php

class Router{

    public function route($uri){
        
        require_once("../controllers/HomeController.php");
        require_once("../controllers/EmployeeController.php");
        require_once("../controllers/TenantController.php");
        require_once("../controllers/AdminController.php");
        require_once("../controllers/ApiController.php");

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
            case "/home/login":
                $controller = new HomeController();
                $controller->login();
                break;
            case "/tenant/main":
                $controller = new TenantController();
                $controller->main();
                break;
            case "/admin/createUser":
                $controller = new AdminController();
                $controller->createUser();
                break;
            case str_contains($uri, "/api/"):
                $controller = new APIController();
                $controller->handlePostRequest($uri);
                break;
            default:
                echo "Error 404 Page not found";
        }
    }
}
?>