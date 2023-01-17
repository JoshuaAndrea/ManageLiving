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
}