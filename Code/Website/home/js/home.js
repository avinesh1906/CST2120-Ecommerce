// Entire script will be in script mode
"use strict";

// import Recommender module from recommender.js
import {Recommender} from '../../common/js/recommender.js';

//Create recommender object - it loads its state from local storage
let recommender = new Recommender();

// function call when index.php is loaded
generateFeaturedContent();
generateLatestContent();
generateBestsellerContent();
showRecommendation();

// variables
let option = document.getElementById("top-product-item");
let featured = document.getElementsByClassName("featured")[0];
let latest = document.getElementsByClassName("latest")[0];
let bestseller = document.getElementsByClassName("bestseller")[0];

// button variables
let featuredBtn = document.getElementsByClassName("featuredBtn")[0];
let latestBtn = document.getElementsByClassName("latestBtn")[0];
let bestsellerBtn = document.getElementsByClassName("bestsellerBtn")[0];

// function to display recommendation
function showRecommendation(){
    // if there is any search
    if (sessionStorage['Search']){
        //Add the search keyword to the recommender
        recommender.addKeyword(sessionStorage.Search);
        generateContent(recommender.getTopKeyword());
    } else {
        // hide the class recommendation is no search found
        document.getElementsByClassName("recommendation")[0].style.display = "none";
    }
}

// event listener for option (top product)
option.addEventListener('click', function(e) {
    // call function featured
    if (e.target.name == "featured" ){
        featuredBtn.setAttribute('id', 'active');
        latestBtn.removeAttribute('id');
        bestsellerBtn.removeAttribute('id');
        featureFunction();
    // call function latest
    } else if (e.target.name == "latest" ){
        latestBtn.setAttribute('id', 'active');
        featuredBtn.removeAttribute('id');
        bestsellerBtn.removeAttribute('id');
        latestFunction();
    // else call bestseller function
    } else {
        bestsellerBtn.setAttribute('id','active');
        featuredBtn.removeAttribute('id');
        latestBtn.removeAttribute('id');
        bestsellerFunction();
    }
});

// function featureFunction
function featureFunction() {
    // hide and show classes
    featured.style.display = "block";
    latest.style.display = "none";
    bestseller.style.display = "none";
}

// function latestFunction
function latestFunction() {
    // hide and show classes
    featured.style.display = "none";
    latest.style.display = "block";
    bestseller.style.display = "none";
}

// function bestsellerFunction
function bestsellerFunction() {
    // hide and show classes
    featured.style.display = "none";
    latest.style.display = "none";
    bestseller.style.display = "block";
}

// function to generate the content of the portrait body
function generateContent(searchTxt){
    //Create request object
    let request = new XMLHttpRequest();

    //Set up request and send it
    request.open("POST", "./search/getSearch.php");

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if (request.status === 200) {
            //Add data from server to page
            displayRecommendationContent(request.responseText);
        } else
            alert("Error communicating with server: " + request.status);
    };

    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send("searchTxt="+searchTxt);

}

// function to generate the content of the portrait body
function generateFeaturedContent(){
    //Create request object
    let request = new XMLHttpRequest();

    //Set up request and send it
    request.open("POST", "./search/getSearch.php");

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if (request.status === 200) {
            //Add data from server to page
            displayTopProduct(request.responseText, "featured");
        } else
            alert("Error communicating with server: " + request.status);
    };

    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send("searchTxt="+"Featured");

}

// function to generate the content of the portrait body
function generateLatestContent(){
    //Create request object
    let request = new XMLHttpRequest();

    //Set up request and send it
    request.open("POST", "./search/getSearch.php");

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if (request.status === 200) {
            //Add data from server to page
            displayTopProduct(request.responseText, "latest");
        } else
            alert("Error communicating with server: " + request.status);
    };

    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send("searchTxt="+"Latest");

}

// function to generate the content of the portrait body
function generateBestsellerContent(){
    //Create request object
    let request = new XMLHttpRequest();

    //Set up request and send it
    request.open("POST", "./search/getSearch.php");

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if (request.status === 200) {
            //Add data from server to page
            displayTopProduct(request.responseText, "bestseller");
        } else
            alert("Error communicating with server: " + request.status);
    };

    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send("searchTxt="+"Bestseller");
}

// function to display top product
function displayTopProduct(jsonProduct, className)
{
    // Convert JSON to array of product objects
    let productArray = JSON.parse(jsonProduct);
    
    // create the html to display
    let htmlStr = '';

    htmlStr += '<!-- Card deck layout -->';
    htmlStr += '<div class="card-deck row">';

    // loop through product array
    for (let i = 0; i < productArray.length; ++i) {
        htmlStr += ' <div class="card-scroll" onclick="redirectHomeProduct(\''+productArray[i].id.$oid+'\')">';
        htmlStr += ' <!-- image -->';
        htmlStr += ' <img class="card-img-top" src="'+ productArray[i].imageURL.substring(1) +'" alt="'+ productArray[i].name +'" height="450px" width="95%">';
        htmlStr += ' <!-- content -->';
        htmlStr += ' <div class="card-body">';
        htmlStr += '     <h5 class="card-title" id="'+ productArray[i].id.$oid +'">' + productArray[i].name +'</h5>';
        htmlStr += '     <p class="card-text">'+ productArray[i].description +'</p>';
        htmlStr += '     <div class="card-details">';
        htmlStr += '         <p>Rs '+ productArray[i].price +' </p>';
        htmlStr += '     </div>';
        htmlStr += ' </div>';
        htmlStr += ' </div>';
    }
    htmlStr += ' </div>';

    // display the html str to the appropriate class
    document.getElementsByClassName(className)[0].innerHTML = htmlStr;
}

// function to display recommendation content
function displayRecommendationContent(jsonProduct)
{
    // check if jsonProduct is false
    if (jsonProduct == 'false'){
        // hide recommendation
        document.getElementsByClassName("recommendation")[0].style.display = "none";
    } else {
        // Convert JSON to array of product objects
        let productArray = JSON.parse(jsonProduct);

        // create the html to display
        let htmlStr = '';
        for (let i = 0; i < productArray.length; ++i) {
            htmlStr += '<div class="card-scroll" onclick="redirectHomeProduct(\''+productArray[i].id.$oid+'\')">';
            htmlStr += '<!-- image -->';
            htmlStr += '<img class="card-img-top" src="'+ productArray[i].imageURL.substring(1) +'" alt="'+ productArray[i].name +'" height="350px" width="85%">';
            htmlStr += '<!-- content -->';
            htmlStr += '<div class="card-body">';
            htmlStr += '    <h5 class="card-title" id="'+ productArray[i].id.$oid +'" >' + productArray[i].name +' </h5>';
            htmlStr += '    <p class="card-text">';
            htmlStr += '        '+ productArray[i].description +'';
            htmlStr += '    </p>';
            htmlStr += '    <div class="card-details">';
            htmlStr += '            <p class="card-text">'+ productArray[i].category +' Painting</p>';
            htmlStr += '        <p>Rs '+ productArray[i].price +' </p>';
            htmlStr += '    </div>';
            htmlStr += '</div>';
            htmlStr += '</div>';
        }

        // //  display the html into the class homeRecommendation
        document.getElementById("homeRecommendation").innerHTML = htmlStr;
    }

}
