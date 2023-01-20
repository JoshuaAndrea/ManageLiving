<?php
require_once(__DIR__ . '/../models/ContactMoment.php');
class TenantController
{

    public function main() : void
    {
        require __DIR__ . '/../views/tenant/main.php';
    }

    public function postContactRequest(){
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['postContactRequest'])){
             
            $postcode = htmlspecialchars($_POST['postcode']);
            $housenumber = htmlspecialchars($_POST['housenumber']);

            $contactMomentService = new ContactMomentService();
            $contactMomentService->insertOne();
        }
    }
}