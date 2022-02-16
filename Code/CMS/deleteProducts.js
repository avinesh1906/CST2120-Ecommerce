"use strict";

function checkForm(){
    let name = document.getElementById("painting_name");
    let category = document.getElementById("painting_category");
    let description = document.getElementById("painting_des");
    let key_details= document.getElementById("key_d");
    let price = document.getElementById("price");
    let imageurl = document.getElementById("image_url");
    let deleted_at = document.getElementById("deleted_at")
    //Create request object 
    let request = new XMLHttpRequest();
        
    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if(request.status === 200){
            // redirect to home page
             window.location.href="../index.php";
        }
        else
            alert("Error communicating with server: " + request.status);
    };
    
    //Set up request with HTTP method and URL 
    request.open("POST", "getDeleteProducts.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    //Send request
    request.send("painting_name=" + name + "&painting_category=" + category +
     "&description=" + description + "&key_d=" + key_details + "&price=" + price
     + "&image_url=" + imageurl + "&deleted_at"+ deleted_at );
}