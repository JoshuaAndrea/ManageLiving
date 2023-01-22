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
            heading = document.createElement('h5');
            heading.innerHTML = "Contact Moments";
            contactMomentSection.appendChild(heading);

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
    const card = createCard();
    //Create header
    const cardHeader = createCardHeader(contactMomentDate, contactMomentType, contactMomentTitle);
    //Create body
    const cardBody = createCardBody(contactMomentMessage, contactMomentId, contactMomentIsResolved);
    //Create footer
    const cardFooter = createCardFooter(contactMomentId, contactMomentIsResolved);

    //Append elements
    card.appendChild(cardHeader);
    card.appendChild(cardBody);
    card.appendChild(cardFooter);

    //Display card in section
    contactMomentSection.appendChild(card);
}

function createCard(){
    const card = document.createElement('div');
    card.className = "card mb-3";
    card.style = "border-width: 2px; border-color: black; margin-top: 1rem;";

    return card;
}

function createCardHeader(contactMomentDate, contactMomentType, contactMomentTitle){
    const cardHeader = document.createElement('div');
    cardHeader.className = "card-header";
    cardHeader.style = "background-color: rgb(245, 245, 245);";
    title = document.createElement('h6');
    title.innerHTML = contactMomentDate + " - " + contactMomentType + " - " + contactMomentTitle;
    cardHeader.appendChild(title);

    return cardHeader;
}

function createCardBody(contactMomentMessage, contactMomentId, contactMomentIsResolved){
    const cardBody = document.createElement('div');
    cardBody.className = "card-body";
    
    //Create message box
    messageBox = document.createElement('textarea');
    messageBox.className = "form-control";
    messageBox.rows = "5";
    messageBox.innerHTML = contactMomentMessage;
    messageBox.id="messageBox" + contactMomentId;

    //Message editable based on whether or not contactmoment is resolved
    if(contactMomentIsResolved){
        messageBox.disabled = true;
    }
    else{
        messageBox.disabled = false;
    }

    cardBody.appendChild(messageBox);

    return cardBody;
}

function createCardFooter(contactMomentId, contactMomentIsResolved){
    const cardFooter = document.createElement('div');
    cardFooter.className = "card-footer";

    //Create button
    const button = document.createElement('button');
    button.className = "btn btn-primary d-inline";
    button.id = "updateBtn";
    button.innerHTML = "Save Changes";
    button.addEventListener('click', function(){
        updateContactMoment(contactMomentId);
    });

    cardFooter.appendChild(button);

    //Create checkbox with label
    const checkbox = document.createElement('input');
    checkbox.type = "checkbox";
    checkbox.className = "d-inline";
    checkbox.id = "isResolvedCheckbox"+contactMomentId;
    checkbox.checked = contactMomentIsResolved;
    checkbox.style="margin-left: 2rem;";
    checkbox.addEventListener('click', function(){updateContactMoment(contactMomentId);} );

    label = document.createElement('label');
    label.className = "d-inline";
    label.innerHTML = "Is resolved";
    label.for="isResolvedCheckbox"+contactMomentId;

    cardFooter.appendChild(checkbox);
    cardFooter.appendChild(label);

    return cardFooter;
}

function updateContactMoment(contactMomentId){
    const messageBox = document.getElementById('messageBox' + contactMomentId);
    const isResolvedCheckbox = document.getElementById('isResolvedCheckbox' + contactMomentId);

    const data = {
        "contactMomentId": contactMomentId,
        "message": messageBox.value,
        "isResolved": isResolvedCheckbox.checked
    };

    //Update contact moment
    fetch("/api/update-contactmoment",{
        method: "POST",
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        if(data.error_message != null){
            alert(data.error_message);
        }
        else{
            loadContactMoments();
        }
    });
}