// Entire script will be in script mode
"use strict";

// function call 
generateContent();

// function to generate the content of the abstract body
function generateContent(){

    //Create request object
    let request = new XMLHttpRequest();

    //Set up request and send it
    request.open("POST", "../common/getCategories.php");

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
    request.send("categoryName="+"Abstract");

}

// function to load content of the category into page
function displayContent(jsonProduct){

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
                    htmlStr += '<p class="card-text">'+ productArray[i].description +'</p>'
                    htmlStr += '<div class="card-details">'; 
                        htmlStr += '<p>Rs'+ productArray[i].price +'</p>';
                    htmlStr += '</div>';
                htmlStr += '</div>';
            htmlStr += '</div>';
        htmlStr += '</div>';
    }

    //  display the html into the class row
    document.getElementsByClassName("row")[0].innerHTML = htmlStr;
}

// function to redirect Product to specificPage of that prodID
function redirectProduct(prodID)
{   
    //Create request object
    let request = new XMLHttpRequest();

    //Set up request and send it
    request.open("POST", "../common/getSpecificProduct.php");
    
    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if (request.status === 200) {
            //Add return data to session storage 
            sessionStorage.Product = request.responseText;
            // redirect to specific product page
            window.location.href="../common/specificProduct.php";
        } else
            alert("Error communicating with server: " + request.status);
    };
    
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send("func=" + "getId"+ "&id="+prodID);
}