// Entire script will be in script mode
"use strict";

// email id variable
let profileEmail =  document.getElementById("sessionEmail").innerText;
let noLoggedUser = document.getElementsByClassName("noLoggedUser")[0];
let content = document.getElementsByClassName("content")[0];

if (profileEmail == 0){
    noLoggedUser.style.display = "block";
    content.style.display = "none";
} else {
    noLoggedUser.style.display = "none";
    content.style.display = "block";
    // function call 
    generateContent();
}


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
            console.log(request.responseText);
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
    htmlStr += '<!-- Full Name -->';
    htmlStr +=  '<div class="form_details">';
    htmlStr += '<label for="fullname" class="form-label"> Fullname: </label>';
    htmlStr += '<a id="fullname"> '+ user[0].firstname +' '+ user[0].lastname +' </a>';
    htmlStr += '</div>';
    // email
    htmlStr += '<!-- Email -->';
    htmlStr += '<div class="form_details">';
    htmlStr += '<label for="email" class="form-label"> Email: </label>';
    htmlStr +='<a id="email"> '+ user[0].email +'</a>';
    htmlStr +='</div>';
    // telephone number
    htmlStr +='<!-- Telephone Number -->';
    htmlStr +=' <div class="form_details">';
    htmlStr +='<label for="telephone" class="form-label"> Phone Number: </label>';
    htmlStr +='<a id="telephone"> '+ user[0].telephone +'</a>';
    htmlStr +='</div>';
    // dob 
    htmlStr +='<!-- Date Of Birth -->';
    htmlStr +='<div class="form_details">';
    htmlStr +='    <label for="DOB" class="form-label"> Date of Birth: </label>';
    htmlStr +='    <a id="DOB"> '+ user[0].DOB +'</a>';
    htmlStr +='</div>';
    // gender
    htmlStr +='<!-- Gender-->';
    htmlStr +='<div class="form_details">';
    htmlStr +='    <label for="gender" class="form-label"> Gender: </label>';
    htmlStr +='    <a id="gender"> '+ user[0].gender +'</a>';
    htmlStr +='</div>';

    //  display the html into the class body
    document.getElementsByClassName("body")[0].innerHTML = htmlStr;

    // create the address string
    let addressStr = '';
    addressStr += user[0].address + ',';
    addressStr += '<br>';
    addressStr += user[0].city +',';
    addressStr += '<br>';
    addressStr += user[0].country +',';
    addressStr += '<br>';
    addressStr += user[0].postalCode + '.';

    //  display the html into the class address details
    document.getElementsByClassName("details")[0].innerHTML = addressStr;

}