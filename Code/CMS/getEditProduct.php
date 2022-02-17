<?php


//Include libraries
require __DIR__ . '/vendor/autoload.php';


//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

//Select collections 
$productCollection = $db->Products;

// call function depending on func input
if(isset($_POST['func'])){
    $func = $_POST['func'];
    if ($func == "getId"){
        getId();
    }
}

// get product id function
function getId(){
    global $productCollection;

    //Get category name strings - need to filter input to reduce chances of SQL injection etc.
    $id= filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

    //Create a PHP array for portrait criteria
    $findProductCriteria = [
        "_id" => new MongoDB\BSON\ObjectId($id)
    ];

    //Find all of the category that match this criteria
    $productCursor = $productCollection->find($findProductCriteria);

    // //Output each product as a JSON object with comma in between
    $jsonStr = '['; //Start of array of products in JSON

    //Work through the products
    if ($productCursor->isDead()) {
        echo 'false';
    } else {
        foreach ($productCursor as $prod){  
            //Convert PHP representation of product into JSON
            $jsonStr .= json_encode($prod);
            //Separator between products
            $jsonStr .= ',';
        }
    }

    //Remove last comma
    $jsonStr = substr($jsonStr, 0, strlen($jsonStr) - 1);

    //Close array
    $jsonStr .= ']';

    //Echo final string
    echo $jsonStr;
}
