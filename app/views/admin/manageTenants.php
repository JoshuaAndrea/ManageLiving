<?php
include __DIR__ . '/adminHeader.php';
require_once('../services/TenantService.php');

$tenantService = new TenantService();
$tenants = $tenantService->getAllTenants();
?>

<h2>Manage Tenants</h2>

<div class="form-group">
    <label for="tenantSelect">Select Tenant</label>
    <select id="tenantSelect" class="form-control" onchange = updateTenantForm()>
        <?php
        foreach ($tenants as $tenant) {
            $id = $tenant->getId();
            $firstName = $tenant->getFirstName();
            $lastName = $tenant->getLastName();
            echo "<option value='$id'> ($id) $firstName $lastName</option>";
        }
        ?>
    </select>
</div>

<br>

<form>
    <div class="form-group">
        <h5>Personal Information</h5>

        <label for="firstNameField">First Name</label>
        <input id="firstNameField" type="text" class="form-control" placeholder="John" required>

        <label for="lastNameField">Last Name</label>
        <input id="lastNameField" type="text" class="form-control" placeholder="Smith" required>

        <label for="dateOfBirthField">Date of Birth</label>
        <input id="dateOfBirthField" type="text" class="form-control" placeholder="01-01-2000" required>
    </div>

    <br>

    <div class="form-group">
        <h5>Contact Information</h5>
        <label for="emailField">Email address</label>
        <input id="emailField" type="email" class="form-control" placeholder="name@example.com" required>

        <label for="phoneField">Phone Number</label>
        <input id="phoneField" type="tel" class="form-control" placeholder="06-12345678"required>
    </div>

    <br>

    <div class="form-group">
        <button id="updateTenantBtn" type="button" class="btn btn-primary" onclick=updateTenant()>Update Selected Tenant</button>
        <button id="createTenantBtn" type="button" class="btn btn-danger" onclick=deleteTenant()>Delete Selected Tenant</button>
        <button id="deleteTenantBtn" type="button" class="btn btn-success" onclick=createTenant()>Create New Tenant</button>
    </div>
</form>

<script src="../js/ManageTenants.js"></script>
<?php
include __DIR__ . '/../footer.php';
?>