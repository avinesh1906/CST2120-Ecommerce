<?php
    //Include libraries
    require '../vendor/autoload.php';

    //Create instance of MongoDB client
    $mongoClient = (new MongoDB\Client);

    //Select a database
    $db = $mongoClient->ecommerce;

    //Select collections 
    $cartCollection = $db->Cart_Items;

    //Get strings - need to filter input to reduce chances of SQL injection etc.
    $prodID = filter_input(INPUT_POST, 'prodID', FILTER_SANITIZE_STRING);
    $session_ID = filter_input(INPUT_POST, 'session_ID', FILTER_SANITIZE_STRING);
    $qty = filter_input(INPUT_POST, 'qty', FILTER_SANITIZE_STRING);
    $size = filter_input(INPUT_POST, 'size', FILTER_SANITIZE_STRING);

    //Convert to PHP array
    $dataArray = [
        "session_ID" => $session_ID,
        "created_at" => date("l jS \of F Y h:i:s A"),
        "product_ID" => $prodID,
        "qty" => $qty,
        "size" => $size
    ];

    //Add the new user to the database
    $insertResult = $cartCollection->insertOne($dataArray);

    //Echo result back to user
    if($insertResult->getInsertedCount()!=1){
        echo 'false';
    } else {
        echo 'true';
    }
   
