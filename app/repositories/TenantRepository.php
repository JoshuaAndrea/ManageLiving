<?php
require_once __DIR__ . '/../repositories/Repository.php';
require_once __DIR__ . '/../models/Tenant.php';
require_once __DIR__ . '/../models/Exceptions/DatabaseException.php';

class TenantRepository extends Repository{

    public function getAllTenants() : array{
        try
        {
            $query = "SELECT * FROM tenant";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Tenant');

            $result = $stmt->fetchAll();

            return $result;
        }
        catch(PDOException $ex)
        {
            throw new DatabaseException("PDO Exception: " . $ex->getMessage());
        }
        catch(Exception $ex)
        {
            throw new DatabaseException($ex->getMessage());
        }
    }

    public function getTenantById(int $id) : ?Tenant{
        try {
            $query = "SELECT * FROM tenant WHERE tenantId = :id";
            $stmt = $this->pdo->prepare($query);

            $stmt->bindValue(":id", $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Tenant');

            $result = $stmt->fetch();

            if (is_bool($result))
                return null;
            else
                return $result;
        }
        catch(PDOException $ex)
        {
            throw new DatabaseException("PDO Exception: " . $ex->getMessage());
        }
        catch(Exception $ex)
        {
            throw new DatabaseException($ex->getMessage());
        }
    }

    public function getTenantByAddressId($id){
        try 
        {
            $query = "SELECT * FROM tenant WHERE addressId = :id";
            $stmt = $this->pdo->prepare($query);

            $stmt->bindValue(":id", $id);
            $stmt->execute();
            $stmt->setFetchMode(PDO::FETCH_CLASS, 'Tenant');

            $result = $stmt->fetch();

            if (is_bool($result))
                return null;
            else
                return $result;
        }
        catch(PDOException $ex)
        {
            throw new DatabaseException("PDO Exception: " . $ex->getMessage());
        }
        catch(Exception $ex)
        {
            throw new DatabaseException($ex->getMessage());
        }
    }

    public function insertTenant(Tenant $tenant) : void
    {
        try
        {
            $query = "INSERT INTO tenant (firstName, lastName, email, phoneNumber, dateOfBirth) VALUES (:firstName, :lastName, :email, :phoneNumber, :dateOfBirth)";
            $stmt = $this->pdo->prepare($query);
            
            $stmt->bindValue(":firstName", $tenant->getFirstName());
            $stmt->bindValue(":lastName", $tenant->getLastName());
            $stmt->bindValue(":email", $tenant->getEmail());
            $stmt->bindValue(":phoneNumber", $tenant->getPhoneNumber());
            $stmt->bindValue(":dateOfBirth", $tenant->getDateOfBirth());
            
            $stmt->execute();
        }
        catch(PDOException $ex)
        {
            throw new DatabaseException("PDO Exception: " . $ex->getMessage());
        }
        catch(Exception $ex)
        {
            throw new DatabaseException($ex->getMessage());
        }
    }

    public function updateTenant(Tenant $tenant) : void
    {
        try
        {
            $query = "UPDATE tenant SET firstName = :firstName, lastName = :lastName, email = :email, phoneNumber = :phoneNumber, dateOfBirth = :dateOfBirth WHERE tenantId = :id";
            $stmt = $this->pdo->prepare($query);
            
            $stmt->bindValue(":firstName", $tenant->getFirstName());
            $stmt->bindValue(":lastName", $tenant->getLastName());
            $stmt->bindValue(":email", $tenant->getEmail());
            $stmt->bindValue(":phoneNumber", $tenant->getPhoneNumber());
            $stmt->bindValue(":dateOfBirth", $tenant->getDateOfBirth());
            $stmt->bindValue(":id", $tenant->getId());
            
            $stmt->execute();
        }
        catch(PDOException $ex)
        {
            throw new DatabaseException("PDO Exception: " . $ex->getMessage());
        }
        catch(Exception $ex)
        {
            throw new DatabaseException($ex->getMessage());
        }
    }

    public function deleteTenant($id) : void
    {
        try
        {
            $query = "DELETE FROM tenant WHERE tenantId = :id";
            $stmt = $this->pdo->prepare($query);
            
            $stmt->bindValue(":id", $id);
    
            $stmt->execute();
        }
        catch(PDOException $ex)
        {
            throw new DatabaseException("PDO Exception: " . $ex->getMessage());
        }
        catch(Exception $ex)
        {
            throw new DatabaseException($ex->getMessage());
        }
    }
}