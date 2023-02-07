<?php
require_once(__DIR__ . '/../repositories/Repository.php');
require_once(__DIR__ . '/../models/Exceptions/DatabaseException.php');
class AddressRepository extends Repository{
    
    public function getAll() : array{
        require_once("../models/Address.php");

        $query = "SELECT * FROM address";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Address');

        $result = $stmt->fetchAll();

        return $result;
    }

    public function getById($id) : ?Address{

        require_once("../models/Address.php");

        $query = "SELECT * FROM address WHERE id = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->bindValue(":id", $id);
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Address');

        $result = $stmt->fetch();

        if(is_bool($result))
        return null;
    else
        return $result;
    }

    public function getByPostcodeAndHouseNumber($postcode, $housenumber) : ?Address{

        try {
            require_once("../models/Address.php");

            $query = "SELECT * FROM address WHERE postcode = :postcode AND housenumber = :housenumber";

            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(":postcode", $postcode);
            $stmt->bindValue(":housenumber", $housenumber);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Address');

            $result = $stmt->fetch();

            if (is_bool($result))
                return null;
            else
                return $result;
        }
        catch (PDOException $e) {
            throw new DatabaseException("PDO Exception: " . $e->getMessage());
        }
        catch(Exception $ex){
            throw new DatabaseException($ex->getMessage());
        }
    }

    public function getByPostcodeAndHouseNumberWithExtension($postcode, $housenumber, $extension): ?Address
    {

        try {
            require_once("../models/Address.php");

            $query = "SELECT * FROM address WHERE postcode = :postcode AND housenumber = :housenumber AND extension = :extension";

            $stmt = $this->pdo->prepare($query);
            $stmt->bindValue(":postcode", $postcode);
            $stmt->bindValue(":housenumber", $housenumber);
            $stmt->bindValue(":extension", $extension);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Address');

            $result = $stmt->fetch();

            if (is_bool($result))
                return null;
            else
                return $result;
        }
        catch (PDOException $e) {
            throw new DatabaseException("PDO Exception: " . $e->getMessage());
        }
        catch(Exception $ex){
            throw new DatabaseException($ex->getMessage());
        }
    }

    //Still needs parameter securing
    public function insertOne(Address $address){

        try {
            $query = "INSERT INTO `address` (`id`, `streetname`, `housenumber`, `extension`, `postcode`, `city`) VALUES (NULL, :streetname, :housenumber, :extension, :postcode, :city)";

            $stmt = $this->pdo->prepare($query);

            $streetname = $address->getStreetname();
            $housenumber = $address->getHousenumber();
            $extension = $address->getExtension();
            $postcode = $address->getPostcode();
            $city = $address->getCity();

            $stmt->bindValue(":streetname", $streetname);
            $stmt->bindValue(":housenumber", $housenumber);
            $stmt->bindValue(":extension", $extension);
            $stmt->bindValue(":postcode", $postcode);
            $stmt->bindValue(":city", $city);

            $stmt->execute();
        }
        catch (PDOException $e) {
            throw new DatabaseException("PDO Exception: " . $e->getMessage());
        }
        catch(Exception $ex){
            throw new DatabaseException($ex->getMessage());
        }
    }
}