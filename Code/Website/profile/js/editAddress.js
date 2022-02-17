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
    // street name
    htmlStr += '<!-- Street Name -->';
    htmlStr += '<div class="form_input">';
    htmlStr += '<label for="street" class="form-label"> Street Name </label>';
    htmlStr += '<input name="email" onkeyup="addressValidation()" id="street" value="'+ user[0].address  + '">';
    htmlStr += '<div class="form_error">';
    htmlStr += '<span id="address_details"></span>';
    htmlStr += '</div>';
    htmlStr +='</div>';
    // town
    htmlStr += '<!-- Town -->';
    htmlStr +=  '<div class="form_input">';
    htmlStr += '<label for="town" class="form-label"> City/Tomn/Village </label>';
    htmlStr += '<input autocomplete="off" onkeyup="cityValidation()" value = "'+ user[0].city+'" type="text" id="town">';
    htmlStr += '<div class="form_error">';
    htmlStr += '<span id="city_details"></span>';
    htmlStr += '</div>';
    htmlStr += '</div>';
    // country
    htmlStr += '<!-- Country -->';
    htmlStr +=  '<div class="form_input">';
    htmlStr += '<label for="country" class="form-label"> Country </label>';
    htmlStr += '<input autocomplete="off" onkeyup="countryValidation()" value = "'+ user[0].country +'" type="text" id="country">';
    htmlStr += '<div class="form_error">';
    htmlStr += '<span id="country_details"></span>';
    htmlStr += '</div>';
    htmlStr += '</div>';
    // zip code
    htmlStr +='<!-- zip code -->';
    htmlStr +=' <div class="form_input">';
    htmlStr +='<label for="zipCode" class="form-label"> Zip code </label>';
    htmlStr +='<input autocomplete="off" onkeyup="postalCodeValidation()" value = "'+ user[0].postalCode +'" type="tel" id="zipCode">';
    htmlStr += '<div class="form_error">';
    htmlStr += '<span id="postalCode_details"></span>';
    htmlStr += '</div>';
    htmlStr +='</div>';
    // user id
    htmlStr += '<input type="hidden" id="id" value="'+ user[0]._id.$oid  + '">';
    
    //  display the html into the class body
    document.getElementsByClassName("form")[0].innerHTML = htmlStr;
}

// function to update
function update()
{
    // id variables
    let address = document.getElementById("street");
    let city = document.getElementById("town");
    let postalCode = document.getElementById("zipCode");
    let country = document.getElementById("country");
    let id = document.getElementById("id");

    // verify conditions
    if (countryValidation() && addressValidation() && cityValidation() && postalCodeValidation()){
        // enable button
        saveBtn.disabled = false;

        //Create request object
        let request = new XMLHttpRequest();

        //Create event handler that specifies what should happen when server responds
        request.onload = () => {
            //Check HTTP status code
            if(request.status === 200){
                // redirect to profile page
                window.location.href="../signin/signin.php";
            }
            else
                alert("Error communicating with server: " + request.status);
        };

        //Set up request with HTTP method and URL 
        request.open("POST", "getEditAddress.php");
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        //Send request
        request.send("address=" + address.value   + "&city=" + city.value + 
        "&postalCode=" + postalCode.value + "&country=" + country.value + "&id=" + id.value);
        
    } else {
        // disable save btn
        saveBtn.disabled = true;
    }
}

// function to validate address
function addressValidation(){
    // variables 
    let details = document.getElementById("address_details");
    let address = document.getElementById("street");

    // verify if input field is empty
    if (address.value.length == 0) {
        saveBtn.disabled = true;
        details.innerHTML = '*required';
        details.style.color = "#ED3833";
        return false;

    } 
    saveBtn.disabled = false;
    // success message
    details.innerHTML = "";
    return true;
}

// function to validate city
function cityValidation(){
    // variables 
    let city = document.getElementById("town");
    let details = document.getElementById("city_details");

    // verify if input field is empty
    if (city.value.length == 0) {
        saveBtn.disabled = true;
        details.innerHTML = '*required';
        details.style.color = "#ED3833";
        return false;

    } 
    saveBtn.disabled = false;
    // success message
    details.innerHTML = "";
    return true;
}

// function to verify postal code
function postalCodeValidation(){
    // variables 
    let postalCode = document.getElementById("zipCode");
    let details = document.getElementById("postalCode_details");

    /* Regular Expression for validating postal code*/
    let re = /^[0-9]{5}(?:-[0-9]{4})?$/;
    
    // verify if input field is empty
    if (!postalCode.value.match(re)) {
        saveBtn.disabled = true;
        details.style.color = "#ED3833";
        details.innerHTML = "Please enter a correct postal code";
        return false;

    } 
    saveBtn.disabled = false;
    // success message
    details.innerHTML = "";
    return true;
}

// function for country validation
function countryValidation(){
    // variables 
    let country = document.getElementById("country");
    let details = document.getElementById("country_details");

    // verify if input field is empty
    if (country.value.length == 0) {
        saveBtn.disabled = true;
        details.innerHTML = '*required';
        details.style.color = "#ED3833";
        return false;
    } 

    // disable save btn
    saveBtn.disabled = false;
    // success message
    details.innerHTML = "";
    return true;
}