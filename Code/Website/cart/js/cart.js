// Entire script will be in script mode
"use strict";

// function call
extractDetails();

// function to extract details from db
function extractDetails()
{
    // variables
    let session_ID = document.getElementById("sessionID").innerText;
    let noItem = document.getElementById("noItem");

    //Create request object
    let request = new XMLHttpRequest();
    
    //Set up request and send it
    request.open("POST", "getCart.php");
             
    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if (request.status === 200) {
            let serverResponse = request.responseText;
            // check if server response is not false
            if (serverResponse != 'false'){
                // hide noitem div
                noItem.style.display = "none";
                // show cart footer div
                document.getElementsByClassName("cartFooter")[0].style.display = "block";
                // call displayProduct along with server response
                displayProduct(request.responseText);
            } else {
                // show no item div
                noItem.style.display = "block";
                // hise the cart body and cart footer
                document.getElementsByClassName("cartBody")[0].style.display = "none";
                document.getElementsByClassName("cartFooter")[0].style.display = "none";
            }
            
        } else
            alert("Error communicating with server: " + request.status);
    };
             
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send("func=" + "getDetails" + "&session_ID=" + session_ID);
}

// function to load content of the cart into page
function displayProduct(itemDetails){
    //Convert JSON to array of product objects
    let cartArray = JSON.parse(itemDetails);

    // create the html to display
    let htmlStr = '';

    // loop thorough cart array
    for (let i = 0; i < cartArray.length; ++i) {
        // create the content for cart items
        htmlStr+=' <div class="item"> ';
        htmlStr+='        <!-- item details -->';
        htmlStr+='        <div class="details">';
        htmlStr+='            <!-- image -->';
        htmlStr+='            <div class="img">';
        htmlStr+='                <img src="'+ cartArray[i].imageURL+'" alt="'+ cartArray[i].name +'" width="200px" height="200px">';
        htmlStr+='            </div>';
        htmlStr+='            <!-- description -->';
        htmlStr+='            <div class="description">';
        htmlStr+='                <!-- description title -->';
        htmlStr+='                <div class="title">';
        htmlStr+='                    '+ cartArray[i].name +'';
        htmlStr+='                </div>';
        htmlStr+='                <!-- other descriptions -->';
        htmlStr+='                <div class="category">'+ cartArray[i].category +'</div>';
        htmlStr+='                <div id="price"> Rs '+ cartArray[i].price +' </div>';
        htmlStr+='                <div class="size">';
        // check the size 
        if (cartArray[i].size == "A2"){
            htmlStr+='                    420 x 594 mm ';
        } else if (cartArray[i].size == "A3"){
            htmlStr+='                    297 x 420 mm ';
        } else {
            htmlStr+='                    210 x 297 mm ';
        }
        
        htmlStr+='                </div>       ';         
        htmlStr+='            </div>';
        htmlStr+='        </div>';
        htmlStr+='<!-- qty section -->';
        htmlStr+='<div class="qty">';
        htmlStr+='    <!-- qty number -->';
        htmlStr+='    <div class="number" id="number"> '+ cartArray[i].qty +' </div>';
        htmlStr+='    <!-- delete btn to remove item -->';
        htmlStr+='    <div class="deleteBtn" onclick="deleteItem('+ i +')">';
        htmlStr+='        <i class="fa fa-trash-o" style="font-size:34px; color:red"></i>';
        htmlStr+='    </div>';
        htmlStr+='</div>';
        htmlStr+='        <!-- price -->';
        htmlStr+='        <div class="price">';
        htmlStr+='            Rs '+ (cartArray[i].qty* cartArray[i].price) +'';
        htmlStr+='        </div>';
        htmlStr+='    </div>';
    }

    //  display the html into the class card
    document.getElementsByClassName("cartItems")[0].innerHTML = htmlStr;
    let subTotal = 0; 
    // calculate the sub total
    for (let i = 0; i < cartArray.length; ++i) {
        subTotal += (cartArray[i].qty* cartArray[i].price);
    }
    // create the subtotal string
    let subTotalStr = '';
    subTotalStr+='<a id="title">Subtotal: </a>';
    subTotalStr+='Rs '+ subTotal +'';

    //  display the html into the class card
    document.getElementsByClassName("subtotal")[0].innerHTML = subTotalStr;

}

// delete a cart item
function deleteItem($input)
{
    // variables
    let session_ID = document.getElementById("sessionID").innerText;
    let alert = document.getElementById("alert");

    //Create request object
    let request = new XMLHttpRequest();
    
    //Set up request and send it
    request.open("POST", "getCart.php");
             
    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if (request.status === 200) {
            // show alert
            alert.style.display = "block";
            // hide alert after 2000 ms
            setTimeout(hideElement, 2000) //milliseconds until timeout//
            // function call
            extractDetails();
        } else
            alert("Error communicating with server: " + request.status);
    };
             
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    request.send("func=" + "deleteItem" + "&session_ID=" + session_ID + "&arrayIndex=" + $input);

    // function to hide the alert
    function hideElement() {
        alert.style.display = 'none'
    }
}
