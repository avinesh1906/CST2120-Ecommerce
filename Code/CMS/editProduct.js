// Entire script will be in script mode
"use strict";
// function call 
displayEdit();

// function to display the form with predefined value 
function displayEdit(){
    //Convert JSON to array of product objects
    let productArray = JSON.parse(sessionStorage.Product);

    // define htmStr 
    let htmlStr = '';

    // loop through product array
    for (let i = 0; i < productArray.length; ++i) {
        htmlStr += '<fieldset>';
        
        htmlStr += '<!--Page Label-->';
        htmlStr += '<legend> ADD PRODUCTS</legend>';
        
        htmlStr += '<!-- Adding product name -->';
        htmlStr += '<div class="form-group">';
        htmlStr += '  <label class="col-md-4 control-label" for="painting_name">Name </label>  ';
        htmlStr += '  <div class="col-md-4">';
        htmlStr += '  <input id="painting_name" name="painting_name" value="'+ productArray[i].name +'" placeholder="PRODUCT NAME" class="form-control input-md" required="" type="text">';
        htmlStr += '  </div>';
        htmlStr += '</div>';
        
        htmlStr += '<!-- Adding product category -->';
        htmlStr += '<div class="form-group">';
        htmlStr += '    <label class="col-md-4 control-label" for="painting_category">PRODUCT CATEGORY</label>';
        htmlStr += '    <div class="col-md-4">                     ';
        htmlStr += '    <select name="cars" id="painting_category">';
        htmlStr += '      <option value="Portrait">Portrait</option>';
        htmlStr += '      <option value="Landscape">Landscape</option>';
        htmlStr += '      <option value="Oil">Oil</option>';
        htmlStr += '      <option value="Abstract">Abstract</option>';
        htmlStr += '      <option value="Historical">Historical</option>';
        htmlStr += '    </select>';
        htmlStr += '    </div>';
        htmlStr += '  </div>';
        
        htmlStr += ' <!-- Adding product description -->';
        htmlStr += ' <div class="form-group">';
        htmlStr += '    <label class="col-md-4 control-label" for="painting_des">PRODUCT DESCRIPTION</label>';
        htmlStr += '    <div class="col-md-4">                     ';
        htmlStr += '      <textarea class="form-control" id="painting_des" name="painting_des">'+ productArray[i].description +'</textarea>';
        htmlStr += '    </div>';
        htmlStr += '  </div>';
        
        htmlStr += ' <!-- Key details-->';
        htmlStr += '<div class="form-group">';
        htmlStr += '  <label class="col-md-4 control-label" for="key_d">KEY DETAILS</label>  ';
        htmlStr += '  <div class="col-md-4">';
        htmlStr += '  <input id="key_d" name="key_d" value="'+ productArray[i].key_details +'"  placeholder="KEY DETAILS" class="form-control input-md" required="" type="text">';
        htmlStr += '  </div>';
        htmlStr += '</div>';
        
        htmlStr += '<!-- Price-->';
        htmlStr += '<div class="form-group">';
        htmlStr += '  <label class="col-md-4 control-label" for="price">PRICE (Rs)</label>  ';
        htmlStr += '  <div class="col-md-4">';
        htmlStr += '  <input id="price" name="price" value="'+ productArray[i].price +'"  placeholder="PRICE" class="form-control input-md" required="" type="number">';
        htmlStr += '  </div>';
        htmlStr += '</div>';
                
        htmlStr += '<!-- Inventory -->';
        htmlStr += '<div class="form-group">';
        htmlStr += '  <label class="col-md-4 control-label" for="A2">Inventory (A2)</label>  ';
        htmlStr += '  <div class="col-md-4">';
        htmlStr += '  <input id="A2" name="image_url" value="'+ productArray[i].inventory.A2 +'"  placeholder="Inventory (A2)" class="form-control input-md" required="" type="number">';
        htmlStr += '  </div>';
        htmlStr += '</div>';
        htmlStr += '<div class="form-group">';
        htmlStr += '<label class="col-md-4 control-label" for="A3">Inventory (A3)</label>  ';
        htmlStr += '  <div class="col-md-4">';
        htmlStr += '  <input id="A3" name="image_url" value="'+ productArray[i].inventory.A3 +'" placeholder="Inventory (A3)" class="form-control input-md" required="" type="number">';
        htmlStr += '  </div>';
        htmlStr += '</div>';
        htmlStr += '<div class="form-group">';
        htmlStr += '<label class="col-md-4 control-label" for="A4">Inventory (A4)</label>  ';
        htmlStr += '  <div class="col-md-4">';
        htmlStr += '  <input id="A4" name="image_url" value="'+ productArray[i].inventory.A4 +'" placeholder="Inventory (A4)" class="form-control input-md" required="" type="number">';
        htmlStr += '  </div>';
        htmlStr += '</div>';
        htmlStr += '<!-- add button -->';
        htmlStr += '<div class="form-group">';
        htmlStr += '  <div class="col-md-4">';
        htmlStr += '    <button  id = "addbutton " type="addbutton" class="btn btn-primary" onclick = "changeProduct()">Change</button>';
        htmlStr += '  </div>';
        htmlStr += '  </div>';
        htmlStr += '</fieldset>';
    }
    //  display the html into the class form-horizontal
    document.getElementsByClassName("form-horizontal")[0].innerHTML = htmlStr;
}

function changeProduct()
{
    window.location.href = "./index.php";
}