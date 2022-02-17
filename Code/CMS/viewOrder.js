// Entire script will be in script mode
"use strict";

viewOrder();

// function to viewOrder
function viewOrder()
{
        //Create request object 
        let request = new XMLHttpRequest();

        //Create event handler that specifies what should happen when server responds
        request.onload = () => {
            //Check HTTP status code
            if(request.status === 200){
                // display content
                displayContent(request.responseText);
            }
            else
                alert("Error communicating with server: " + request.status);
        };
        
        //Set up request with HTTP method and URL 
        request.open("POST", "getViewOrder.php");
        request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    
        //Send request
        request.send("func=" + "getDetails");
}

// function to display the content in viewOrder
function displayContent(orderJSON)
{
    // Convert JSON to array of order objects
    let orderArray = JSON.parse(orderJSON);

    // create the html to display
    let htmlStr = '';
    for (let i = 0; i < orderArray.length; ++i) {
        htmlStr += '<div class="orderItem" style="display: flex; border: 2px solid black; margin: 5px">';
        htmlStr += '<div class="order-img">';
        htmlStr += '    <img src="'+ orderArray[i].imageURL.substring(1) +'"alt="'+ orderArray[i].name +'"width="250">';
        htmlStr += '</div>';
        htmlStr += '<div class="order-content" style="padding-left: 2%">';
        htmlStr += '    <h2>';
        htmlStr += '        '+ orderArray[i].name +'';
        htmlStr += '    </h2>';
        htmlStr += '    <p class="order-text price">Rs '+ orderArray[i].price +'</p>';
        htmlStr += '    <p class="description"> Size: '+ orderArray[i].size +' </p>';
        htmlStr += '    <p class="description"> Qty: '+ orderArray[i].qty +' </p>';
        htmlStr += '    <p class="order-text genre">'+ orderArray[i].category +'</p>';
        htmlStr += '</div>';
        htmlStr += '</div>';
    }
    
    //  display the html into the class orderList
    document.getElementsByClassName("orderList")[0].innerHTML = htmlStr;
}