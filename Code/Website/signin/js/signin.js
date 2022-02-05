// Entire script will be in script mode
"use strict";

// global variables
let email = document.getElementById("email");
let pwd = document.getElementById("Password");
let btn = document.getElementById("login");
let logged = document.getElementsByClassName("logged")[0];
let notlogged = document.getElementsByClassName("notlogged")[0]; 
let log_btn = document.getElementsByName("Sign In");

init();

// function init
function init(){
    // check if session storage (loggeduser) is not empty
    if (sessionStorage.loggedUser != undefined){
        sessionStorage.clear()
        log_btn[0].innerText = 'Log In';
    }
}

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
                //Convert JSON to array of customer objects
                let user = JSON.parse(responseData);
                if (user.length === 0 ){
                    //Add data to page
                    document.getElementById("pwd_details").innerHTML = "*username/password incorrect";
                    details.style.color = "#DA1212";
                } else {
                    sessionStorage.loggedUser = user[0].firstname + " " + user[0].lastname;
                    sessionStorage.email = user[0].email;
                    // redirect to home page
                    window.location.href="../index.php";
                }                
            }
            else
                alert("Error communicating with server: " + request.status);
        };

        //Set up request with HTTP method and URL 
        request.open("POST", "getSignin.php");
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        //Send request
        request.send("email=" + email.value + "&password=" + pwd.value);
        
    }
}
