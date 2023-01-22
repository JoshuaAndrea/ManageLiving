<?php
  require_once('../services/AddressService.php');
  //Fetch all addresses from the database
  $addressService = new AddressService();
  $addresses = $addressService->getAll();

  include __DIR__ . '/employeeHeader.php';
?>

<div class="form-group">
    <label for="addressSelect">Select Address</label>
    <select id="addressSelect" class="form-control" onchange = updateTenantInfo()>
        <option value="0" disabled selected>Select an address</option>
        <?php
          //Load all fetched addresses into the view
          foreach ($addresses as $address) {
              $id = $address->getId();
              $streetname = $address->getStreetname();
              $housenumber = $address->getHousenumber();
              $extension = $address->getExtension();
              
              if ($extension == null) {
                  $extension = "";
              }

              $postcode = $address->getPostcode();
              $city = $address->getCity();
              $tenantId = $address->getTenantId();

              echo "<option value='$id'>$streetname $housenumber $extension, $postcode $city</option>";
          }
        ?>
    </select>
</div>

<div class="card text-white mb-3" style="max-width: 24rem; margin-top: 5rem;">
  <div class="card-header" style="background-color: rgb(63, 49, 250);">
    <h5 class="card-title" >Tenant Information</h5>
  </div>
  <div class="card-body" style="background-color: rgb(63, 49, 250);">
    <p class="card-text" id="tenantName">Name:</p>
    <p class="card-text" id="tenantPhoneNumber">Phone Nr:</p>
    <p class="card-text" id="tenantEmail">E-mail:</p>
    <p class="card-text" id="tenantDoB">Date of Birth:</p>
  </div>
</div>

<section id="contactMomentSection" style="margin-top: 6rem;">
  <h5>Contact Moments</h5>
  
  <div class="card mb-3" style="border-width: 2px; border-color: black;">
    <div class="card-header" style="background-color: rgb(245, 245, 245); ">
      <h5 class="card-title" id="contactMomentTitle">Test Contactmoment</h5>
    </div>
    <div class="card-body" style="background-color: rgb(245, 245, 245);">
      <p class="card-text" id="contactMomentMessage"></p>
    </div>
    <div class="card-footer" style="background-color: rgb(245, 245, 245);">
      <div class="d-inline">
        <button type="button" class="btn btn-primary" id="contactMomentUpdateBtn" onclick=updateContactMoment() disabled>Save changes</button>
      </div>
      <div class="d-inline" style="margin-left: 1rem;">
        <input type="checkbox" value="" id="resolvedCheckbox">
        <label for="resolvedCheckbox">Resolved</label>
      </div>
  </div>
</section>

<script src="../js/AddressPanel.js"></script>

<?php
  include __DIR__ . '/../footer.php';
?>