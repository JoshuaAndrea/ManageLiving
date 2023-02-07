<?php
require_once __DIR__ . '/../services/AddressService.php';
require_once __DIR__ . '/../models/Address.php';

class EmployeeController
{
     public function portal()
     {
         $addressService = new AddressService();
         
         $addresses = $addressService->getAll();
         require __DIR__ . '/../views/employee/portal.php';
     }

}