
// Entire script will be in script mode
"use strict";

// class variables
let secondPage = document.getElementsByClassName("secondPage")[0];
let firstPage = document.getElementsByClassName("firstPage")[0];
let thirdPage = document.getElementsByClassName("thirdPage")[0];

// button varibales
let firstProceedBtn = document.getElementById("firstProceedBtn");
let secondProceedBtn = document.getElementById("secondProceedBtn");
let createAccountBtn = document.getElementById("createAccountBtn");

// id variables
let firstname = document.getElementById("firstname");
let lastname = document.getElementById("lastname");
let email = document.getElementById("email");
let pwd = document.getElementById("password");
let confirm_pwd = document.getElementById("confirm_password");
let telephone = document.getElementById("telephone");
let address = document.getElementById("address");
let city = document.getElementById("city");
let dob = document.getElementById("dob");
let gender = document.getElementById("gender");
let postalCode = document.getElementById("postalCode");

// call function on button click
firstProceedBtn.onclick = scd;
secondProceedBtn.onclick = third;

// function to display 2nd page of registration
function scd() {
    // call all functions to check if meet all conditions
    if (firstValidation() && lastValidation() && emailValidation()){
         // enable button
        firstProceedBtn.disabled = false;

        // display the second page
        secondPage.style.display = "block";
        firstPage.style.display = "none";
        thirdPage.style.display = "none";

    // disable button if not met condition   
    } else {
        firstProceedBtn.disabled = true;
    }


}

// function to display third page
function third(){
    // call all functions to check if meet all conditions
    if (telValidation() && addressValidation() && cityValidation() && postalCodeValidation()){
        // enable button
        secondProceedBtn.disabled = false;
        
        secondPage.style.display = "none";
        firstPage.style.display = "none";
        thirdPage.style.display = "block";
    
    // disable button if not met condition
    } else {
        secondProceedBtn.disabled = true;
    }

}

// function to validate firstname
function firstValidation() {
    // variables 
    let details = document.getElementById("first_details");

    /* Regular Expression for validating firstname*/
    let re = new RegExp("^[a-z ,.'-]+$");
    
    // verify if input field is empty
    if (firstname.value.length == 0) {
        firstProceedBtn.disabled = true;
        details.innerHTML = '*required';
        details.style.color = "#ED3833";
        return false;
    // check if pass the regex 
    } else if (!re.test(firstname.value)) { 
        firstProceedBtn.disabled = true;
        details.innerHTML = '*Enter a valid first name';
        details.style.color = "#ED3833";
        return false;
    }

    firstProceedBtn.disabled = false;
    // success message
    details.innerHTML = "";
    return true;
    
}

// function to validate lastname
function lastValidation() {
    // variables 
    let details = document.getElementById("last_details");

    /* Regular Expression for validating lastname*/
    let re = new RegExp("^[a-z ,.'-]+$");
    
    // verify if input field is empty
    if (lastname.value.length == 0) {
        firstProceedBtn.disabled = true;
        details.innerHTML = '*required';
        details.style.color = "#ED3833";
        return false;
    // check if pass the regex 
    } else if (!re.test(lastname.value)) { 
        firstProceedBtn.disabled = true;
        details.innerHTML = '*Enter a valid last name';
        details.style.color = "#ED3833";
        return false;
    }
    firstProceedBtn.disabled = false;
    // success message
    details.innerHTML = "";
    return true;
}

//  function to validate email
function emailValidation() {
    //Create request object 
    let request = new XMLHttpRequest();
    //variables
    let details = document.getElementById("email_details");

    // Regular expression for validating email
    let re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    // check if input field is empty
    if (email.value.length == 0) {
        firstProceedBtn.disabled = true;
        details.innerHTML = "*required";
        details.style.color = "#ED3833";
        return false;
    // check if pass the regex
    } else if (!email.value.match(re)){
        firstProceedBtn.disabled = true;
        details.innerHTML = "Your email address must be in the <br> format of name@domain.com";
        details.style.color = "#ED3833";
        return false;
    }

    request.open("POST", "registerAjax.php");
    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if(request.status === 200){
            //Get data from server
            let responseData = request.responseText;
            // details.innerHTML = "hehe";
            if (responseData == "true"){
                firstProceedBtn.disabled = true;
                details.innerHTML = '*This email already has an associated account. <br> <a href="../signin/signin.php">Login Instead?</a>';
                details.style.color = "#ED3833";
                return false;
            }
        }
        else
            alert("Error communicating with server: " + request.status);
    };
    
    //Set up request with HTTP method and URL 
    request.open("POST", "registerAjax.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //Send request
    request.send("func=" + "email" + "&email=" + email.value);

    firstProceedBtn.disabled = false;
    // succcess message
    details.innerHTML = "";
    return true;
}

// function to validate telephone
function telValidation() {
    // variables 
    let details = document.getElementById("tel_details");

    /* Regular Expression for validating telephone number*/
    let re = /^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/;
    
    // verify if input field is empty
    if (telephone.value.length == 0) {
        secondProceedBtn.disabled = true;
        details.innerHTML = '*required';
        details.style.color = "#ED3833";
        return false;
    // check if pass the regex 
    } else if (!telephone.value.match(re)) {
        secondProceedBtn.disabled = true; 
        details.innerHTML = '*Enter a valid telephone number';
        details.style.color = "#ED3833";
        return false;
    }    
    secondProceedBtn.disabled = false;
    // success message
    details.innerHTML = "";
    return true;
}

// function to validate address
function addressValidation(){
    // variables 
    let details = document.getElementById("address_details");

    // verify if input field is empty
    if (address.value.length == 0) {
        secondProceedBtn.disabled = true;
        details.innerHTML = '*required';
        details.style.color = "#ED3833";
        return false;

    } 
    secondProceedBtn.disabled = false;
    // success message
    details.innerHTML = "";
    return true;
}

// function to validate city
function cityValidation(){
    // variables 
    let details = document.getElementById("city_details");

    // verify if input field is empty
    if (city.value.length == 0) {
        secondProceedBtn.disabled = true;
        details.innerHTML = '*required';
        details.style.color = "#ED3833";
        return false;

    } 
    secondProceedBtn.disabled = false;
    // success message
    details.innerHTML = "";
    return true;
}

// function to verify postal code
function postalCodeValidation(){
    // variables 
    let details = document.getElementById("postalCode_details");

    /* Regular Expression for validating postal code*/
    let re = /^[0-9]{5}(?:-[0-9]{4})?$/;
    
    // verify if input field is empty
    if (!postalCode.value.match(re)) {
        secondProceedBtn.disabled = true;
        details.style.color = "#ED3833";
        details.innerHTML = "Please enter a correct postal code";
        return false;

    } 
    secondProceedBtn.disabled = false;
    // success message
    details.innerHTML = "";
    return true;
}

//  function to validate password
function passwordValidation() {
    // variables 
    let details = document.getElementById("pwd_details");
    /* Regular Expression for validating password with the following conditions:
    1. Min 6 elements
    2. Containing at least:
        a. A symbol (!@#$%^&*)
        b. Upper and lower case letter
        c. A number */
    let re = new RegExp("^(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[A-Z])[a-zA-Z0-9!@#$%^&*]{6,}$");

    // check if input field is empty
    if (pwd.value.length == 0) {
        createAccountBtn.disabled = true;
        details.innerHTML = '*required';
        details.style.color = "#ED3833";
        return false;
    // check if pass the regex
    } else if (!re.test(pwd.value)) {
        createAccountBtn.disabled = true;
        details.style.color = "#ED3833";
        details.innerHTML = "Password should contain at least one symbol, <br> upper and lower case letter <br> and a number of min 6 characters.";
        return false;
    }
    createAccountBtn.disabled = false;
    // success message
    details.innerHTML = "Strong Password";
    details.style.color = "#4CA1A3";
    return true;
    
}

// function to verify if confirm password matches password
function confirmPassword() {
    //variables
    let details = document.getElementById("confirmPWD_details");

    // check if input field is empty
    if (confirm_pwd.value.length == 0) {
        createAccountBtn.disabled = true;
        details.innerHTML = '*required';
        details.style.color = "#ED3833";
        return false;
    // check whether the password matches
    } else if (confirm_pwd.value != pwd.value) {
        createAccountBtn.disabled = true;
        details.style.color = "#ED3833";
        details.innerHTML = "Please enter the same password again";
        return false;
    }
    createAccountBtn.disabled = false;
    // success message
    details.innerHTML = "Password matches";
    details.style.color = "#4CA1A3";
    return true;
    
}

// function to proceed to 2nd page after verification
function createAccount(){

    if (passwordValidation() && confirmPassword()){
        // enable button
        createAccountBtn.disabled = false;
        //Create request object 
        let request = new XMLHttpRequest();
        
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
        request.open("POST", "registerAjax.php");
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        //Send request
        request.send("func=" + "create" + "&firstname=" + firstname.value   + "&lastname=" + lastname.value + 
        "&email=" + email.value + "&DOB=" + dob.value + "&gender=" + gender.value +
        "&telephone=" + telephone.value   + "&address=" + address.value + "&city=" + 
        city.value + "&postalCode=" + postalCode.value +"&password=" + pwd.value );

        // redirect to home page
        window.location.href="../index.php";

    } else {
        createAccountBtn.disabled = true;
    }

}