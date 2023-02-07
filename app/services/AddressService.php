<?php
require_once __DIR__ . '/../repositories/AddressRepository.php';
class AddressService{
    
    private AddressRepository $addressRepository;

    public function __construct()
    {
        $this->addressRepository = new AddressRepository();
    }

    public function getAll() : array{
        
        $addresses = $this->addressRepository->getAll();
        arsort($addresses);
        return $addresses;
    }

    public function getById($id){
        return $this->addressRepository->getById($id);
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