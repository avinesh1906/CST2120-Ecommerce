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

    //Get searchTxt strings - need to filter input to reduce chances of SQL injection etc.
    $searchTxt= filter_input(INPUT_POST, 'searchTxt', FILTER_SANITIZE_STRING);

    $productCollection->createIndex(['key_details' => "text"]);

    //Create a PHP array for session criteria
    $findCartCriteria = array('$text' => array('$search' => $searchTxt));
    
    // check if searchTxt is null or not
    if ($searchTxt == "null"){
        //Find all of the product that match this criteria
        $productCursor = $productCollection->find();
    } else {
        //Find all of the product that match this criteria
        $productCursor = $productCollection->find($findCartCriteria);
    }

    //Work through the products
    if ($productCursor->isDead()) {
        echo 'false';
    } else {
        $jsonStr = '['; //Start of array of products in JSON
        foreach ($productCursor as $product){  
            $arr = array("name" => $product['name'], 'imageURL' => $product['imageURL'], 'price' => $product['price'],
            'id' => $product['_id'], 'description' => $product['description'], 'category' => extractCategory($product['category_ID']));
            $jsonStr .= json_encode($arr);
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

    // function to extract category
    function extractCategory($input)
    {
        global $categoryCollection;

        //Create a PHP array for session criteria
        $findCartCriteria = [
            "_id" => new MongoDB\BSON\ObjectId($input)
        ];

        //Find all of the category that match this criteria
        $categoryCursor = $categoryCollection->find($findCartCriteria);

        //Work through the categories
        if ($categoryCursor->isDead()) {
            echo 'false';
        } else {
            // return category name
            foreach ($categoryCursor as $category){
                return $category['name'];
            }
        }

    }