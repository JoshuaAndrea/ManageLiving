function fetchAddress() {
    const addressText = document.getElementById("address");

    var postcode = document.getElementById("postCodeField").value;
    var housenumber = document.getElementById("houseNumberField").value;
    var extension = document.getElementById("houseNumberExtensionField").value;

    if (postcode == null || postcode == "" || housenumber == null || housenumber == "") {
        return;
    }
    
    const newAddressText = postcode + " " + housenumber + "-" + extension;
    addressText.innerHTML = newAddressText;


    
}