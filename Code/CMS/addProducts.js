// Entire script will be in script mode
"use strict";

function checkForm(){
    let name = document.getElementById("painting_name");
    let category = document.getElementById("painting_category");
    let description = document.getElementById("painting_des");
    let key_details= document.getElementById("key_d");
    let price = document.getElementById("price");
    let imageurl = document.getElementById("image_url");
    let A2 = document.getElementById("A2");
    let A3 = document.getElementById("A3");
    let A4 = document.getElementById("A4");

    //Create request object 
    let request = new XMLHttpRequest();

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if(request.status === 200){
            // redirect to home page
             window.location.href="./index.php";
        }
        else
            alert("Error communicating with server: " + request.status);
    };
    
    //Set up request with HTTP method and URL 
    request.open("POST", "getAddProducts.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    //Send request
    request.send("painting_name=" + name.value + "&painting_category=" + category.value +
     "&painting_des=" + description.value + "&key_d=" + key_details.value + "&price=" + price.value
     + "&image_url=" + imageurl.value+ "&A2=" + A2.value+ "&A3=" + A3.value
     + "&A4=" + A4.value);
}     

function submitIMG() {
    //Create request object 
    let request = new XMLHttpRequest();

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if(request.status === 200){
            // redirect to home page
             window.location.href="./index.php";

        }
        else
            alert("Error communicating with server: " + request.status);
    };
    
    //Set up request with HTTP method and URL 
    request.open("POST", "upload_image.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

}