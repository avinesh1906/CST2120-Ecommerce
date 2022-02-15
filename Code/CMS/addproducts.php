<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Products </title>
    <?php include ("PHP/common.php");
    navbar();
    ?>

    <?php
    require __DIR__ . '/vendor/autoload.php';

    $mongoClient = (new MongoDB\Client );
    $db =$mongoClient -> ecommerce;
    $collection = $db -> Products;

    $id = filter_input (INPUT_POST,'product_id',FILTER_SANITIZE_STRING);
    $name = filter_input (INPUT_POST,'painting_name',FILTER_SANITIZE_STRING);
    $category_ID = filter_input (INPUT_POST,'painting_category',FILTER_SANITIZE_STRING);
    $description = filter_input (INPUT_POST,'painting_des',FILTER_SANITIZE_STRING);
    $keydetails = filter_input (INPUT_POST,'key_d',FILTER_SANITIZE_STRING);
    $price = filter_input (INPUT_POST,'price',FILTER_SANITIZE_STRING);
    $imageurl = filter_input (INPUT_POST,'image_url',FILTER_SANITIZE_STRING);
    $date = filter_input (INPUT_POST,'date_created',FILTER_SANITIZE_STRING);

    $dataArray =[
        "_id" => $id,
        "name" => $name,
        "category_ID" => $category_ID,
        "description" => $description,
        "key_details" => $keydetails,
        "price" => $price,
        "imageURL" => $imageurl,
        "created_at" => $date,

    ];

    $insertResult= $collection->insertOne($dataArray);
  
    if ($insertResult->getInsertedCount()==1){
        echo 'Product added';
    }
    else{
        echo 'Error adding product';
    }

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
        <legend> ADD PRODUCTS</legend>

        
        <!-- Adding ProductID field-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="product_id">PRODUCT ID</label>  
          <div class="col-md-4">
          <input id="product_id" name="product_id" placeholder="PRODUCT ID" class="form-control input-md" required="" type="text">
          </div>
        </div>
        
       <!-- Adding product name -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="painting_name">PRODUCT NAME</label>  
          <div class="col-md-4">
          <input id="painting_name" name="painting_name" placeholder="PRODUCT NAME" class="form-control input-md" required="" type="text">
          </div>
        </div>
        
        <!-- Adding product category -->
        <div class="form-group">
          <label class="col-md-4 control-label" for="painting_category">PRODUCT CATEGORY</label>
          <div class="col-md-4">
            <select id="painting_category" name="painting_category" class="form-control">
            </select>
          </div>
        </div>

         <!-- Adding product description -->
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
         
        <!-- Key details-->
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
            
        
        <!-- Date product was added to system-->
        <div class="form-group">
          <label class="col-md-4 control-label" for="date_created">DATE</label>  
          <div class="col-md-4">
          <input id="date_created" name="date_created" placeholder="DATE CREATED" class="form-control input-md" required="" type="text">
          </div>
        </div>

           <!-- Staff adding product -->
           <div class="form-group">
          <label class="col-md-4 control-label" for="added_by">ADDED BY</label>  
          <div class="col-md-4">
          <input id="added_by" name="added_by" placeholder="ADDED BY" class="form-control input-md" required="" type="text">
          </div>
        </div> 
         
        
        <!-- add button -->
        <div class="form-group">
          <div class="col-md-4">
            <button  id = "addbutton " type="addbutton" class="btn btn-primary" onclick = "checkForm()">ADD</button>
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
