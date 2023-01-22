const selectedTenantField = document.getElementById("tenantSelect");
const firstNameField = document.getElementById("firstNameField");
const lastNameField = document.getElementById("lastNameField");
const emailField = document.getElementById("emailField");
const phoneField = document.getElementById("phoneField");
const dateOfBirthField = document.getElementById("dateOfBirthField");


function updateTenantForm() //Update tenant form on dropdown change
{
    //Fetch id from dropdown
    const data = {
        tenantId: selectedTenantField.value
    };
    //Fetch tenant data from api
    fetch("/api/get-tenant",{
        method: "POST",
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(data => {
        if(data.error_message != null){
            alert(data.error_message);
        }
        else{
            //Load tenant data into form
            firstNameField.value = data.firstName;
            lastNameField.value = data.lastName;
            emailField.value = data.email;
            phoneField.value = data.phoneNumber;
            dateOfBirthField.value = data.dateOfBirth;
        }
    })
}

function deleteTenant()
{
    //Confirm prompt
    if(confirm("Are you sure you wish to delete this tenant?")){
        //Delete tenant
        const data = {
            tenantId: selectedTenantField.value
        }
        
        fetch ("/api/delete-tenant", {
            method: "POST",
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            if(data.error_message != null){
                alert(data.error_message);
            }
            else{
                alert(data.success_message);
                
                //Reload page
                location.reload();
            }
        });
    }
}

function updateTenant()
{
    //Confirm prompt
    if(confirm("Are you sure you wish to update this tenant?")){
        //Update tenant
        
        const data = {
            tenantId: selectedTenantField.value,
            firstName: firstNameField.value,
            lastName: lastNameField.value,
            email: emailField.value,
            phoneNumber: phoneField.value,
            dateOfBirth: dateOfBirthField.value
        }
        fetch("/api/update-tenant", {
            method: "POST",
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            if(data.error_message != null){
                alert(data.error_message);
            }
            else{
                alert(data.success_message);
                
                //Reload page
                location.reload();
            }
        });
    }
}

function createTenant()
{
    //Confirm prompt
    if(confirm("Are you sure you wish to add a new tenant, using the information in the form?")){
        //Add tenant
        
        const data = {
            firstName: firstNameField.value,
            lastName: lastNameField.value,
            email: emailField.value,
            phoneNumber: phoneField.value,
            dateOfBirth: dateOfBirthField.value
        }

        fetch("/api/insert-tenant", {
            method: "POST",
            body: JSON.stringify(data)
        })
        .then(response => response.json())
        .then(data => {
            if(data.error_message != null){
                alert(data.error_message);
            }
            else{
                alert(data.success_message);
                
                //Reload page
                location.reload();
            }
        });
    }
}
