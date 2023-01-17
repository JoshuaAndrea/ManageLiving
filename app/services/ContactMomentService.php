<?php
require_once __DIR__ . '/../repositories/ContactMomentRepository.php';

class ContactMomentService{

    private ContactMomentRepository $contactMomentRepository;

    public function __construct(){
        $this->contactMomentRepository = new ContactMomentRepository();
    }

    public function getAll(){
        return $this->contactMomentRepository->getContactMoments();
    }

    public function getContactMoment($id){
        return $this->contactMomentRepository->getContactMoment($id);
    }

    public function insertContactMoment($contactMoment){
        return $this->contactMomentRepository->insertOne($contactMoment);
    }

    public function updateContactMoment($contactMoment){
        return $this->contactMomentRepository->update($contactMoment);
    }

    public function deleteContactMoment($id){
        return $this->contactMomentRepository->delete($id);
    }
}