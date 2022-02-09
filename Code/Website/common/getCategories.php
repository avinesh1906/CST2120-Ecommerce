<?php
    //Include libraries
    require '../vendor/autoload.php';

    //Create instance of MongoDB client
    $mongoClient = (new MongoDB\Client);

    //Select a database
    $db = $mongoClient->ecommerce;

    //Select collections 
    $productCollection = $db->Products;
    $categoryCollection = $db->Category;

    //Get category name strings - need to filter input to reduce chances of SQL injection etc.
    $categoryName= filter_input(INPUT_POST, 'categoryName', FILTER_SANITIZE_STRING);

    //Create a PHP array for portrait criteria
    $findCategoryCriteria = [
        "name" => $categoryName
    ];

    //Find the category that match this criteria
    $categoryCursor = $categoryCollection->find($findCategoryCriteria);

    foreach ($categoryCursor as $cate){
        $portraitID =  $cate['_id'];    
    }

    //Create a PHP array to search only portrait category from Products
    $findProductCriteria = [
        "category_ID" => new MongoDB\BSON\ObjectId($portraitID)
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
