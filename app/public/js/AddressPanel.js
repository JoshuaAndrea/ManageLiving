//Address dropdown
const addressSelect = document.getElementById('addressSelect');

//Tenant card fields
const tenantNameField = document.getElementById('tenantName');
const tenantPhoneField = document.getElementById('tenantPhoneNumber');
const tenantEmailField = document.getElementById('tenantEmail');
const tenantDoBField = document.getElementById('tenantDoB');

//Contact moments section
const contactMomentSection = document.getElementById('contactMomentSection');



function changeDropdownValue(){
    //Call methods
    updateTenantInfo();
    loadContactMoments();
}

function updateTenantInfo(){
    const data = {
        "addressId": addressSelect.value
    };

    //Fetch tenant data from api
    fetch("/api/get-tenant-from-address",{
        method: "POST",
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        if(data.error_message != null){
            if(data.error_message == "No tenant found."){
                noTenantDetected();
            }
            else{
            alert(data.error_message);
            }
        }
        else{
            //Load tenant data into card
            tenantNameField.innerHTML = "Name: " + data.firstName + " " + data.lastName;
            tenantPhoneField.innerHTML = "Phone Nr: " + data.phoneNumber;
            tenantEmailField.innerHTML = "E-mail: " + data.email;
            tenantDoBField.innerHTML = "Date of Birth: " + data.dateOfBirth;
        }
    })
}

function noTenantDetected(){
    //Clear tenant info
    tenantNameField.innerHTML = "Name: N/A";
    tenantPhoneField.innerHTML = "Phone Nr: N/A";
    tenantEmailField.innerHTML = "E-mail: N/A";
    tenantDoBField.innerHTML = "Date of Birth: N/A";
}

function loadContactMoments(){

    const data = {
        "addressId": addressSelect.value
    };

    //Fetch tenant data from api
    fetch("/api/get-contactmoments-from-address",{
        method: "POST",
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        if(data.error_message != null){
            alert(data.error_message);
        }
        else{
            //Clear contact moment section
            contactMomentSection.innerHTML = "";
            
            //Load contact moments
            for(i = 0; i < data.length; i++){
                displayContactMoment(data[i]);
        }
    }
    });
}

function displayContactMoment(contactMoment){
    //Create variables
    var contactMomentId = contactMoment.contactMomentId;
    var contactMomentDate = contactMoment.datetime;
    var contactMomentType = contactMoment.contactType;
    var contactMomentTitle = contactMoment.title;
    var contactMomentMessage = contactMoment.message;
    var contactMomentIsResolved = contactMoment.isResolved;

    //Create card
    const card = document.createElement('div');
    card.className = "card mb-3";
    card.style = "border-width: 2px; border-color: black;";
    //Create header
    const cardHeader = document.createElement('div');
    cardHeader.className = "card-header";
}

function createCard(){
    
}



function updateContactMoment(){

}