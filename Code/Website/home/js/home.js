// Entire script will be in script mode
"use strict";

let option = document.getElementById("top-product-item");
let featured = document.getElementsByClassName("featured")[0];
let latest = document.getElementsByClassName("latest")[0];
let bestseller = document.getElementsByClassName("bestseller")[0];

let featuredBtn = document.getElementsByClassName("featuredBtn")[0];
let latestBtn = document.getElementsByClassName("latestBtn")[0];
let bestsellerBtn = document.getElementsByClassName("bestsellerBtn")[0];


// featured.addEventListener("click", featureFunction);
// latest.addEventListener("click", latestFunction);
// bestseller.addEventListener("click", bestsellerFunction);

option.addEventListener('click', function(e) {
    if (e.target.name == "featured" ){
        featuredBtn.setAttribute('id', 'active');
        latestBtn.removeAttribute('id');
        bestsellerBtn.removeAttribute('id');
        featureFunction();
    } else if (e.target.name == "latest" ){
        latestBtn.setAttribute('id', 'active');
        featuredBtn.removeAttribute('id');
        bestsellerBtn.removeAttribute('id');
        latestFunction();
    } else {
        bestsellerBtn.setAttribute('id','active');
        featuredBtn.removeAttribute('id');
        latestBtn.removeAttribute('id');
        bestsellerFunction();
    }
});

function featureFunction() {
    featured.style.display = "block";
    latest.style.display = "none";
    bestseller.style.display = "none";
}

function latestFunction() {
    featured.style.display = "none";
    latest.style.display = "block";
    bestseller.style.display = "none";
}

function bestsellerFunction() {
    featured.style.display = "none";
    latest.style.display = "none";
    bestseller.style.display = "block";
}