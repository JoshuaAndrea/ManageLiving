<?php
class AddressRepository extends Repository{

    public function getAll(){

        require_once("../models/Address.php");

        $stmt = $this->connection->prepare("SELECT * FROM address");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_CLASS, 'Address');

        $result = $stmt->fetchAll();

        return $result;
    }

}