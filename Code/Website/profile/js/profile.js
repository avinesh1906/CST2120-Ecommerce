// Entire script will be in script mode
"use strict";

// function call 
generateContent();

// function to generate the content of the portrait body
function generateContent(){

    //Create request object
    let request = new XMLHttpRequest();
    let id = sessionStorage.id;

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
    request.send("id="+id);

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
    htmlStr += '<a id="fullname">'+ user[0].firstname +' '+ user[0].lastname +' </a>';
    htmlStr += '</div>';

    htmlStr += '<!-- Email -->';
    htmlStr += '<div class="form_details">';
    htmlStr += '<label for="email" class="form-label"> Email: </label>';
    htmlStr +='<a id="email">'+ user[0].email +'</a>';
    htmlStr +='</div>';

    htmlStr +='<!-- Telephone Number -->';
    htmlStr +=' <div class="form_details">';
    htmlStr +='<label for="telephone" class="form-label"> Phone Number: </label>';
    htmlStr +='<a id="telephone">'+ user[0].telephone +'</a>';
    htmlStr +='</div>';

    htmlStr +='<!-- Date Of Birth -->';
    htmlStr +='<div class="form_details">';
    htmlStr +='    <label for="DOB" class="form-label"> Date of Birth: </label>';
    htmlStr +='    <a id="DOB">'+ user[0].DOB +'</a>';
    htmlStr +='</div>';

    htmlStr +='<!-- Gender-->';
    htmlStr +='<div class="form_details">';
    htmlStr +='    <label for="gender" class="form-label"> Gender: </label>';
    htmlStr +='    <a id="gender">'+ user[0].gender +'</a>';
    htmlStr +='</div>';

    //  display the html into the class body
    document.getElementsByClassName("body")[0].innerHTML = htmlStr;

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