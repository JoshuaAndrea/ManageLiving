<?php
require_once __DIR__ . '/../repositories/Repository.php';
class AddressRepository extends Repository{
    
    public function getAll(){

        require_once("../models/Address.php");

        $query = "SELECT * FROM address";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Address');

        $result = $stmt->fetchAll();

        return $result;
    }

    public function getById($id) : ?Address{

        require_once("../models/Address.php");

        $query = "SELECT * FROM address WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Address');

        $result = $stmt->fetch();

        if(is_bool($result))
        return null;
    else
        return $result;
    }

    public function getByPostcodeAndHouseNumber($postcode, $housenumber) : ?Address{
            
        require_once("../models/Address.php");
        
        $query = "SELECT * FROM address WHERE postcode = :postcode AND housenumber = :housenumber";
        
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(":postcode", $postcode);
        $stmt->bindParam(":housenumber", $housenumber);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Address');

        $result = $stmt->fetch();

        if(is_bool($result))
            return null;
        else
            return $result;
    }

   public function getByPostcodeAndHouseNumberWithExtension($postcode, $housenumber, $extension) : ?Address{
    
        require_once("../models/Address.php");
        
        $query = "SELECT * FROM address WHERE postcode = :postcode AND housenumber = :housenumber AND extension = :extension";

        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(":postcode", $postcode);
        $stmt->bindParam(":housenumber", $housenumber);
        $stmt->bindParam(":extension", $extension);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Address');

        $result = $stmt->fetch();

        if(is_bool($result))
            return null;
        else
            return $result;
   }
}