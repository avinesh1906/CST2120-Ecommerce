// Entire script will be in script mode
"use strict";
// function call 
generateContent();

// function to generate the content of the portrait body
function generateContent(){

    //Create request object
    let request = new XMLHttpRequest();

    //Set up request and send it
    request.open("POST", "getViewProducts.php");

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if (request.status === 200) {
            console.log(request.responseText);
            //Add data from server to page
            displayContent(request.responseText);
        } else
            alert("Error communicating with server: " + request.status);
    };

    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send();
}

// function to display content
function displayContent(jsonProduct)
{   
        // Convert JSON to array of product objects
        let productArray = JSON.parse(jsonProduct);

        // create the html to display
        let htmlStr = '';
        for (let i = 0; i < productArray.length; ++i) {
            htmlStr += '<div class="productItem" style="display: flex; border: 2px solid black; margin: 5px">';
            htmlStr += '<div class="product-img">';
            htmlStr += '    <img src="'+ productArray[i].imageURL.substring(1) +'"alt="'+ productArray[i].name +'"width="250">';
            htmlStr += '</div>';
            htmlStr += '<div class="product-content" style="padding-left: 2%">';
            htmlStr += '    <h2>';
            htmlStr += '        '+ productArray[i].name +'';
            htmlStr += '    </h2>';
            htmlStr += '    <p class="product-text price">Rs '+ productArray[i].price +'</p>';
            htmlStr += '    <p class="description"> '+ productArray[i].description +' </p>';
            htmlStr += '    <p class="product-text genre">'+ productArray[i].category +'</p>';
            htmlStr += '</div>';
            htmlStr += '</div>';
        }

        // //  display the html into the class card
        document.getElementsByClassName("productList")[0].innerHTML = htmlStr;

}

