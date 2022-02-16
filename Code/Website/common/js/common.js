// Entire script will be in script mode
"use strict";

//  variable to store the toggleEye details
let toggle_name = document.getElementById("toggleEye");
// variable to store the URL content
let pathArray = window.location.pathname.split('/');
// access the last element of pathname
let pathname = pathArray[pathArray.length - 1];

// search input + redirection
document.getElementById("searchBtn").onclick = function () {
    sessionStorage.Search = document.getElementById("search").value;
    // redirect to search page depending on pathname
    if(pathname == 'index.php'){
        location.href = "./search/search.php";
    } else if(pathname == 'search.php'){
        window.location.reload();
    }else if (pathname.length == 0){
        location.href = "./search/search.php";
    } else {
        location.href = "../search/search.php";
    }
};

// check if pathname is register.php
if (pathname == 'register.php' || pathname == 'editPassword.php') {
    // event listener to detect click on the eye
    toggle_name.addEventListener("click", togglePassword);
}

//  function for togglePaassword
function togglePassword() {
    // variables
    let pwd = document.getElementById(toggle_name.getAttribute("name"));
    let type = pwd.getAttribute("type");

    // toggle the type attribute
    if (type == 'password'){
        type = 'text';
    } else {
        type = 'password';
    }    
    pwd.setAttribute('type', type);

    //  change the icon 
    this.classList.toggle('fa-eye-slash');
}

// redirect home product along with prodID function
function redirectHomeProduct(prodID)
{   
    //Create request object
    let request = new XMLHttpRequest();

    //Set up request and send it
    request.open("POST", "./common/getSpecificProduct.php");
    
    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if (request.status === 200) {
            //Add data from server to session storage
            sessionStorage.Product = request.responseText;
            // redirect to specific product page
            window.location.href="./common/specificProduct.php";
        } else
            alert("Error communicating with server: " + request.status);
    };
    
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send("func=" + "getId"+ "&id="+prodID);
}