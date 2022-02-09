// Entire script will be in script mode
"use strict";

displayProduct();    
generateReview();

// function to load content of the category into page
function displayProduct(){

    //Convert JSON to array of product objects
    let productArray = JSON.parse(sessionStorage.Product);

    // create the html to display
    let htmlStr = '';

    for (let i = 0; i < productArray.length; ++i) {
        htmlStr += '<div class="productImage">';
        htmlStr += '    <img class="card-img-top" src="'+ productArray[0].imageURL+'" alt="'+ productArray[i].name +'" height="500px"></img>';
        htmlStr += '</div>';
        htmlStr += '<div class="productDetails">';
        htmlStr += '    <div class="companyDetails">TiMoris</div>';
        htmlStr += '    <div class="productName">'+ productArray[0].name+'</div>';
        htmlStr += '    <div class="productPrice">Rs '+ productArray[0].price+'</div>';
        htmlStr += '    <div class="productSize">';
        htmlStr += '        <div class="sizeTitle">Size</div>';
        htmlStr += '        <div class="sizeOption">';
        htmlStr += '            <input type="radio" name="product_Size"';
        htmlStr += '            value="A2" onclick="resetQty()" checked> A2';
        htmlStr += '            <input type="radio" name="product_Size"';
        htmlStr += '            value="A3" onclick="resetQty()"> A3';
        htmlStr += '            <input type="radio" name="product_Size"';
        htmlStr += '            value="A4" onclick="resetQty()"> A4   ';     
        htmlStr += '        </div>';
        htmlStr += '    </div>';
        htmlStr += '    <div class="productQty">';
        htmlStr += '        <div class="QtyTitle">';
        htmlStr += '            Quantity';
        htmlStr += '        </div>';
        htmlStr += '        <div class="counter">';
        htmlStr += '            <!-- decrease -->';
        htmlStr += '            <div class="minus" onclick="decrease()"> ';
        htmlStr += '                <button>-</button> ';
        htmlStr += '            </div>';
        htmlStr += '            <!-- qty number -->';
        htmlStr += '            <div class="qtyNumber" id="qtyNumber"> '+ productArray[0].inventory[0]+' </div>';
        htmlStr += '            <!-- increase -->';
        htmlStr += '            <div class="add" onclick="increase()"> ';
        htmlStr += '                <button>+</button> ';
        htmlStr += '            </div>';
        htmlStr += '        </div>';
        htmlStr += '    </div>';
    }
    htmlStr += '    <div class="confirmationBtn">';
    htmlStr += '        <button id="basket" onclick="addBasket()">Add to Basket</button>';
    htmlStr += '        <br>';
    htmlStr += '        <button id="buyIt">Buy It Now</button>';
    htmlStr += '    </div>';
    htmlStr += '</div>';
    //  display the html into the class card
    document.getElementsByClassName("productContainer")[0].innerHTML = htmlStr;

}

function writeReview()
{
    document.getElementById("reviewQty").style.display = "none";
    document.getElementById("writeReview").style.display = "block";
}

function viewReview(){
    document.getElementById("reviewQty").style.display = "block";
    document.getElementById("writeReview").style.display = "none";
}


function decrease(){
    if (parseInt(qtyNumber.innerText) > 0){
        qtyNumber.innerText -= 1;
    }

}

function increase(){
    //Convert JSON to array of product objects
    let productArray = JSON.parse(sessionStorage.Product);
    let size = document.getElementsByName('product_Size');
    let choice;
    let max;
    for (let i = 0; i < size.length; i++){
        if(size[i].checked){
            choice = size[i].value;
        }
    }
    if(choice == "A2"){
        max = productArray[0].inventory[0];
    } else if (choice =="A3"){
        max = productArray[0].inventory[1];
    } else {
        max = productArray[0].inventory[2];
    }
    if (parseInt(qtyNumber.innerText) < max ){
        qtyNumber.innerText = parseInt(qtyNumber.innerText) + 1;
    }
    
}

function resetQty(){
    qtyNumber.innerText = 0;
}

function submitReview(){
    let reviewBtn = document.getElementById("submitReview");

    if (nameValidation() && emailValidation() && titleValidation() && bodyValidation()){
        let name = document.getElementById("name");
        let email = document.getElementById("email");
        let title = document.getElementById("writereviewTitle");
        let description = document.getElementById("writereviewBody");
        let productArray = JSON.parse(sessionStorage.Product);
        let prodID = productArray[0]._id.$oid;
    
        //Create request object
        let request = new XMLHttpRequest();
    
        //Set up request and send it
        request.open("POST", "getSpecificProduct.php");
         
        //Create event handler that specifies what should happen when server responds
        request.onload = () => {
            //Check HTTP status code
            if (request.status === 200) {
                // reload the page
                window.location.reload();
            } else
                alert("Error communicating with server: " + request.status);
        };
         
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        request.send("func=" + "addReview"+"&prodID="+prodID + "&name=" + name.value 
        +"&email=" + email.value +"&title=" + title.value +"&description=" + description.value);
    } else {
        reviewBtn.disabled = true;
    }

}

// function to validate name
function nameValidation() {
    let name = document.getElementById("name");
    let reviewBtn = document.getElementById("submitReview");
    // variables 
    let details = document.getElementById("name_details");

    /* Regular Expression for validating firstname*/
    let re = new RegExp("^[a-z A-Z ,.'-]+$");
    
    // verify if input field is empty
    if (name.value.length == 0) {
        reviewBtn.disabled = true;
        details.innerHTML = '*required';
        details.style.color = "#ED3833";
        return false;
    // check if pass the regex 
    } else if (!re.test(name.value)) { 
        reviewBtn.disabled = true;
        details.innerHTML = '*Enter a valid first name';
        details.style.color = "#ED3833";
        return false;
    }

    reviewBtn.disabled = false;
    // success message
    details.innerHTML = "";
    return true;
    
}

//  function to validate email
function emailValidation() {
    let email = document.getElementById("email");
    let reviewBtn = document.getElementById("submitReview");

    //variables
    let details = document.getElementById("email_details");

    // Regular expression for validating email
    let re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;

    // check if input field is empty
    if (email.value.length == 0) {
        reviewBtn.disabled = true;
        details.innerHTML = "*required";
        details.style.color = "#ED3833";
        return false;
    // check if pass the regex
    } else if (!email.value.match(re)){
        reviewBtn.disabled = true;
        details.innerHTML = "Your email address must be in the <br> format of name@domain.com";
        details.style.color = "#ED3833";
        return false;
    }

    reviewBtn.disabled = false;
    // succcess message
    details.innerHTML = "";
    return true;
}

// function to validate title
function titleValidation() {
    let title = document.getElementById("writereviewTitle");
    let reviewBtn = document.getElementById("submitReview");
    // variables 
    let details = document.getElementById("title_details");

    /* Regular Expression for validating firstname*/
    let re = new RegExp("^[a-z A-Z ,.'-]+$");
    
    // verify if input field is empty
    if (title.value.length == 0) {
        reviewBtn.disabled = true;
        details.innerHTML = '*required';
        details.style.color = "#ED3833";
        return false;
    } 

    reviewBtn.disabled = false;
    // success message
    details.innerHTML = "";
    return true;
    
}

// function to validate review description
function bodyValidation() {
    let body = document.getElementById("writereviewBody");
    let reviewBtn = document.getElementById("submitReview");
    // variables 
    let details = document.getElementById("body_details");

    /* Regular Expression for validating firstname*/
    let re = new RegExp("^[a-z A-Z ,.'-]+$");
    
    // verify if input field is empty
    if (body.value.length == 0) {
        reviewBtn.disabled = true;
        details.innerHTML = '*required';
        details.style.color = "#ED3833";
        return false;
    } 

    reviewBtn.disabled = false;
    // success message
    details.innerHTML = "";
    return true;
    
}

function generateReview()
{
    let productArray = JSON.parse(sessionStorage.Product);
    let prodID = productArray[0]._id.$oid;
 
    //Create request object
    let request = new XMLHttpRequest();
    
    //Set up request and send it
    request.open("POST", "getSpecificProduct.php");
             
    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if (request.status === 200) {
            displayReview(request.responseText);
        } else
            alert("Error communicating with server: " + request.status);
    };
             
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send("func=" + "viewReview"+"&id="+prodID);
}

function displayReview(reviewList){
    // create the html to display
    let htmlStr = '';

    if (reviewList == 'false'){
        htmlStr += '<div class="reviewList">';
        htmlStr += '<div class="reviewListTitle">No review</div>';
        htmlStr += '</div>';
    } else {
        //Convert JSON to array of product objects
        let reviewArray = JSON.parse(reviewList);

        for (let i = 0; i < reviewArray.length; ++i) {
            htmlStr += '<div class="reviewList">';
            htmlStr += '<div class="reviewListTitle">'+ reviewArray[i].title+'</div>';
            htmlStr += '<div class="reviewListDetails">'+ reviewArray[i].name + ' on <div id="date">' + reviewArray[i].date +'</div> </div>';
            htmlStr += '<div class="reviewListDesc">'+ reviewArray[i].description + '</div>';
            htmlStr += '</div>';
        }
    }
    //  display the html into the class card
    document.getElementsByClassName("reviewQty")[0].innerHTML = htmlStr;
}

function addBasket()
{
    let productArray = JSON.parse(sessionStorage.Product);
    let prodID = productArray[0]._id.$oid;
    let choice;
    let qty = qtyNumber.innerText;
    let size = document.getElementsByName('product_Size');
    for (let i = 0; i < size.length; i++){
        if(size[i].checked){
            choice = size[i].value;
        }
    }
    //Create request object
    let request = new XMLHttpRequest();
    
    //Set up request and send it
    request.open("POST", "addCart.php");
             
    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if (request.status === 200) {
            displayCartAlert(request.responseText);
        } else
            alert("Error communicating with server: " + request.status);
    };
             
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send("prodID=" + prodID + "&session_ID=" + session_ID + "&qty=" + qty + "&size=" + choice);
}

