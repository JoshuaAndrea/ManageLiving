<?php

class HomeController{

    public function index() : void
    {
        echo "This is the index page of our website!";
    }

    public function about() : void
    {
        echo "This is the about page of our website!";
    }

    public function articles() : void
    {
        require("../repository/ArticleRepository.php");
        $repository = new ArticleRepository();
        $articles = $repository->getAll();

        require("../view/index.php");
    }
}