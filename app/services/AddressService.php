<?php
require_once __DIR__ . '/../repositories/AddressRepository.php';
class AddressService{
    
    private AddressRepository $addressRepository;

    public function __construct()
    {
        $this->addressRepository = new AddressRepository();
    }

    public function insertOne($address){
        $this->addressRepository->insertOne($address);
    }

    public function update($address){
        $this->addressRepository->update($address);
    }

    public function delete($id){
        $this->addressRepository->delete($id);
    }

    public function getAll(){
        return $this->addressRepository->getAll();
    }

    public function getById($id){
        return $this->addressRepository->getOne($id);
    }

    public function getByPostcodeAndHouseNumber($postcode, $housenumber, $extension) : ?Address{
        // Remove spaces from postcode
        $postcode = str_replace(" ", "", $postcode);
        
        //Calls the appropriate repository function based on whether or not the extension is null
        if($extension == null || $extension == ""){
            return $this->addressRepository->getByPostcodeAndHouseNumber($postcode, $housenumber);
        }
        else{
            //Remove spaces from extension
            $extension = str_replace(" ", "", $extension);
            return $this->addressRepository->getByPostcodeAndHouseNumberWithExtension($postcode, $housenumber, $extension);
        }
        
    }
}