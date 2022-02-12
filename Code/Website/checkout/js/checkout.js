// Entire script will be in script mode
"use strict";

let sessionEmail = document.getElementById("sessionID").innerText;

if (sessionID.length != 0){
    extractCustomer(sessionEmail);
} else {
    console.log("not logged");
}

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
            displayContent(request.responseText);
        } else
            alert("Error communicating with server: " + request.status);
    };
    
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send("email="+email);
}

function displayContent(customerJSON)
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
    htmlStr += '    <input placeholder="Mobile Phone Number" value="'+ user[0].telephone  + '"></input>';
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
    htmlStr += ' '+ user[0].country  + '';
    htmlStr += '    </div>';
    htmlStr += '    <!-- name -->';
    htmlStr += '    <div class="name">   ';
    htmlStr += '        <div class="first">';
    htmlStr += '            <label>First Name</label>';
    htmlStr += '            <br>';
    htmlStr += '            <input value="'+ user[0].firstname  + '"></input>';
    htmlStr += '        </div>';
    htmlStr += '        <div class="last">';
    htmlStr += '            <label>Last Name</label>';
    htmlStr += '            <br>';
    htmlStr += '            <input value="'+ user[0].lastname  + '"></input>';
    htmlStr += '        </div>';
    htmlStr += '    </div>';
    htmlStr += '    <!-- street -->';
    htmlStr += '    <div class="street">';
    htmlStr += '        <label>Address</label>';
    htmlStr += '        <input value="'+ user[0].address  + '"></input>';
    htmlStr += '    </div>';
    htmlStr += '    <!-- city and postal code -->';
    htmlStr += '    <div class="city">';
    htmlStr += '        <div class="city_name">';
    htmlStr += '            <label>City</label>';
    htmlStr += '            <br>';
    htmlStr += '            <input value="'+ user[0].city  + '"></input>';
    htmlStr += '        </div>';
    htmlStr += '        <div class="postalCode">';
    htmlStr += '            <label>Postal Code</label>';
    htmlStr += '            <br>';
    htmlStr += '            <input value="'+ user[0].postalCode  + '"></input>';
    htmlStr += '        </div>';
    htmlStr += '    </div>';
    htmlStr += '</div>';
    htmlStr += '<!-- confirm btn or return to cart -->';
    htmlStr += '<div class="btn">';
    htmlStr += '    <button>Confirm</button>';
    htmlStr += '    <a href="../cart/cart.php">Return to cart</a>';
    htmlStr += '</div>';

    document.getElementsByClassName("customerInfo")[0].innerHTML = htmlStr;
}