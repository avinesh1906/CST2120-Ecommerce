// Entire script will be in script mode
"use strict";

// listen for onclick saveBtn
let saveBtn = document.getElementById("saveBtn");
saveBtn.onclick = update;

// function call 
generateContent();

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
    // email 
    htmlStr += '<!-- Email -->';
    htmlStr += '<div class="form_input">';
    htmlStr += '<label for="email" class="form-label"> Email: </label>';
    htmlStr += '<input name="email" onkeyup="emailValidation()" id="email" value="'+ user[0].email  + '">';
    htmlStr += '<div class="form_error">';
    htmlStr += '<span id="email_details"></span>';
    htmlStr += '</div>';
    htmlStr +='</div>';
    // firstname
    htmlStr += '<!-- First Name -->';
    htmlStr +=  '<div class="form_input">';
    htmlStr += '<label for="firstname" class="form-label"> Firstname: </label>';
    htmlStr += '<input autocomplete="off" onkeyup="firstValidation()" value = "'+ user[0].firstname+'" type="text" id="firstname">';
    htmlStr += '<div class="form_error">';
    htmlStr += '<span id="first_details"></span>';
    htmlStr += '</div>';
    htmlStr += '</div>';
    // last name
    htmlStr += '<!-- Last Name -->';
    htmlStr +=  '<div class="form_input">';
    htmlStr += '<label for="lastname" class="form-label"> Lastname: </label>';
    htmlStr += '<input autocomplete="off" onkeyup="lastValidation()" value = "'+ user[0].lastname +'" type="text" id="lastname">';
    htmlStr += '<div class="form_error">';
    htmlStr += '<span id="last_details"></span>';
    htmlStr += '</div>';
    htmlStr += '</div>';
    // telephone number
    htmlStr +='<!-- Telephone Number -->';
    htmlStr +=' <div class="form_input">';
    htmlStr +='<label for="telephone" class="form-label"> Phone Number: </label>';
    htmlStr +='<input autocomplete="off" onkeyup="telValidation()" value = "'+ user[0].telephone +'" type="tel" id="telephone">';
    htmlStr += '<div class="form_error">';
    htmlStr += '<span id="tel_details"></span>';
    htmlStr += '</div>';
    htmlStr +='</div>';
    // date of birth
    htmlStr +='<!-- Date Of Birth -->';
    htmlStr +='<div class="form_input">';
    htmlStr +='<label for="dob" class="form-label"> Date of Birth: </label>';
    htmlStr +='<input autocomplete="off" type="date" id="dob" value="'+ user[0].DOB +'" max="<?php echo date(\'Y\').\'-\'.date(\'m\').\'-\'.date(\'d\'); ?>">';
    htmlStr +='</div>';
    // gender
    htmlStr +='<!-- Gender-->';
    htmlStr +='<div class="form_input">';
    htmlStr +='    <label for="gender" class="form-label"> Gender: </label>';
    htmlStr +='<select id="gender" style="width: 270px ; height:33px">';
    htmlStr += '<option value="male">Male</option>';
    htmlStr += '<option value="female">Female</option>';
    htmlStr += '<option value="other">Other</option>';
    htmlStr += '</select>';
    htmlStr +='</div>';
    // user id
    htmlStr += '<input type="hidden" id="id" value="'+ user[0]._id.$oid  + '">';
    
    //  display the html into the class body
    document.getElementsByClassName("form")[0].innerHTML = htmlStr;

}

// function for update
function update()
{
    // id variables
    let firstname = document.getElementById("firstname");
    let lastname = document.getElementById("lastname");
    let email = document.getElementById("email");
    let telephone = document.getElementById("telephone");
    let gender = document.getElementById("gender");
    let dob = document.getElementById("dob");
    let id = document.getElementById("id");

    // check conditions
    if (firstValidation() && lastValidation() && emailValidation()){
        // enable button
        saveBtn.disabled = false;

        //Create request object
        let request = new XMLHttpRequest();
        //Create event handler that specifies what should happen when server responds
        request.onload = () => {
            //Check HTTP status code
            if(request.status === 200){
                //Get data from server
                let responseData = request.responseText;
                console.log(responseData);

                // redirect to profile page
                window.location.href="../signin/signin.php";
            }
            else
                alert("Error communicating with server: " + request.status);
        };
        //Set up request with HTTP method and URL 
        request.open("POST", "getEditPersonal.php");
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        //Send request
        request.send("firstname=" + firstname.value   + "&lastname=" + lastname.value + 
        "&email=" + email.value + "&DOB=" + dob.value + "&gender=" + gender.value +
        "&telephone=" + telephone.value + "&id=" + id.value + "&func=" + "updateDetails");

    } else {
        // disable savebtn
        saveBtn.disabled = true;
    }
}

// function to validate firstname
function firstValidation() {
    // variables 
    let details = document.getElementById("first_details");

    /* Regular Expression for validating firstname*/
    let re = new RegExp("^[A-Z a-z ,.'-]+$");
    
    // verify if input field is empty
    if (firstname.value.length == 0) {
        saveBtn.disabled = true;
        details.innerHTML = '*required';
        details.style.color = "#ED3833";
        return false;
    // check if pass the regex 
    } else if (!re.test(firstname.value)) { 
        saveBtn.disabled = true;
        details.innerHTML = '*Enter a valid first name';
        details.style.color = "#ED3833";
        return false;
    }

    saveBtn.disabled = false;
    // success message
    details.innerHTML = "";
    return true;
    
}

// function to validate lastname
function lastValidation() {
    // variables 
    let details = document.getElementById("last_details");

    /* Regular Expression for validating lastname*/
    let re = new RegExp("^[A-Z a-z ,.'-]+$");
    
    // verify if input field is empty
    if (lastname.value.length == 0) {
        saveBtn.disabled = true;
        details.innerHTML = '*required';
        details.style.color = "#ED3833";
        return false;
    // check if pass the regex 
    } else if (!re.test(lastname.value)) { 
        saveBtn.disabled = true;
        details.innerHTML = '*Enter a valid last name';
        details.style.color = "#ED3833";
        return false;
    }
    saveBtn.disabled = false;
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
    let current_Email = document.getElementById("sessionEmail").innerHTML;
    // Regular expression for validating email
    let re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    // check if input field is empty
    if (email.value.length == 0) {
        saveBtn.disabled = true;
        details.innerHTML = "*required";
        details.style.color = "#ED3833";
        return false;
    // check if pass the regex
    } else if (!email.value.match(re)){
        saveBtn.disabled = true;
        details.innerHTML = "Your email address must be in the <br> format of name@domain.com";
        details.style.color = "#ED3833";
        return false;
    }
    if (email.value != current_Email){
        request.open("POST", "getEditPersonal.php");
        //Create event handler that specifies what should happen when server responds
        request.onload = () => {
            //Check HTTP status code
            if(request.status === 200){
                //Get data from server
                let responseData = request.responseText;
                console.log(responseData);
                if (responseData == "true"){
                    saveBtn.disabled = true;
                    details.innerHTML = '*This email already has an associated account. <br> <a href="../signin/signin.php">Login Instead?</a>';
                    details.style.color = "#ED3833";
                    return false;
                }
            }
            else
                alert("Error communicating with server: " + request.status);
        };
        
        //Set up request with HTTP method and URL 
        request.open("POST", "getEditPersonal.php");
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        //Send request
        request.send("func=" + "email" + "&email=" + email.value);
    }   
    // enable saveBtn
    saveBtn.disabled = false;
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
        saveBtn.disabled = true;
        details.innerHTML = '*required';
        details.style.color = "#ED3833";
        return false;
    // check if pass the regex 
    } else if (!telephone.value.match(re)) {
        saveBtn.disabled = true; 
        details.innerHTML = '*Enter a valid telephone number';
        details.style.color = "#ED3833";
        return false;
    }    
    saveBtn.disabled = false;
    // success message
    details.innerHTML = "";
    return true;
}