function logout()
{
    //Confirm prompt
    if(confirm("Would you like to log out?")){
        
        //Send logout request
        fetch("/api/logout", {
            method: "POST",
            body: JSON.stringify({})
        })
        .then(response => response.json())
        .then(data => {
            if(data.error_message != null){
                alert(data.error_message);
            }
            else{
                alert(data.success_message);
                //Back to home
                location.href = "/";
            }
        });
    }
}