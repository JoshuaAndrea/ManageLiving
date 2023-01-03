<?php

class HomeController{

    public function index(){
        echo "This is the index page of our website!";
    }

    public function about(){
        echo "This is the about page of our website!";
    }

    public function articles(){
        require("../repository/ArticleRepository.php");
        $repository = new ArticleRepository();
        $articles = $repository->getAll();

        require("../view/index.php");
    }
}