<?php

class EmployeeController
{
     private $addressService;

     public function __construct()
     {
          $this->addressService = new AddressService();
     }

     public function portal()
     {
          $addresses = $this->addressService->getAll();
          require(__DIR__ . '/../views/employee/portal.php');
     }

}