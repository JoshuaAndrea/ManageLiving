<?php
include __DIR__ . '/../header.php';
?>

<h2>Create a new User (Employee/Admin)</h2>

<form method='POST'>
    <div class="form-group">
        <h5>Login Credentials</h5>
        <label for="emailField">Email</label>
        <input id="emailField" type="email" class="form-control" name="email" placeholder="Employee@Manageliving.nl">
        <label for="passwordField">Password</label>
        <input id="passwordField" type="password" class="form-control" name="password" placeholder="Password">
    </div>
    <br>
    <div class="form-group">
        <h5>Personal Information</h5>
        <label for="firstNameField">First Name</label>
        <input id="firstNameField" type="text" class="form-control" name="firstName" placeholder="John">
        <label for="lastNameField">Last Name</label>
        <input id="lastNameField" type="text" class="form-control" name="lastName" placeholder="Doe">
    </div>
    <br>
    <div class="form-group">
        <h5>Employee Information</h5>
        <label for="roleField">Role</label>
        <select id="roleField" class="form-control" name="userType">
            <option value="Employee">Employee</option>
            <option value="Admin">Admin</option>
        </select>
    </div>
    <br>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Create User</button>
    </div>
</form>

<?php
include __DIR__ . '/../footer.php';
?>