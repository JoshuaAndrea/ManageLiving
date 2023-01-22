<?php
require_once __DIR__ . '/../repositories/ContactMomentRepository.php';
require_once __DIR__ . '/../models/ContactMoment.php';

class ContactMomentService{

    private ContactMomentRepository $contactMomentRepository;

    public function __construct(){
        $this->contactMomentRepository = new ContactMomentRepository();
    }

    public function insertContactRequest($data){
        //If data is null, return false
        if($data == null){
            throw new Exception("No data is received in service layer.");
        }

        //Form contactmoment from received data  
        $contactMoment = new ContactMoment();
        $contactMoment->setDatetime(date("d-m-Y H:i"));
        $contactMoment->setContactType("Contactform");
        $contactMoment->setTitle($data->reason);
        $contactMoment->setAddressId($data->addressId);
        $contactMoment->setIsResolved(false);
        
        $contactMoment->setMessage($data->message . " - " . $data->firstName . " " . $data->lastName . "//" . $data->phoneNumber . "//" . $data->email);

        return $this->contactMomentRepository->insertOne($contactMoment);
        
    }

    public function getAllForAddress(int $addressId) : array{
        return $this->contactMomentRepository->getAllForAddress($addressId);
    }

    public function getUnresolvedContactMoments(){
        return $this->contactMomentRepository->getAllUnresolvedContactMoments();
    }

    public function insertContactMoment($contactMoment) : void{
        $this->contactMomentRepository->insertOne($contactMoment);
    }

    public function updateContactMoment($contactMoment) : void{
        $this->contactMomentRepository->update($contactMoment);
    }

    public function deleteContactMoment($id) : void{
        $this->contactMomentRepository->delete($id);
    }
}