// Entire script will be in script mode
"use strict";

function priceAsc(categoryName){
    //Create request object
    let request = new XMLHttpRequest();

    //Set up request and send it
    request.open("POST", "../common/getSortBy.php");
        
    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if (request.status === 200) {
            let displayDiv = categoryName + 'Content';
            displayNewContent(request.responseText, displayDiv);
        } else
            alert("Error communicating with server: " + request.status);
    };
        
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send("func=" + "priceAsc"+ "&categoryName="+categoryName);
}

function priceDesc(categoryName){
    //Create request object
    let request = new XMLHttpRequest();

    //Set up request and send it
    request.open("POST", "../common/getSortBy.php");
        
    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if (request.status === 200) {
            let displayDiv = categoryName + 'Content';
            displayNewContent(request.responseText, displayDiv);
        } else
            alert("Error communicating with server: " + request.status);
    };
        
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send("func=" + "priceDesc"+ "&categoryName="+categoryName);
}

function alphaAsc(categoryName){
    //Create request object
    let request = new XMLHttpRequest();

    //Set up request and send it
    request.open("POST", "../common/getSortBy.php");
        
    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if (request.status === 200) {
            let displayDiv = categoryName + 'Content';
            displayNewContent(request.responseText, displayDiv);
        } else
            alert("Error communicating with server: " + request.status);
    };
        
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send("func=" + "alphaAsc"+ "&categoryName="+categoryName);
}

function alphaDesc(categoryName){
    //Create request object
    let request = new XMLHttpRequest();

    //Set up request and send it
    request.open("POST", "../common/getSortBy.php");
        
    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if (request.status === 200) {
            let displayDiv = categoryName + 'Content';
            displayNewContent(request.responseText, displayDiv);
        } else
            alert("Error communicating with server: " + request.status);
    };
        
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send("func=" + "alphaDesc"+ "&categoryName="+categoryName);
}



// function to load content of the category into page
function displayNewContent(jsonProduct, displayDiv){

    //Convert JSON to array of product objects
    let productArray = JSON.parse(jsonProduct);

    // create the html to display
    let htmlStr = '';
    for (let i = 0; i < productArray.length; ++i) {
        htmlStr += '<div class="col" onclick="redirectProduct(\''+productArray[i]._id.$oid+'\')">';
            htmlStr += '<div class="card">';
                htmlStr += '<!-- image -->';
                htmlStr += '<img class="card-img-top" src="'+ productArray[i].imageURL +'" alt="'+ productArray[i].name +'" height="300px" ></img>';
                htmlStr += '<!-- content -->';
                htmlStr += '<div class="card-body">';
                    htmlStr += '<h5 class="card-title" id="'+ productArray[i]._id.$oid +'">' + productArray[i].name +'</h5>';
                    htmlStr += '<p class="card-text">'+ productArray[i].description +'</p>';
                    htmlStr += '<div class="card-details">'; 
                        htmlStr += '<p>Rs'+ productArray[i].price +'</p>';
                    htmlStr += '</div>';
                htmlStr += '</div>';
            htmlStr += '</div>';
        htmlStr += '</div>';
    }
    console.log(displayDiv);
    //  display the html into the class card
    document.getElementById(displayDiv).innerHTML = htmlStr;
}
