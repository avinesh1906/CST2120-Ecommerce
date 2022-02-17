// Entire script will be in script mode
"use strict";

let sessionEmail = document.getElementById("sessionEmail").innerText;
let confirmBtn = document.getElementById("confirmBtn");

// check whether there is any logged email
if (sessionEmail.length != 0){
    // function call
    extractCustomer(sessionEmail);
} 

// function call
extractOrder();

// extract customer details
function extractCustomer(email)
{
    //Create request object
    let request = new XMLHttpRequest();
    
    //Set up request and send it
    request.open("POST", "getCheckout.php");
    
    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if (request.status === 200) {
            //Add data from server to page
            displayAddress(request.responseText);
        } else
            alert("Error communicating with server: " + request.status);
    };
    
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send("func="+ "getAddress" + "&email="+email);
}

// function to display address on the website
function displayAddress(customerJSON)
{
    //Convert JSON to array of product objects
    let user = JSON.parse(customerJSON);

    // create the html to display personal information 
    let htmlStr = '';

    htmlStr += '<!-- header title  -->';
    htmlStr += '<div class="header">';
    htmlStr += '    Contact Information';
    htmlStr += '</div>';
    htmlStr += '<!-- phone number -->';
    htmlStr += '<div class="phone">';
    htmlStr += '    <label>Phone Number: </label>';
    htmlStr += '    <input id="phone" onkeyup="telValidation()" value="'+ user[0].telephone  + '"></input>';
    htmlStr += '<div class="form_error">';
    htmlStr += '<span id="tel_details"></span>';
    htmlStr += '</div>';
    htmlStr += '</div>';
    htmlStr += '<div id="line"></div>';
    htmlStr += '<!-- Shipping address  -->';
    htmlStr += '<div class="header">';
    htmlStr += '    Shipping Address';
    htmlStr += '</div>';
    htmlStr += '<!-- address  -->';
    htmlStr += '<div class="address">';
    htmlStr += '    <!-- country -->';
    htmlStr += '    <div class="country">   ';
    htmlStr += '<label> Country </label>';
    htmlStr += ' <input onkeyup="countryValidation()" value = "'+ user[0].country  + '" id="country" size="50">';
    htmlStr += '<div class="form_error">';
    htmlStr += '<span id="country_details"></span>';
    htmlStr += '</div>';
    htmlStr += '    </div>';
    htmlStr += '    <!-- name -->';
    htmlStr += '    <div class="name">   ';
    htmlStr += '        <div class="first">';
    htmlStr += '            <label >First Name</label>';
    htmlStr += '            <br>';
    htmlStr += '            <input id="firstname" onkeyup="firstValidation()" value="'+ user[0].firstname  + '"></input>';
    htmlStr += '<div class="form_error">';
    htmlStr += '<span id="first_details"></span>';
    htmlStr += '</div>';
    htmlStr += '        </div>';
    htmlStr += '        <div class="last">';
    htmlStr += '            <label>Last Name</label>';
    htmlStr += '            <br>';
    htmlStr += '            <input id="lastname" onkeyup="lastValidation()" value="'+ user[0].lastname  + '"></input>';
    htmlStr += '<div class="form_error">';
    htmlStr += '<span id="last_details"></span>';
    htmlStr += '</div>';
    htmlStr += '        </div>';
    htmlStr += '    </div>';
    htmlStr += '    <!-- street -->';
    htmlStr += '    <div class="street">';
    htmlStr += '        <label>Address</label>';
    htmlStr += '        <input id="address" onkeyup="addressValidation()" value="'+ user[0].address  + '"></input>';
    htmlStr += '<div class="form_error">';
    htmlStr += '<span id="address_details"></span>';
    htmlStr += '</div>';
    htmlStr += '    </div>';
    htmlStr += '    <!-- city and postal code -->';
    htmlStr += '    <div class="city">';
    htmlStr += '        <div class="city_name">';
    htmlStr += '            <label>City</label>';
    htmlStr += '            <br>';
    htmlStr += '            <input id="city" onkeyup="cityValidation()" value="'+ user[0].city  + '"></input>';
    htmlStr += '<div class="form_error">';
    htmlStr += '<span id="city_details"></span>';
    htmlStr += '</div>';
    htmlStr += '        </div>';
    htmlStr += '        <div class="postalCode">';
    htmlStr += '            <label>Postal Code</label>';
    htmlStr += '            <br>';
    htmlStr += '            <input id="postalCode" onkeyup="postalCodeValidation()" value="'+ user[0].postalCode  + '"></input>';
    htmlStr += '<div class="form_error">';
    htmlStr += '<span id="postalCode_details"></span>';
    htmlStr += '</div>';
    htmlStr += '        </div>';
    htmlStr += '    </div>';
    htmlStr += '</div>';
    htmlStr += '<!-- confirm btn or return to cart -->';
    htmlStr += '<div class="btn">';
    htmlStr += '    <button id="confirmBtn" onclick="purchase()">Confirm</button>';
    htmlStr += '    <a href="../cart/cart.php">Return to cart</a>';
    htmlStr += '</div>';

    document.getElementsByClassName("customerInfo")[0].innerHTML = htmlStr;
}

// function to extract order
function extractOrder()
{
    // variables
    let sessionID = document.getElementById("sessionID").innerText;
    //Create request object
    let request = new XMLHttpRequest();
    
    //Set up request and send it
    request.open("POST", "getCheckout.php");
    
    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if (request.status === 200) {
            //Add data from server to page
            displayOrder(request.responseText);
        } else
            alert("Error communicating with server: " + request.status);
    };
    
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send("func="+ "getOrder" + "&session_ID="+sessionID);
}

// function to display order
function displayOrder(orderJSON)
{
    //Convert JSON to array of order objects
    let OrderArray = JSON.parse(orderJSON);
    
    // create the html to display personal information 
    let htmlStr = '';

    // loop thorough order array 
    for (let i = 0; i < OrderArray.length; ++i) {
        htmlStr += '<!-- priduct list -->';
        htmlStr += '<div class="productList">';
        htmlStr += '    <!-- image -->';
        htmlStr += '    <div class="img">';
        htmlStr += '        <img src="'+ OrderArray[i].imageURL+'" alt="'+ OrderArray[i].name+'" width="100px" height="100px">';
        htmlStr += '    </div>';
        htmlStr += '    <!-- product details -->';
        htmlStr += '    <div class="details">';
        htmlStr += '        '+ OrderArray[i].name+' '+ OrderArray[i].category+' Painting';
        htmlStr += '        <br>';
        htmlStr += '        '+ OrderArray[i].qty+' '+ OrderArray[i].category+'';
        htmlStr += '        <br>';

        if (OrderArray[i].size == "A2"){
            htmlStr+='                    420 x 594 mm ';
        } else if (OrderArray[i].size == "A3"){
            htmlStr+='                    297 x 420 mm ';
        } else {
            htmlStr+='                    210 x 297 mm ';
        }
        htmlStr += '    </div>';
        htmlStr += '    <div class="itemtotal">';
        htmlStr += '        <a>Rs '+ (OrderArray[i].qty * OrderArray[i].price) +'</a>';
        htmlStr += '    </div>';
        htmlStr += '</div>';
        htmlStr += '<div id="line"></div>';
    }
    //  display the html into the class productInfo
    document.getElementsByClassName("productInfo")[0].innerHTML = htmlStr;
    
    // create the price sring
    let priceStr = '';
    
    priceStr += '<!-- subtotal -->';
    priceStr += '<div class="subtotal">';
    priceStr += '    <div class="label">';
    priceStr += '        Subtotal';
    priceStr += '    </div>';
    priceStr += '    <div class="amount">';
    // calculate sub total
    let subTotal = 0; 
    for (let i = 0; i < OrderArray.length; ++i) {
        subTotal += (OrderArray[i].qty* OrderArray[i].price);
    }

    // display other price details
    priceStr += '        Rs '+ subTotal +'';
    priceStr += '    </div>';
    priceStr += '</div>';
    priceStr += '<!-- tax -->';
    priceStr += '<div class="tax">';
    priceStr += '    <div class="label">';
    priceStr += '        Tax (5% of Rs '+ subTotal +')';
    priceStr += '    </div>';
    priceStr += '    <div class="amount">';
    priceStr += '        Rs '+ (0.05 *subTotal) +'';
    priceStr += '    </div>';
    priceStr += '</div>';
    priceStr += '<!-- shipping -->';
    priceStr += '<div class="shipping">';
    priceStr += '    <div class="label">';
    priceStr += '        Shipping';
    priceStr += '    </div>';
    priceStr += '    <div class="amount">';
    priceStr += '        Rs 350';
    priceStr += '    </div>';
    priceStr += '</div>';
    priceStr += '<div id="line"></div>';
    priceStr += '<!-- total -->';
    priceStr += '<div class="total">';
    priceStr += '    <div class="label">';
    priceStr += '        Total';
    priceStr += '    </div>';
    priceStr += '    <div class="amount">';
    priceStr += '        Rs '+ (subTotal + (0.05 *subTotal) + 350) +'';
    priceStr += '    </div>';
    priceStr += '</div>';

    //  display the html into the class productInfo
    document.getElementsByClassName("productInfo")[0].innerHTML += priceStr;

}

// function to add purchase details
function purchase()
{
    // variables
    let sessionID = document.getElementById("sessionID").innerText;
    let phone = document.getElementById("phone");
    let firstname = document.getElementById("firstname");
    let lastname = document.getElementById("lastname");
    let address = document.getElementById("address");
    let city = document.getElementById("city");
    let postalCode = document.getElementById("postalCode");
    let country = document.getElementById("country");
    let email = null;

    // check if session email is empty
    if (sessionEmail.length != 0){
        email = sessionEmail;
    } 

    // verification if met all conditions before adding to db
    if (telValidation() && countryValidation() && firstValidation() && lastValidation() && addressValidation() 
    && cityValidation() && postalCodeValidation()){
        // enable button
        confirmBtn.disabled = false;
        //Create request object
        let request = new XMLHttpRequest();
        
        //Set up request and send it
        request.open("POST", "getCheckout.php");
        
        //Create event handler that specifies what should happen when server responds
        request.onload = () => {
            //Check HTTP status code
            if (request.status === 200) {
                // redirect to confirmation page
                window.location.href ='./confirmation.php';
            } else
                alert("Error communicating with server: " + request.status);
        };
        
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("func="+ "storeOrder" + "&session_ID="+sessionID + "&telephone="+phone.value 
        + "&firstname="+firstname.value  + "&lastname="+lastname.value + "&address="+address.value  
        + "&city="+city.value  + "&postalCode="+postalCode.value + "&country="+country.value  + "&email="+email);

    } else {
        confirmBtn.disabled = true;
    }

}

// function to validate address
function addressValidation(){
    // variables 
    let details = document.getElementById("address_details");
    let address = document.getElementById("address");

    // verify if input field is empty
    if (address.value.length == 0) {
        confirmBtn.disabled = true;
        details.innerHTML = '*required';
        details.style.color = "#ED3833";
        return false;

    } 
    confirmBtn.disabled = false;
    // success message
    details.innerHTML = "";
    return true;
}

// function to validate city
function cityValidation(){
    // variables 
    let details = document.getElementById("city_details");
    let city = document.getElementById("city");
    
    // verify if input field is empty
    if (city.value.length == 0) {
        confirmBtn.disabled = true;
        details.innerHTML = '*required';
        details.style.color = "#ED3833";
        return false;

    } 
    confirmBtn.disabled = false;
    // success message
    details.innerHTML = "";
    return true;
}

// function to verify postal code
function postalCodeValidation(){
    // variables 
    let details = document.getElementById("postalCode_details");
    let postalCode = document.getElementById("postalCode");

    /* Regular Expression for validating postal code*/
    let re = /^[0-9]{5}(?:-[0-9]{4})?$/;
    
    // verify if input field is empty
    if (!postalCode.value.match(re)) {
        confirmBtn.disabled = true;
        details.style.color = "#ED3833";
        details.innerHTML = "Please enter a correct postal code";
        return false;

    } 
    confirmBtn.disabled = false;
    // success message
    details.innerHTML = "";
    return true;
}

// function to validate country
function countryValidation(){
    // variables 
    let details = document.getElementById("country_details");
    let country = document.getElementById("country");
    
    // verify if input field is empty
    if (country.value.length == 0) {
        confirmBtn.disabled = true;
        details.innerHTML = '*required';
        details.style.color = "#ED3833";
        return false;

    } 
    confirmBtn.disabled = false;
    // success message
    details.innerHTML = "";
    return true;
}

// function to validate firstname
function firstValidation() {
    // variables 
    let details = document.getElementById("first_details");
    let firstname = document.getElementById("firstname");

    /* Regular Expression for validating firstname*/
    let re = new RegExp("^[A-Z a-z ,.'-]+$");
    
    // verify if input field is empty
    if (firstname.value.length == 0) {
        confirmBtn.disabled = true;
        details.innerHTML = '*required';
        details.style.color = "#ED3833";
        return false;
    // check if pass the regex 
    } else if (!re.test(firstname.value)) { 
        confirmBtn.disabled = true;
        details.innerHTML = '*Enter a valid first name';
        details.style.color = "#ED3833";
        return false;
    }

    confirmBtn.disabled = false;
    // success message
    details.innerHTML = "";
    return true;
    
}

// function to validate lastname
function lastValidation() {
    // variables 
    let details = document.getElementById("last_details");
    let lastname = document.getElementById("lastname");

    /* Regular Expression for validating lastname*/
    let re = new RegExp("^[A-Z a-z ,.'-]+$");
    
    // verify if input field is empty
    if (lastname.value.length == 0) {
        confirmBtn.disabled = true;
        details.innerHTML = '*required';
        details.style.color = "#ED3833";
        return false;
    // check if pass the regex 
    } else if (!re.test(lastname.value)) { 
        confirmBtn.disabled = true;
        details.innerHTML = '*Enter a valid last name';
        details.style.color = "#ED3833";
        return false;
    }
    confirmBtn.disabled = false;
    // success message
    details.innerHTML = "";
    return true;
}

// function to validate telephone
function telValidation() {
    // variables 
    let details = document.getElementById("tel_details");
    let phone = document.getElementById("phone");

    /* Regular Expression for validating telephone number*/
    let re = /^[+]*[(]{0,1}[0-9]{1,4}[)]{0,1}[-\s\./0-9]*$/;
    
    // verify if input field is empty
    if (phone.value.length == 0) {
        confirmBtn.disabled = true;
        details.innerHTML = '*required';
        details.style.color = "#ED3833";
        return false;
    // check if pass the regex 
    } else if (!phone.value.match(re)) {
        confirmBtn.disabled = true; 
        details.innerHTML = '*Enter a valid telephone number';
        details.style.color = "#ED3833";
        return false;
    }    
    confirmBtn.disabled = false;
    // success message
    details.innerHTML = "";
    return true;
}