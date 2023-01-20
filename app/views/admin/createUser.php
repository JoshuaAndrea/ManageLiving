<?php
include __DIR__ . '/adminHeader.php';
?>

<h2>Create a New User (Employee / Admin)</h2>

<form method='POST'>
    <div class="form-group">
        <h5>Login Credentials</h5>
        <label for="emailField">Email</label>
        <input id="emailField" type="email" class="form-control" name="email" placeholder="Employee@Manageliving.nl" required>
        <label for="passwordField">Password</label>
        <input id="passwordField" type="password" class="form-control" name="password" placeholder="Password" required>
    </div>
    <br>
    <div class="form-group">
        <h5>Personal Information</h5>
        <label for="firstNameField">First Name</label>
        <input id="firstNameField" type="text" class="form-control" name="firstName" placeholder="John" required>
        <label for="lastNameField">Last Name</label>
        <input id="lastNameField" type="text" class="form-control" name="lastName" placeholder="Smith" required>
    </div>
    <br>
    <div class="form-group">
        <h5>Employee Information</h5>
        <label for="roleField">Role</label>
        <select id="roleField" class="form-control" name="userType" required>
            <option value="Employee">Employee</option>
            <option value="Admin">Admin</option>
        </select>
    </div>
    <br>
    <div class="form-group">
        <button type="submit" class="btn btn-primary" name="createUser">Create User</button>
    </div>
</form>

<?php
include __DIR__ . '/../footer.php';
?>