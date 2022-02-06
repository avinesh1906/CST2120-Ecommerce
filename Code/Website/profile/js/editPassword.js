// Entire script will be in script mode
"use strict";

let changeBtn = document.getElementById("changeBtn");
changeBtn.onclick = update;

// function call 
generateContent();

// function to generate the content of the portrait body
function generateContent(){

    //Create request object
    let request = new XMLHttpRequest();
    
    let email = sessionStorage.email;

    //Set up request and send it
    request.open("POST", "getProfile.php");

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if (request.status === 200) {
            //Add data from server to page
            displayContent(request.responseText);
        } else
            alert("Error communicating with server: " + request.status);
    };

    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send("email="+email);

}

// function to load content of the category into page
function displayContent(jsonUser){
    //Convert JSON to array of product objects
    let user = JSON.parse(jsonUser);

    // create the html to display personal information
    let htmlStr = '';
    htmlStr += '<input type="hidden" id="id" value="'+ user[0]._id.$oid  + '">';
    
    //  display the html into the class body
    document.getElementsByClassName("infotext")[0].outerHTML += htmlStr;
}

function update()
{   
    //Create request object
    let request = new XMLHttpRequest();

    // id variables
    let current_password = document.getElementById("current_password");
    let confirm_password = document.getElementById("confirm_password");
    let new_password = document.getElementById("new_password");
    let id = document.getElementById("id");

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if(request.status === 200){
            //Get data from server
            let responseData = request.responseText;
            //Add data to page
            document.getElementById("ServerResponse").innerHTML = responseData;
        }
        else
            alert("Error communicating with server: " + request.status);
    };

    //Set up request with HTTP method and URL 
    request.open("POST", "getEditPassword.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //Send request
    request.send("current_password=" + current_password.value   + "&confirm_password=" + confirm_password.value + 
    "&new_password=" + new_password.value + "&id=" + id.value);    
}