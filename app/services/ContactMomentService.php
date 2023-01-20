<?php
require_once __DIR__ . '/../repositories/ContactMomentRepository.php';
require_once __DIR__ . '/../models/ContactMoment.php';

class ContactMomentService{

    private ContactMomentRepository $contactMomentRepository;

    public function __construct(){
        $this->contactMomentRepository = new ContactMomentRepository();
    }

    public function insertContactRequest($data){
        try{
            //If data is null, return false
            if($data == null){
                throw new Exception("");
            }

            //Form contactmoment from received data  
            $contactMoment = new ContactMoment();
            $contactMoment->setId(null);
            $contactMoment->setDatetime(date("d-m-Y H:i"));
            $contactMoment->setContactType("Contactform");
            $contactMoment->setTitle($data->reason);
            $contactMoment->setAddressId($data->addressId);
            $contactMoment->setIsResolved(false);
            
            $contactMoment->setMessage($data->firstName . " " . $data->lastName . " / " . $data->phoneNumber . " / " . $data->email . " / " . $data->message);

            return $this->contactMomentRepository->insertOne($contactMoment);
        }
        catch(PDOException $ex){
            throw $ex;
        }
        catch(Exception $ex){
            throw new Exception("Something went wrong in the service.");
        }
    }

    public function getAllForAddress(int $addressId){
        return $this->contactMomentRepository->getAllForAddress($addressId);
    }

    public function getContactMoment($id){
        return $this->contactMomentRepository->getContactMoment($id);
    }

    public function getUnresolvedContactMoments(){
        return $this->contactMomentRepository->getAllUnresolvedContactMoments();
    }

    public function insertContactMoment($contactMoment) : bool{
        return $this->contactMomentRepository->insertOne($contactMoment);
    }

    public function updateContactMoment($contactMoment){
        return $this->contactMomentRepository->update($contactMoment);
    }

    public function deleteContactMoment($id){
        return $this->contactMomentRepository->delete($id);
    }
}