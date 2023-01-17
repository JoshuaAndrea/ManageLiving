<?php
class Repository
{
    protected $connection;

    public function __construct()
    {
        require_once("../config.php");
        try 
        {
            $this->connection = new PDO("mysql:host=$db_host;dbname=$db_name", $db_username, $db_password);
        } 
        catch (PDOException $ex)
        {
            echo $ex->getMessage();
        }
    }
}