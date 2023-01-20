<?php
class APIController
{

    public function handlePostRequest($uri)
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $data = json_decode(file_get_contents("php://input"));

            switch ($uri) {
                case "/api/check-address":
                    $this->checkAddress($data);
                    break;
                case "/api/post-contactrequest":
                    $this->postContactRequest($data);
                    break;
            }
        }
    }

    public function checkAddress($data) //Checks for addresses based on data from tenant form
    {
        try {
            require_once(__DIR__ . '/../services/AddressService.php');
            $addressService = new AddressService();

            //Null check for data obj (is prevented in js, but just in case)
            if ($data == null) {
                throw new Exception("No data received.");
            }

            //Check for nulls before sanitising input
            if (isset($data->postcode)) {
                $data->postcode = htmlspecialchars($data->postcode);
            }
            if (isset($data->housenumber)) {
                $data->housenumber = htmlspecialchars($data->housenumber);
            }
            if (isset($data->extension)) {
                $data->extension = htmlspecialchars($data->extension);
            }
            
            header('Content-Type: application/json');
            $address = $addressService->getByPostcodeAndHouseNumber($data->postcode, $data->housenumber, $data->extension);

            if ($address == null) 
            {
                throw new Exception("No address found.");
            }
                
            //Return address
            echo json_encode($address);
        }
        catch (Exception $ex) {
            $this->sendErrorMessage($ex->getMessage());
        }
    }

    public function postContactRequest($data) //Inserts a contactmoment based on data from tenant form
    {
        require_once(__DIR__ . '/../services/ContactMomentService.php');
        $contactMomentService = new ContactMomentService();

        try {
            //Return error if data is null
            if ($data == null) {
                throw new Exception("No data received.");
            }
            //Return error if not all data is received, nothing should be null
            else if (
                !isset($data->firstName) || !isset($data->lastName) || !isset($data->email) || !isset($data->phoneNumber)
                || !isset($data->reason) || !isset($data->message) || !isset($data->addressId)
            ) {
                throw new Exception("Not all data received.");
            }

            //Sanitise data and try to insert contact moment
            $data->firstName = htmlspecialchars($data->firstName);
            $data->lastName = htmlspecialchars($data->lastName);
            $data->email = htmlspecialchars($data->email);
            $data->phoneNumber = htmlspecialchars($data->phoneNumber);
            $data->reason = htmlspecialchars($data->reason);
            $data->message = htmlspecialchars($data->message);
            $data->addressId = htmlspecialchars($data->addressId);

            $contactMomentService->insertContactRequest($data);
            $this->sendSuccessMessage("Contact request sent!");
            
        } 
        catch (Exception $ex) {
            $this->sendErrorMessage($ex->getMessage());
        }
    }

    private function sendErrorMessage($message)
    {
        header('Content-Type: application/json');
        echo json_encode(["error_message" => $message]);
    }

    private function sendSuccessMessage($message)
    {
        echo json_encode(["success_message" => $message]);
    }
}
?>