// Entire script will be in script mode
"use strict";

let searchTxt = sessionStorage.getItem("Search");

// function call 
generateContent();

// function to generate the content of the portrait body
function generateContent(){

    //Create request object
    let request = new XMLHttpRequest();

    if (searchTxt.length == 0) {
        searchTxt = null;
    }
    //Set up request and send it
    request.open("POST", "getSearch.php");

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
    request.send("searchTxt="+searchTxt);

}

function displayContent(jsonProduct)
{
    if (jsonProduct == 'false'){
        document.getElementById("noMatch").style.display = "block";
        document.getElementById("searchContainer").style.display = "none";
    } else {
        document.getElementById("noMatch").style.display = "none";
        document.getElementById("searchContainer").style.display = "block";
        // Convert JSON to array of product objects
        let productArray = JSON.parse(jsonProduct);

        // create the html to display
        let htmlStr = '';
        for (let i = 0; i < productArray.length; ++i) {
            htmlStr += '    <div class="card mb-3" style="max-width: 600px;" onclick="redirectProduct(\''+productArray[i].id.$oid+'\')"> ';
            htmlStr += '    <div class="row g-0">' ;
            htmlStr += '        <div class="col-md-4">';
            htmlStr += '            <img src="'+ productArray[i].imageURL +'" class="card-img-top" height="300px" alt="'+ productArray[i].name +'" > ';
            htmlStr += '        </div>';
            htmlStr += '        <div class="col-md-8">';
            htmlStr += '        <div class="card-body">';
            htmlStr += '            <h5 class="card-title" id="'+ productArray[i].id.$oid +'">' + productArray[i].name +'</h5>';
            htmlStr += '            <p class="card-text">'+ productArray[i].description +'</p>';
            htmlStr += '            <p class="card-text">'+ productArray[i].category +' Painting</p>';
            htmlStr += '            <p class="card-text"><small class="text-muted">Rs '+ productArray[i].price +'</small></p>';
            htmlStr += '        </div>';
            htmlStr += '        </div>';
            htmlStr += '    </div>';
            htmlStr += '</div>';
        }

        // //  display the html into the class card
        document.getElementsByClassName("eachProduct")[0].innerHTML = htmlStr;
    }

}

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
            //Add data from server to page
            sessionStorage.Product = request.responseText;
            // // redirect to home page
            window.location.href="../common/specificProduct.php";
        } else
            alert("Error communicating with server: " + request.status);
    };
    
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send("func=" + "getId"+ "&id="+prodID);
}