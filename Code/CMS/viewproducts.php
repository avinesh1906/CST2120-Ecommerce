<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Products </title>
    <!-- linking the navbar to page -->
    <?php include ("PHP/common.php");
    navbar();
    ?>

    <?php
    require __DIR__ . '/vendor/autoload.php';

    $mongoClient = (new MongoDB\Client );
    $db =$mongoClient -> ecommerce;
    $collection = $db -> Products;

    $records = $mongo->$collection;
    $records = iterator_to_array($records);
    
    array_walk(
        $records,
        function (&$record)
        {
          if (isset($record['subDoc'])) {
            $record['subDoc'] = iterator_to_array($record['subDoc']);
          }
        }
    );
    
    $name = filter_input (INPUT_POST,'name',FILTER_SANITIZE_STRING);
    $password = filter_input (INPUT_POST,'password',FILTER_SANITIZE_STRING);

    $dataArray =[
        "name"=> $name,
        "password"=> $password,

    ];

    $insertResult= $collection->insertOne($dataArray);
  
    if ($insertResult->getInsertedCount()==1){
        echo'Staff added';
    }
    else{
        echo 'Error adding staff';
    }
    ?>

    <style>
        h3 {text-align: center;}
        .product {text-align: center;}
        div {text-align: center;}
        
    </style>
    <link rel="stylesheet"type="text/css" href="./CSS/addproducts.css">
    <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
</head>
<body>

     <body>

          <!-- adding product to product list with corresponding image-->
        <div class="products products-table">
            <div class="product">
                <div class="product-img">
                    <img src="./IMAGES/desi.jpg"alt="Ti Moris"width="800" height="700">
                </div>
                <div class="product-content">
                    <h3>
                        Desi
                    </h3>
                    <p class="product-text price">Rs 850</p>
                    <p class="product-text genre">Portrait</p>
                </div>
            </div>
            <!-- adding product to product list -->
            <div class="product">
                <div class="product-img">
                    <img src="./IMAGES/cap_malhereux.jpg"alt="Ti Moris"width="800" height="600">
                </div>
                <div class="product-content">
                    <h3>
                        Le Morne
                    </h3>
                    <p class="product-text price">Rs 350</p>
                    <p class="product-text genre">Landscape</p>
                </div>
            </div>
            <!-- adding product to product list -->
            <div class="product">
                <div class="product-img">
                    <img src="./IMAGES/lacote.png"alt="Ti Moris"width="800" height="600">
                </div>
                <div class="product-content">
                    <h3>
                        Mauritius Landscape
                    </h3>
                    <p class="product-text price">Rs 1750</p>
                    <p class="product-text genre">Landscape</p>
                </div>
            </div>
            </div>
            <!-- adding product to product list -->
            <div class="product">
                <div class="product-img">
                    <img src="./IMAGES/slaves.jpg"alt="Ti Moris"width="800" height="600">
                </div>
                <div class="product-content">
                    <h3>
                        Slaves in Mauritius
                    </h3>
                    <p class="product-text price">Rs 1750</p>
                    <p class="product-text genre">Landscape</p>
                </div>
            </div>
            <!-- adding product to product list -->
            <div class="product">
                <div class="product-img">
                    <img src="./IMAGES/sega.jpg"alt="Ti Moris"width="800" height="600">
                </div>
                <div class="product-content">
                    <h3>
                       Le Sega
                    </h3>
                    <p class="product-text price">Rs 1250</p>
                    <p class="product-text genre">Portrait</p>
                </div>
            </div>
        </div>
        <script>
            $("#view").click(function () {
                $(".products").toggleClass("products-table");
            });
        </script>
    </body>


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
           <!-- adding details to footer -->
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