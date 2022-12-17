<?php

class Router{

    public function route($url){
        
        require("../controller/HomeController.php");

        switch($url){
            case "/home/index":
            case "/":
                $controller = new HomeController();
                $controller->index();
                break;
            case "/home/about":
                $controller = new HomeController();
                $controller->about();
                break;
            case "/home/articles":
                $controller = new HomeController();
                $controller->articles();
                break;
            default:
                echo "Error 404 Page not found";
        }
    }
}
?>