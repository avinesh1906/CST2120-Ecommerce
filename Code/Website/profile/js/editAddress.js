// Entire script will be in script mode
"use strict";

let saveBtn = document.getElementById("saveBtn");
saveBtn.onclick = update;

// function call 
generateContent();

// function to generate the content of the portrait body
function generateContent(){

    //Create request object
    let request = new XMLHttpRequest();
    
    let email = sessionStorage.email;

    //Set up request and send it
    request.open("POST", "getProfile.php");

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
    request.send("email="+email);

}

// function to load content of the category into page
function displayContent(jsonUser){
    //Convert JSON to array of product objects
    let user = JSON.parse(jsonUser);

    // create the html to display personal information
    let htmlStr = '';
    
    htmlStr += '<!-- Street Name -->';
    htmlStr += '<div class="form_input">';
    htmlStr += '<label for="street" class="form-label"> Street Name </label>';
    htmlStr += '<input name="email" id="street" value="'+ user[0].address  + '">';
    htmlStr +='</div>';

    htmlStr += '<!-- Town -->';
    htmlStr +=  '<div class="form_input">';
    htmlStr += '<label for="town" class="form-label"> City/Tomn/Village </label>';
    htmlStr += '<input autocomplete="off" value = "'+ user[0].city+'" type="text" id="town">';
    htmlStr += '</div>';

    htmlStr += '<!-- Country -->';
    htmlStr +=  '<div class="form_input">';
    htmlStr += '<label for="country" class="form-label"> Country </label>';
    htmlStr += '<input autocomplete="off" value = "'+ user[0].country +'" type="text" id="country">';
    htmlStr += '</div>';

    htmlStr +='<!-- zip code -->';
    htmlStr +=' <div class="form_input">';
    htmlStr +='<label for="zipCode" class="form-label"> Zip code </label>';
    htmlStr +='<input autocomplete="off" value = "'+ user[0].postalCode +'" type="tel" id="zipCode">';
    htmlStr +='</div>';

    htmlStr += '<input type="hidden" id="id" value="'+ user[0]._id.$oid  + '">';
    
    //  display the html into the class body
    document.getElementsByClassName("form")[0].innerHTML = htmlStr;
}

function update()
{
    //Create request object
    let request = new XMLHttpRequest();

    // id variables
    let address = document.getElementById("street");
    let city = document.getElementById("town");
    let postalCode = document.getElementById("zipCode");
    let country = document.getElementById("country");

    //Create event handler that specifies what should happen when server responds
    request.onload = () => {
        //Check HTTP status code
        if(request.status === 200){
            //Get data from server
            let responseData = request.responseText;
            //Add data to page
            document.getElementById("ServerResponse").innerHTML = responseData;
        }
        else
            alert("Error communicating with server: " + request.status);
    };

    //Set up request with HTTP method and URL 
    request.open("POST", "getEditPersonal.php");
    request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //Send request
    request.send("address=" + address.value   + "&city=" + city.value + 
    "&postalCode=" + postalCode.value + "&country=" + country.value);
    
}