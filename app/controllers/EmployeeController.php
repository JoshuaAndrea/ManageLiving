<?php

class EmployeeController
{
    
    public function __construct()
    {

    }

   public function portal()
   {
        require(__DIR__ . '/../views/employee/portal.php');
   }

}