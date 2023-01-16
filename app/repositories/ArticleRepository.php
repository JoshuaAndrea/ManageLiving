<?php
class ArticleRepository extends Repository{

    private $connection;
    

    public function __construct(){
        
        require_once("../dbconfig.php");
        $db_host = "mysql";
        $db_name = "blogdb";
        $db_username = "root";
        $db_password = "secret123";

        try{
            $this->connection = new PDO(
                "mysql:host=$db_host;dbname=$db_name",
                $db_username,
                $db_password
            );
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }

    public function getAll(){

        require_once("../model/Article.php");

        $stmt = $this->connection->prepare("SELECT * FROM articles");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Article');

        $result = $stmt->fetchAll();

        return $result;
    }
}