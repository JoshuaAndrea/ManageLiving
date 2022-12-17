<?php
$url = $_SERVER['REQUEST_URI'];

require_once("../router/Router.php");

$router = new Router();
$router->route($url);

?>