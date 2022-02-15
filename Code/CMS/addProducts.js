// Entire script will be in script mode
"use strict";

function checkForm(){
    let name = document.getElementById("name");
    let price = document.getElementById("price");
    let description = document.getElementById("description");
    
    //Create request object 
    let request = new XMLHttpRequest();
        
    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if(request.status === 200){
            // redirect to home page
            // window.location.href="../index.php";
        }
        else
            alert("Error communicating with server: " + request.status);
    };
    
    //Set up request with HTTP method and URL 
    request.open("POST", "getAddProducts.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    //Send request
    request.send("name=" + name + "&description=" + description + "&price=" + price);
}     
