// Entire script will be in script mode
"use strict";

// global variables
let email = document.getElementById("email");
let pwd = document.getElementById("Password");
let btn = document.getElementById("login");

// function to validate username
function emailValidation() {
    // variables 
    let details = document.getElementById("usr_details");

    // check if input field is empty
    if (email.value.length == 0) {
        btn.disabled = true;
        details.innerHTML = '*required';
        details.style.color = "#DA1212";
        btn.disabled = true;
        return false;
    } 

    // succes message
    btn.disabled = false;
    details.innerHTML = "";
    return true;
    
}

// function to validate password
function passwordValidation() {
    // local variable
    let details = document.getElementById("pwd_details");

    // check if input field is empty
    if (pwd.value.length == 0) {
        btn.disabled = true;
        details.innerHTML = '*required';
        details.style.color = "#DA1212";
        return false;
    }
    btn.disabled = false;
    details.innerHTML = "";
    return true;
}

// function to validate login form in general
function login(){
    // convert JSON into js objects
    let users = JSON.parse(localStorage.users);
    let details = document.getElementById("pwd_details");

    // call all functions to check if meet all requirements
    if (!emailValidation() && !passwordValidation()){
        return false;
    } else {
        if (!emailValidation()){
            return false;
        }
        if (!passwordValidation()){
            return false;
        }
        //Create request object 
        let request = new XMLHttpRequest();

        //Create event handler that specifies what should happen when server responds
        request.onload = () => {
            //Check HTTP status code
            if(request.status === 200){
                //Get data from server
                let responseData = request.responseText;

                //Add data to page
                document.getElementById("pwd_details").innerHTML = responseData;
                details.innerHTML = responseData;
                details.style.color = "#DA1212";

            }
            else
                alert("Error communicating with server: " + request.status);
        };

        //Set up request with HTTP method and URL 
        request.open("POST", "signinAjax.php");
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        //Send request
        request.send("email=" + email.value + "&password=" + pwd.value);
        
        // // redirect to home page
        // window.location.href="../index.php";
    }
}
