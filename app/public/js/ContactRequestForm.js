const firstNameField = document.getElementById("firstNameField");
const lastNameField = document.getElementById("lastNameField");
const emailField = document.getElementById("emailField");
const phoneField = document.getElementById("phoneField");
const reasonDropdown = document.getElementById("reasonDropdown");
const messageBox = document.getElementById("messageBox");
const submitButton = document.getElementById("submitButton");
const addressText = document.getElementById("address");

var fetchedAddress;

function checkAddress() //Will take postcode, housenumber, extension input and retrieve an address from db through api
{
    const addressText = document.getElementById("address");
    
    //Retrieve input from fields
    var postcode = document.getElementById("postCodeField").value;
    var housenumber = document.getElementById("houseNumberField").value;
    
    //Display error message if one of the fields is empty, otherwise send request
    if (postcode == null || postcode == "" || housenumber == null || housenumber == "") {
        disableForm();
        addressText.innerHTML = "";
        return;
    }
    else{
        //Check if housenumber is integer
        housenumber = parseInt(housenumber);

        if (isNaN(housenumber)){
            displayAddressWarning("Housenumber should be a whole number");
            disableForm();
            return;
        }

        checkAddressRequest();
    }
}

function checkAddressRequest(){
    
    //Create data obj
    const data = {
        postcode: document.getElementById("postCodeField").value,
        housenumber: document.getElementById("houseNumberField").value,
        extension: document.getElementById("houseNumberExtensionField").value
    };

    //Send request through api
    fetch("/api/check-address", {
        method: "POST",
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    //Check if there is an error message from api
    .then(data => {
        if (data.error_message != null){ 
            addressText.style.color = "red";
            addressText.innerHTML = "Address not found";
            disableForm();
        }
        else{
            fetchedAddress = data;
            addressText.style.color = "green";

            if (fetchedAddress.extension == null){
                fetchedAddress.extension = "";
            }
            addressText.innerHTML = fetchedAddress.streetname + " " + fetchedAddress.housenumber + fetchedAddress.extension + ", " + fetchedAddress.postcode + ", " + fetchedAddress.city;
            enableForm();
        }
    })
}

function postContact(){
    
    //Create data obj
    const data = {
        firstName: firstNameField.value,
        lastName: lastNameField.value,
        email: emailField.value,
        phoneNumber: phoneField.value,
        reason: reasonDropdown.value,
        message: messageBox.value,
        addressId: fetchedAddress.addressId
    };

    //Send request through api
    fetch("/api/post-contactrequest", {
        method: "POST",
        body: JSON.stringify(data),
    })
    .then(response => response.json())
    .then(data => {
        if (data.error_message != null){ 
            alert(data.error_message);
        }
        else{
            alert(data.success_message);
            window.location = 'http://localhost/';
        }
    })
}

//If there's time I'll check if email input is a valid email
function checkEmailInput(){
    
}

function displayAddressWarning(warning){
    const addressText = document.getElementById("address");
    addressText.style.color = "red";
    addressText.innerHTML = warning;
}

function enableForm(){
    //Enable fields and button
    firstNameField.disabled = false;
    lastNameField.disabled = false;
    emailField.disabled = false;
    phoneField.disabled = false;
    reasonDropdown.disabled = false;
    messageBox.disabled = false;
    submitButton.disabled = false;
}

function disableForm(){
    //Disable fields and button
    firstNameField.disabled = true;
    lastNameField.disabled = true;
    emailField.disabled = true;
    phoneField.disabled = true;
    reasonDropdown.disabled = true;
    messageBox.disabled = true;
    submitButton.disabled = true;
}