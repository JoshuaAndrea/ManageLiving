<?php

class Router{

    public function route($uri){
        
        require_once("../controllers/HomeController.php");
        require_once("../controllers/EmployeeController.php");
        require_once("../controllers/AdminController.php");
        require_once("../controllers/ApiController.php");

        $uri = strtolower($uri);

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
            case "/tenant/contactform":
                $controller = new HomeController();
                $controller->contact();
                break;
            case "/admin":
                $controller = new AdminController();
                $controller->mainPanel();
                break;
            case "/admin/createuser":
                $controller = new AdminController();
                $controller->createUserView();
                break;
            case "/admin/managetenants":
                $controller = new AdminController();
                $controller->manageTenants();
                break;
            case "/employee":
                $controller = new EmployeeController();
                $controller->portal();
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