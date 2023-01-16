<?php
include __DIR__ . '/../header.php';
$error = "";
?>

<h2>Repair - Service - Contact</h2><br>
<h5>Through the following form you can issue repair requests or contact requests.</h5>
<p>! This feature is only available for our tenants. If you are looking for a house, refer to the House Searching tab.</p><br>

<form method="POST">
<div class="form-group">
    
    <label for="firstNameField">First Name</label>
    <label for="surNameField">Surname</label>
    
    <span class = "inline">
    <input type="first-name" class="form-control" id="firstNameField" placeholder="John">
    <input type="surname" class="form-control" id="surNameField" placeholder="Doe">
    </span>
  </div>
  <div class="form-group">
    <label for="emailField">Email address</label>
    <input type="email" class="form-control" id="emailField" placeholder="name@example.com">
  </div>
  <div class="form-group">
    <label for="reasonDropdown">Reason for Contact</label>
    <select class="form-control" id="reasonDropdown">
      <option>Repair Request</option>
      <option>Question about Payment</option>
      <option>Question about Contract</option>
      <option>Contract Cancellation</option>
    </select>
  </div>
  <div class="form-group">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Example textarea</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <div class="form-group">
  <button type="submit" class="btn btn-primary" href="/">Submit Request</button>
  <label class="m-2 text-danger"><?php echo $error?></label>
  </div>
  
</form>

<?php
include __DIR__ . '/../footer.php';
?>