<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Products </title>
    <?php include ("PHP/common.php");
    navbar();
    ?>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet"type="text/css" href="./CSS/addproducts.css">
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
</head>
<body>

     <form class="form-horizontal">
        <fieldset>
        
        <!--Page Label-->
        <legend> EDIT PRODUCTS</legend>
        
        <!-- Changing ProductID field-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="product_id">PRODUCT ID</label>  
          <div class="col-md-4">
          <input id="product_id" name="product_id" placeholder="PRODUCT ID" class="form-control input-md" required="" type="text">
          </div>
        </div>
        
       <!-- Changing product name -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="painting_name">PRODUCT NAME</label>  
          <div class="col-md-4">
          <input id="painting_name" name="painting_name" placeholder="PRODUCT NAME" class="form-control input-md" required="" type="text">
          </div>
        </div>
        
        
        <!-- Changing product category -->
        <div class="form-group">
            <label class="col-md-4 control-label" for="painting_category">PRODUCT CATEGORY</label>
            <div class="col-md-4">                     
            <input id="painting_category" name="painting_category" placeholder="PAINTING CATEGORY" class="form-control input-md" required="" type="text">
            </div>
          </div>

         <!-- Changing product description -->
         <div class="form-group">
            <label class="col-md-4 control-label" for="painting_des">PRODUCT DESCRIPTION</label>
            <div class="col-md-4">                     
              <textarea class="form-control" id="painting_des" name="painting_des"></textarea>
            </div>
          </div>

        
         <!-- Key details-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="key_d">KEY DETAILS</label>  
          <div class="col-md-4">
          <input id="key_d" name="key_d" placeholder="KEY DETAILS" class="form-control input-md" required="" type="text">
          </div>
        </div>
         
        <!-- Price-->
       <div class="form-group">
          <label class="col-md-4 control-label" for="price">PRICE</label>  
          <div class="col-md-4">
          <input id="price" name="price" placeholder="PRICE" class="form-control input-md" required="" type="text">
          </div>
        </div>
        
         <!-- Key details-->
       <div class="form-group">
          <label class="col-md-4 control-label" for="image_url">IMAGE URL</label>  
          <div class="col-md-4">
          <input id="image_url" name="image_url" placeholder="IMAGE URL" class="form-control input-md" required="" type="text">
          </div>
        </div>
            
        
        <!-- Date product was edited in system-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="modified_at">DATE</label>  
          <div class="col-md-4">
          <input id="modified_at" name="modified_at" placeholder="DATE EDITED" class="form-control input-md" required="" type="text">
          </div>
        </div>

           <!-- Staff editing product -->
           <div class="form-group">
          <label class="col-md-4 control-label" for="edited_by">EDITED BY</label>  
          <div class="col-md-4">
          <input id="edited_by" name="edited_by" placeholder="EDITED BY" class="form-control input-md" required="" type="text">
          </div>
        </div> 
         
        
        <!-- edit button -->
        <div class="form-group">
          <div class="col-md-4">
            <button  id = "editbutton " type="editbutton" class="btn btn-primary" onclick = "checkForm()">EDIT</button>
          </div>
          </div>
        </fieldset>
      </form>
        
     <footer class="footer1">
          <!-- linking footer to the other pages -->
     <div class="footer-left">
        <h3>Ti<span>Moris</span></h3>
        <p class="footer-links">
        <a href="index.php">Home</a>
        .
        <a href="login.php">Login</a>
        ·
        <a href="#">About</a>
        ·
        <a href="#">Privacy Policy</a>
        ·
        <a href="#">Faq</a>
        ·
        <a href="#">Contact</a>
        </p>
        
        <p class="footer-company-name">Ti Moris &copy; 2022</p>
        </div>
        
        <div class="footer-center">
        <div>
        <i class="fa fa-map-marker"></i>
        <p><span>Avenue des Palmiers </span> Curepipe,Mauritius</p>
        </div>
        
        <div>
        <i class="fa fa-phone"></i>
        <p>+230 59484598</p>
        </div>
        
        <div>
        <i class="fa fa-envelope"></i>
        <p><a href="SJ983@live.mdx.ac.uk">SJ983@live.mdx.ac.uk</a></p>
        </div>
        
        </div>
        
        <div class="footer-right">
        
        <p class="footer-company-about">
        <span>About the company</span>
        Ecommerce website selling local paintings
        </p>
        <div class="footer-icons">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-linkedin"></i></a>
        <a href="#"><i class="fa fa-github"></i></a>
        
        </div>  
        </footer>
      </body>
</html>