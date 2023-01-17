<?php
require_once __DIR__ . '/../repositories/Repository.php';
class AddressRepository extends Repository{
    
    public function getAll() : array{

        require_once("../models/Address.php");

        $query = "SELECT * FROM address";
        $stmt = $this->connection->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Address');

        $result = $stmt->fetchAll();

        return $result;
    }

    public function getById($id) : Address{

        require_once("../models/Address.php");

        $query = "SELECT * FROM address WHERE id = :id";
        $stmt = $this->connection->prepare($query);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Address');

        $result = $stmt->fetch();

        return $result;
    }

    public function getByPostcodeAndHouseNumber($postcode, $housenumber, $extension) : Address{
            
            require_once("../models/Address.php");
            if($extension == null)
            {
                $query = "SELECT * FROM address WHERE postcode = :postcode AND housenumber = :housenumber";
            }
            else
            {
                $query = "SELECT * FROM address WHERE postcode = :postcode AND housenumber = :housenumber AND extension = :extension";
            }      
            $stmt = $this->connection->prepare($query);
            $stmt->bindParam(":postcode", $postcode);
            $stmt->bindParam(":housenumber", $housenumber);
            $stmt->bindParam(":extension", $extension);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Address');
    
            $result = $stmt->fetch();
    
            return $result;
    }
}