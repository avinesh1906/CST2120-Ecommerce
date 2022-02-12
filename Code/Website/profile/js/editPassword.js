// Entire script will be in script mode
"use strict";

let changeBtn = document.getElementById("changeBtn");
changeBtn.onclick = update;

// function call 
generateContent();

let user_password =" ";

//Create request object
let request = new XMLHttpRequest();

//Create event handler that specifies what should happen when server responds
request.onload = () => {
    //Check HTTP status code
    if(request.status === 200){
        //Get data from server
        user_password = request.responseText;
    }
    else
        alert("Error communicating with server: " + request.status);
};

// function to generate the content of the portrait body
function generateContent(){

    //Create request object
    let request = new XMLHttpRequest();
    
    let email =  document.getElementById("sessionEmail").innerText;

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
    // id variables
    let new_password = document.getElementById("new_password");
    let id = document.getElementById("id");

    if (passwordValidation() && confirmPassword()){
        //Create request object
        let request = new XMLHttpRequest();

        // enable button
        changeBtn.disabled = false;

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
        request.send("func=" + "update" + "&new_password=" + new_password.value + "&id=" + id.value); 
        
        // redirect to home page
        window.location.href="./profile.php";

    } else {
        changeBtn.disabled = true;
    }
}

// function to validate old password
function oldPassword() {
    // variables 
    let details = document.getElementById("currentPWD_details");
    let current_pwd = document.getElementById("current_password");
    let email = sessionStorage.email;

    //Set up request with HTTP method and URL 
    request.open("POST", "getEditPassword.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //Send request
    request.send("func=" + "password" + "&email=" + email);

    //  check if the input field is empty
    if (current_pwd.value.length == 0) {
        // error message
        details.innerHTML = '*required';
        details.style.color = "#FDD2BF";
        changeBtn.disabled = true;
        return false;
    // check if current and input password matches
    } else if (user_password != current_pwd.value){
        // error message
        details.innerHTML = 'Incorrect current password';
        details.style.color = "#FDD2BF";
        changeBtn.disabled = true;
        return false;
    } else {
        changeBtn.disabled = false;
        details.innerHTML = "Correct Current Password";
        details.style.color = "#77D970";
        return true;
    }
        
}

//  function to validate new password
function passwordValidation() {
    // variables 
    let details = document.getElementById("newPWD_details");
    /* Regular Expression for validating password with the following conditions:
    1. Min 6 elements
    2. Containing at least:
        a. A symbol (!@#$%^&*)
        b. Upper and lower case letter
        c. A number */
    let re = new RegExp("^(?=.*[0-9])(?=.*[!@#$%^&*])(?=.*[A-Z])[a-zA-Z0-9!@#$%^&*]{6,}$");
    let current_pwd = document.getElementById("current_password");
    let new_pwd = document.getElementById("new_password");

    //  check if input field is empty
    if (new_pwd.value.length == 0) {
        details.innerHTML = '*required';
        details.style.color = "#FDD2BF";
        return false;
    // check if new password passes the regex test
    } else if (!re.test(new_pwd.value)) {
        details.innerHTML = " Password should contain at least one symbol, <br> upper and lower case letter <br> and a number of min 6 characters. </span>";
        details.style.color = "#FDD2BF";
        return false;
    // check if new password is same as the old password
    } else if (new_pwd.value == current_pwd.value) {
        details.innerHTML = 'New password cannot be the same <br> as your old password.';
        details.style.color = "#FDD2BF";
        return false;
    } 
    // sucessful message
    changeBtn.disabled = false;
    details.innerHTML = "Strong Password";
    details.style.color = "#77D970";
    return true;
    
}

// function to verify confirm password matches new password
function confirmPassword() {
    //variables
    let details = document.getElementById("confirmPWD_details");
    let new_pwd = document.getElementById("new_password");
    let confirm_pwd = document.getElementById("confirm_password");

    // check for empty input field
    if (confirm_pwd.value.length == 0) {
        details.innerHTML = '*required';
        details.style.color = "#FDD2BF";
        return false;
    // check if password matches
    } else if (confirm_pwd.value != new_pwd.value) {
        details.innerHTML = "password does not match";
        details.style.color = "#FDD2BF";
        return false;
    } else {
        // sucessful messages
        changeBtn.disabled = false;
        details.innerHTML = "Password matches ";
        details.style.color = "#77D970";
        return true;
    }
}