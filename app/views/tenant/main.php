<?php
include __DIR__ . '/../header.php';
$error = "";
?>

<h2>Repair - Service - Contact</h2><br>
<h5>Through the following form you can issue repair requests or contact requests.</h5>
<p>! This feature is only available for our tenants. If you are looking for a house, refer to the House Searching tab.</p><br>

<form method="POST">
<div class="form-group">
  <label for="postCodeField">Postcode</label>
  <input type="post-code" class="form-control" id="postCodeField" placeholder="1234AA" onchange=generateAddress()>
  <label for="houseNumberField">House Number</label>
  <input type="house-number" class="form-control" id="houseNumberField" placeholder="1" onchange=generateAddress()>
  <label for="houseNumberExtensionField">House Number Extension</label>
  <input type="house-number-extension" class="form-control" id="houseNumberExtensionField" placeholder="A" onchange=generateAddress()>
</div>
<br>
<div>
  <p>
    Address: <div id="address"></div>
  </p>
</div>
<br>
<div class="form-group">
    <label for="firstNameField">First Name</label>
    <input type="first-name" class="form-control" id="firstNameField" placeholder="John">
    <label for="familyNameField">Family Name</label>
    <input type="surname" class="form-control" id="familyNameField" placeholder="Smith">
  </div>
  <br>
  <div class="form-group">
    <label for="emailField">Email address</label>
    <input type="email" class="form-control" id="emailField" placeholder="name@example.com">
    <label for="phoneField">Phone Number</label>
    <input type="tel" class="form-control" id="phoneField" placeholder="06-12345678">
  </div>
  <br>
  <div class="form-group">
    <label for="reasonDropdown">Reason for Contact</label>
    <select class="form-control" id="reasonDropdown">
      <option>Repair Request</option>
      <option>Question about Payment</option>
      <option>Question about Contract</option>
      <option>Contract Cancellation</option>
    </select>
  </div>
  <br>
  <div class="form-group">
    <label for="messageBox">Message</label>
    <textarea class="form-control" id="messageBox" rows="3"></textarea>
  </div>
  <br>
  <div class="form-group">
  <button type="submit" class="btn btn-primary">Submit Request</button>
  <label class="m-2 text-danger"><?php echo $error?></label>
  </div>
</form>

<script src="/js/test.js"></script>
<script src="/js/AddressFetcher.js"></script>

<?php
include __DIR__ . '/../footer.php';
?>