// class variables
let secondPage = document.getElementsByClassName("secondPage")[0];
let firstPage = document.getElementsByClassName("firstPage")[0];
let thirdPage = document.getElementsByClassName("thirdPage")[0];

// button varibales
let firstProceedBtn = document.getElementById("persoProceed");
let secondProceedBtn = document.getElementById("secondProceedBtn");

// id variables
let firstname = document.getElementById("firstname");
let lastname = document.getElementById("lastname");
let email = document.getElementById("email");
let pwd = document.getElementById("password");
let confirm_pwd = document.getElementById("confirm_password");
let telephone = document.getElementById("telephone");
let address = document.getElementById("address");
let city = document.getElementById("city");

// call function on button click
firstProceedBtn.onclick = scd;
secondProceedBtn.onclick = third;

// display and hide class
function scd() {
    secondPage.style.display = "block";
    firstPage.style.display = "none";
    thirdPage.style.display = "none";
}

function third(){
    secondPage.style.display = "none";
    firstPage.style.display = "none";
    thirdPage.style.display = "block";
}

// function to validate firstname
function firstValidation() {
    // variables 
    let details = document.getElementById("first_details");

    let users = JSON.parse(localStorage.users);
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

    // success message
    firstProceedBtn.disabled = false;
    details.innerHTML = "";
    return true;
    
}

// function to validate lastname
function lastValidation() {
    // variables 
    let details = document.getElementById("last_details");
    let users = JSON.parse(localStorage.users);
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
    
    // success message
    firstProceedBtn.disabled = false;
    details.innerHTML = "";
    return true;
}

//  function to validate email
function emailValidation() {
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

    // //  loop through the JS object
    // for (let i = 0; i < users.length; i++){
    //     //  check if username alread exist
    //     if (users[i].username == firstname.value){
    //         btn.disabled = true;
    //         details.innerHTML = '*This email already has an associated account. <br> <a href="../signin/signin.php">Login Instead?</a>';
    //         details.style.color = "#FDD2BF";
    //         return false;
    //     }
    // }

    // succcess message
    firstProceedBtn.disabled = false;
    details.innerHTML = "";
    return true;
}

// function to validate telephone
function telValidation() {
    // variables 
    let details = document.getElementById("tel_details");
    let users = JSON.parse(localStorage.users);
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
    // success message
    secondProceedBtn.disabled = false;
    details.innerHTML = "";
    return true;
}

// function to validate address
function addressValidation(){
    // variables 
    let details = document.getElementById("address_details");
    let users = JSON.parse(localStorage.users);

    // verify if input field is empty
    if (address.value.length == 0) {
        secondProceedBtn.disabled = true;
        details.innerHTML = '*required';
        details.style.color = "#ED3833";
        return false;

    } 
    // success message
    secondProceedBtn.disabled = false;
    details.innerHTML = "";
    return true;
}

// function to validate city
function cityValidation(){
    // variables 
    let details = document.getElementById("city_details");
    let users = JSON.parse(localStorage.users);

    // verify if input field is empty
    if (city.value.length == 0) {
        secondProceedBtn.disabled = true;
        details.innerHTML = '*required';
        details.style.color = "#ED3833";
        return false;

    } 
    // success message
    secondProceedBtn.disabled = false;
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
        btn.disabled = true;
        details.innerHTML = '*required';
        details.style.color = "#FDD2BF";
        return false;
    // check if pass the regex
    } else if (!re.test(pwd.value)) {
        btn.disabled = true;
        details.style.color = "#FDD2BF";
        details.innerHTML = "Password should contain at least one symbol, <br> upper and lower case letter <br> and a number of min 6 characters.";
        return false;
    }
    // success message
    btn.disabled = false;
    details.innerHTML = "Strong Password";
    details.style.color = "#77D970";
    return true;
    
}

// function to verify if confirm password matches password
function confirmPassword() {
    //variables
    let details = document.getElementById("confirmPWD_details");

    // check if input field is empty
    if (confirm_pwd.value.length == 0) {
        btn.disabled = true;
        details.innerHTML = '*required';
        details.style.color = "#FDD2BF";
        return false;
    // check whether the password matches
    } else if (confirm_pwd.value != pwd.value) {
        btn.disabled = true;
        details.style.color = "#FDD2BF";
        details.innerHTML = "Please enter the same password again";
        return false;
    }
    // success message
    btn.disabled = false;
    details.innerHTML = "Password matches";
    details.style.color = "#77D970";
    return true;
    
}