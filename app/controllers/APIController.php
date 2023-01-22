<?php
class APIController
{

    public function handlePostRequest($uri)
    {
        try{
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $data = json_decode(file_get_contents("php://input"));
    
                switch ($uri) {
                    case "/api/check-address":
                        $this->checkAddress($data);
                        break;
                    case "/api/post-contactrequest":
                        $this->postContactRequest($data);
                        break;
                    case "/api/update-tenant":
                        $this->updateTenant($data);
                        break;
                    case "/api/delete-tenant":
                        $this->deleteTenant($data);
                        break;
                    case "/api/insert-tenant":
                        $this->insertTenant($data);
                        break;
                    case "/api/get-tenant":
                        $this->getTenantById($data);
                        break;
                    case "/api/logout":
                        $this->logout();
                        break;
                    default:
                        $this->sendErrorMessage("Invalid URI");
                        break;
                }
            }
        }
        catch(Exception $ex){
            $this->sendErrorMessage($ex->getMessage());
        }
    }


    private function checkAddress($data) //Checks for addresses based on data from contact request form
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

    private function postContactRequest($data) //Inserts a contactmoment based on data from contact request form
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

    private function getTenantById($data) //Gets tenant by id
    {
        try{
            require_once(__DIR__ . '/../services/TenantService.php');
            $tenantService = new TenantService();

            if ($data == null) {
                throw new Exception("No data received.");
            }
            else if (!isset($data->tenantId)) {
                throw new Exception("No ID received.");
            }
            //Sanitise data
            $id = htmlspecialchars($data->tenantId);
        
            header('Content-Type: application/json');
            $tenant = $tenantService->getTenantById($id);
            echo json_encode($tenant);
        }
        catch (Exception $ex) {
            $this->sendErrorMessage($ex->getMessage());
        }
    }

    private function updateTenant($data) //Updates a tenant
    {
        require_once(__DIR__ . '/../services/TenantService.php');
        $tenantService = new TenantService();

        try {
            //Return error if data is null
            if ($data == null) {
                throw new Exception("No data received.");
            }
            //Return error if not all data is received, nothing should be null
            else if (!isset($data->tenantId) || !isset($data->firstName) || !isset($data->lastName) || 
                     !isset($data->email) || !isset($data->phoneNumber) || !isset($data->dateOfBirth))
            {
                throw new Exception("Not all data received.");
            }

            //Sanitise data and try to update tenant
            $data->tenantId = htmlspecialchars($data->tenantId);
            $data->firstName = htmlspecialchars($data->firstName);
            $data->lastName = htmlspecialchars($data->lastName);
            $data->email = htmlspecialchars($data->email);
            $data->phoneNumber = htmlspecialchars($data->phoneNumber);
            $data->dateOfBirth = htmlspecialchars($data->dateOfBirth);

            $tenantService->updateTenant($data);
            $this->sendSuccessMessage("Tenant successfully updated!");
            
        } 
        catch (Exception $ex) {
            $this->sendErrorMessage($ex->getMessage());
        }
    }

    private function deleteTenant($data) //Deletes a tenant
    {
        require_once(__DIR__ . '/../services/TenantService.php');
        $tenantService = new TenantService();

        try {
            //Return error if data is null
            if ($data == null) {
                throw new Exception("No data received.");
            }

            //Sanitise data and try to delete tenant
            $data->tenantId = htmlspecialchars($data->tenantId);

            $tenantService->deleteTenant($data->tenantId);
            $this->sendSuccessMessage("Tenant successfully deleted!");
            
        } 
        catch (Exception $ex) {
            $this->sendErrorMessage($ex->getMessage());
        }
    }

    private function insertTenant($data) //Inserts a new tenant
    { 
        require_once(__DIR__ . '/../services/TenantService.php');
        $tenantService = new TenantService();

        try{
            //Return error if data is null
            if ($data == null) {
                throw new Exception("No data received.");
            }
            //Return error if not all data is received, nothing should be null
            else if (!isset($data->firstName) || !isset($data->lastName) || 
                     !isset($data->email) || !isset($data->phoneNumber) || !isset($data->dateOfBirth))
            {
                throw new Exception("Not all data received.");
            }

            //Sanitise data and try to insert tenant
            $data->firstName = htmlspecialchars($data->firstName);
            $data->lastName = htmlspecialchars($data->lastName);
            $data->email = htmlspecialchars($data->email);
            $data->phoneNumber = htmlspecialchars($data->phoneNumber);
            $data->dateOfBirth = htmlspecialchars($data->dateOfBirth);

            $tenantService->insertTenant($data);
            $this->sendSuccessMessage("Tenant " . $data->firstName . " " . $data->lastName . " successfully added!");
            
        } 
        catch (Exception $ex) {
            $this->sendErrorMessage($ex->getMessage());
        }
        catch (Exception $ex) {
            $this->sendErrorMessage($ex->getMessage());
        }
    }

    private function logout(){
        try {
            session_start();
            session_destroy();
            $this->sendSuccessMessage("Logged out successfully!");
        }
        catch(Exception $ex){
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
        header('Content-Type: application/json');
        echo json_encode(["success_message" => $message]);
    }
}
?>