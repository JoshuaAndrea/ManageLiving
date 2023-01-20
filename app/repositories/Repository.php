<?php
class Repository
{
    protected $pdo;

    public function __construct()
    {
        require_once("../config/dbconfig.php");

        try
        {
            $this->pdo = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
        } 
        catch (PDOException $ex)
        {
            echo $ex->getMessage();
        }
    }
}