<?php
include __DIR__ . '/../header.php';
?>

<h2>Repair - Service - Contact</h2><br>
<h5>Through the following form you can issue repair requests or contact requests.</h5>
<p>! This feature is only available for our active tenants. If you are not a tenant, but looking for a house, refer to the House Searching tab.</p><br>

<!-- Uses javascript and API -->
<form> 
<div class="form-group">
  <label for="postCodeField">Postcode</label>
  <input type="post-code" name='postcode' class="form-control" id="postCodeField" placeholder="1234AA" onchange=checkAddress()>

  <label for="houseNumberField">House Number</label>
  <input type="house-number" class="form-control" id="houseNumberField" placeholder="1" onchange=checkAddress()>
  
  <label for="houseNumberExtensionField">House Number Extension</label>
  <input type="house-number-extension" class="form-control" id="houseNumberExtensionField" placeholder="A" onchange=checkAddress()>
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
    <input id="firstNameField" type="first-name" class="form-control" placeholder="John" disabled>
    <label for="lastNameField">Last Name</label>
    <input id="lastNameField" type="last-name" class="form-control" placeholder="Smith" disabled>
  </div>
  <br>
  <div class="form-group">
    <label for="emailField">Email address</label>
    <input id="emailField" type="email" class="form-control"  placeholder="name@example.com" disabled>
    <label for="phoneField">Phone Number</label>
    <input id="phoneField" type="tel" class="form-control"  placeholder="06-12345678" disabled>
  </div>
  <br>
  <div class="form-group">
    <label for="reasonDropdown">Reason for Contact</label>
    <select id="reasonDropdown" class="form-control" disabled>
      <option value="Repair Request">Repair Request</option>
      <option value="Payment Question">Question about Payment</option>
      <option value="Contract Question">Question about Contract</option>
      <option value="Contract Cancellation">Contract Cancellation</option>
    </select>
  </div>
  <br>
  <div class="form-group">
    <label for="messageBox">Message</label>
    <textarea id="messageBox" name="message" class="form-control" rows="3" disabled placeholder="Write your request here."></textarea>
  </div>
  <br>
  <div class="form-group">
  <button type="button" id="submitButton" class="btn btn-primary" onclick=postContact() disabled >Submit Request</button>
  </div>
</form>

<script src="/js/ContactRequestForm.js"></script>

<?php
include __DIR__ . '/../footer.php';
?>