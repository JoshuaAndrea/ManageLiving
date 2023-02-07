<?php
require_once __DIR__ . '/../models/Tenant.php';
require_once __DIR__ . '/../services/TenantService.php';
require_once __DIR__ . '/../services/UserService.php';
require_once __DIR__ . '/../services/AddressService.php';
require_once __DIR__ . '/../services/TenantService.php';
require_once __DIR__ . '/../services/ContactMomentService.php';

class AdminController
{
    public function mainPanel() : void
    {
        require __DIR__ . '/../views/admin/mainPanel.php';
    }

    public function manageTenants() : void
    {
        $tenantService = new TenantService();
        
        $tenants = $tenantService->getAllTenants();
        require __DIR__ . '/../views/admin/manageTenants.php';
    }
    
    public function createUserView() : void
    {
        require __DIR__ . '/../views/admin/createUser.php';

        try {
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["createUser"])) {
                //Sanitise input
                $firstName = htmlspecialchars($_POST['firstName']);
                $lastName = htmlspecialchars($_POST['lastName']);
                $password = htmlspecialchars($_POST['password']);
                $email = htmlspecialchars($_POST['email']);
                $userType = htmlspecialchars($_POST['userType']);

                $userService = new UserService();
                $userService->createNewUser($email, $firstName, $lastName, $password, $userType);

                echo "<script>alert('User successfully created.'); location.href=''</script>";
            }
        }
        catch(Exception $ex){
            echo $ex->getMessage();
        }
    }
}