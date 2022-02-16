<?php

//Include libraries
require '../vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

//Select collections 
$productCollection = $db->Products;
$reviewCollection = $db->Review;

// call function depending on func input
if(isset($_POST['func'])){
    $func = $_POST['func'];
    if ($func == "addReview") {
        addReview();
    } else if ($func == "getId"){
        getId();
    } else {
        viewReview();
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

// function for add review 
function addReview(){

    global $reviewCollection;

    //Extract the data that was sent to the server
    $name= filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $title = filter_input(INPUT_POST, 'title', FILTER_SANITIZE_STRING);
    $description= filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
    $prodID = filter_input(INPUT_POST, 'prodID', FILTER_SANITIZE_STRING);

    //Convert to PHP array
    $dataArray = [
        "product_ID" => new MongoDB\BSON\ObjectID($prodID),
        "name" => $name, 
        "email" => $email, 
        "title" => $title,
        "description" => $description,
        "date" => date("l jS \of F Y")
    ];

    //Add the new review to the database
    $insertResult = $reviewCollection->insertOne($dataArray);

    //Echo result back to user
    if($insertResult->getInsertedCount()==1){
        echo 'true';
    }
    else {
        echo 'false';
    }
}

// view review function
function viewReview()
{
    global $reviewCollection;

    //Get category name strings - need to filter input to reduce chances of SQL injection etc.
    $prodId = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
    
    //Create a PHP array for portrait criteria
    $findProductCriteria = [
        "product_ID" => new MongoDB\BSON\ObjectId($prodId)
    ];
    
    //Find all of the review that match this criteria
    $reviewCursor = $reviewCollection->find($findProductCriteria);

    //Work through the products
    if ($reviewCursor->isDead()) {
        echo 'false';
    } else {
        //Output each product as a JSON object with comma in between
        $jsonStr = '['; //Start of array of products in JSON

        foreach ($reviewCursor as $rev){  
            //Convert PHP representation of product into JSON
            $jsonStr .= json_encode($rev);
            //Separator between products
            $jsonStr .= ',';
        }
        //Remove last comma
        $jsonStr = substr($jsonStr, 0, strlen($jsonStr) - 1);

        //Close array
        $jsonStr .= ']';

        //Echo final string
        echo $jsonStr;
    }

}