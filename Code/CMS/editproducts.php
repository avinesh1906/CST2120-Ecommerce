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
        
       <!-- Editing ProductID field-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="product_id"> CHANGE PRODUCT ID</label>  
          <div class="col-md-4">
          <input id="product_id" name="product_id" placeholder="PRODUCT ID" class="form-control input-md" required="" type="text">
            
          </div>
        </div>
        
        <!-- Changing product name-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="painting_name"> CHANGE PRODUCT NAME</label>  
          <div class="col-md-4">
          <input id="painting_name" name="painting_name" placeholder="PRODUCT NAME" class="form-control input-md" required="" type="text">
            
          </div>
        </div>
        
        
         <!-- Changing product description -->
         <div class="form-group">
            <label class="col-md-4 control-label" for="painting_des"> CHANGE PRODUCT DESCRIPTION</label>
            <div class="col-md-4">                     
              <textarea class="form-control" id="painting_des" name="painting_des"></textarea>
            </div>
          </div>

        <!-- Changing product category -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="painting_category"> CHANGE PRODUCT CATEGORY</label>
          <div class="col-md-4">
            <select id="painting_category" name="painting_category" class="form-control">
            </select>
          </div>
        </div>
        
        <!-- Changing quantity remaining-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="inventory">QUANTITY REMAINING</label>  
          <div class="col-md-4">
          <input id="inventory" name="inventory" placeholder="AVAILABLE QUANTITY" class="form-control input-md" required="" type="text">
            
          </div>
        </div>
         
        <!-- Adding date product was edited-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="date">DATE</label>  
          <div class="col-md-4">
          <input id="date" name="date" placeholder="DATE EDITED" class="form-control input-md" required="" type="text">
            
          </div>
        </div>
        
        <!-- User editing product details -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="edited_by">EDITED BY</label>  
          <div class="col-md-4">
          <input id="edited_by" name="edited_by" placeholder="EDITED BY" class="form-control input-md" required="" type="text">
            
         <!-- File Button --> 
        <div class="form-group">
          <label class="col-md-4 control-label" for="imagefile">CHANGE IMAGE</label>
          <div class="col-md-4">
            <input id="imagefile" name="imagefile" class="input-file" type="file">
          </div>
        </div>
      
        
        <!-- Edit button -->
        <div class="form-group">
          <div class="col-md-4">
            <button id="deletebutton" name="deletebutton" class="btn btn-primary">EDIT</button>
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