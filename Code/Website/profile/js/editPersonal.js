// Entire script will be in script mode
"use strict";

let saveBtn = document.getElementById("saveBtn");
saveBtn.onclick = update;

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
    
    htmlStr += '<!-- Email -->';
    htmlStr += '<div class="form_input">';
    htmlStr += '<label for="email" class="form-label"> Email: </label>';
    htmlStr += '<input name="email" id="email" value="'+ user[0].email  + '">';
    htmlStr +='</div>';

    htmlStr += '<!-- First Name -->';
    htmlStr +=  '<div class="form_input">';
    htmlStr += '<label for="firstname" class="form-label"> Firstname: </label>';
    htmlStr += '<input autocomplete="off" value = "'+ user[0].firstname+'" type="text" id="firstname">';
    htmlStr += '</div>';

    htmlStr += '<!-- Last Name -->';
    htmlStr +=  '<div class="form_input">';
    htmlStr += '<label for="lastname" class="form-label"> Lastname: </label>';
    htmlStr += '<input autocomplete="off" value = "'+ user[0].lastname +'" type="text" id="lastname">';
    htmlStr += '</div>';

    htmlStr +='<!-- Telephone Number -->';
    htmlStr +=' <div class="form_input">';
    htmlStr +='<label for="telephone" class="form-label"> Phone Number: </label>';
    htmlStr +='<input autocomplete="off" value = "'+ user[0].telephone +'" type="tel" id="telephone">';
    htmlStr +='</div>';

    htmlStr +='<!-- Date Of Birth -->';
    htmlStr +='<div class="form_input">';
    htmlStr +='<label for="dob" class="form-label"> Date of Birth: </label>';
    htmlStr +='<input autocomplete="off" type="date" id="dob" value="'+ user[0].DOB +'" max="<?php echo date(\'Y\').\'-\'.date(\'m\').\'-\'.date(\'d\'); ?>">';
    htmlStr +='</div>';

    htmlStr +='<!-- Gender-->';
    htmlStr +='<div class="form_input">';
    htmlStr +='    <label for="gender" class="form-label"> Gender: </label>';
    htmlStr +='<select id="gender" style="width: 270px ; height:33px">';
    htmlStr += '<option value="male">Male</option>';
    htmlStr += '<option value="female">Female</option>';
    htmlStr += '<option value="other">Other</option>';
    htmlStr += '</select>';
    htmlStr +='</div>';

    htmlStr += '<input type="hidden" id="id" value="'+ user[0]._id.$oid  + '">';
    
    //  display the html into the class body
    document.getElementsByClassName("form")[0].innerHTML = htmlStr;

}

function update()
{
    //Create request object
    let request = new XMLHttpRequest();

    // id variables
    let firstname = document.getElementById("firstname");
    let lastname = document.getElementById("lastname");
    let email = document.getElementById("email");
    let telephone = document.getElementById("telephone");
    let gender = document.getElementById("gender");
    let dob = document.getElementById("dob");
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
    request.open("POST", "getEditPersonal.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //Send request
    request.send("firstname=" + firstname.value   + "&lastname=" + lastname.value + 
    "&email=" + email.value + "&DOB=" + dob.value + "&gender=" + gender.value +
    "&telephone=" + telephone.value + "&id=" + id.value);
    
}