<?php

class HomeController
{
    public function index() : void
    {
        require __DIR__ . '/../views/home/index.php';
    }

    public function housesearch() : void
    {
        require __DIR__ . '/../views/home/housesearch.php';
    }

    public function articles() : void
    {
        require("../repository/ArticleRepository.php");
        $repository = new ArticleRepository();
        $articles = $repository->getAll();

        require("../views/index.php");
    }
}