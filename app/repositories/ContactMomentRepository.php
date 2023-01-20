<?php
require_once __DIR__ . '/../repositories/Repository.php';
require_once __DIR__ . '/../models/ContactMoment.php';

class ContactMomentRepository extends Repository{
    
    public function insertOne(ContactMoment $contactMoment){

        try {
            $query = "INSERT INTO `contactMoment` (`contactMomentId`, `datetime`, `contactType`, `title`, `message`, `isResolved`, `addressId`) VALUES (NULL, :datetime, :contactType, :title, :message, :isResolved, :addressId)";
        
            $stmt = $this->connection->prepare($query);

            $date = $contactMoment->getDatetime();
            $contactType = $contactMoment->getContactType();
            $title = $contactMoment->getTitle();
            $message = $contactMoment->getMessage();
            $isResolved = $contactMoment->getIsResolved();
            $addressId = $contactMoment->getAddressId();

            $stmt->bindValue(":datetime", $date);
            $stmt->bindValue(":contactType", $contactType);
            $stmt->bindValue(":title", $title);
            $stmt->bindValue(":message", $message);
            $stmt->bindValue(":isResolved", (int)$isResolved);
            $stmt->bindValue(":addressId", $addressId);
            $stmt->execute();
        }
        catch (PDOException $e) {
            throw $e;
        }
    }
}