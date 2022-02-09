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
    $session_ID = filter_input(INPUT_POST, 'sessionID', FILTER_SANITIZE_STRING);
    $qty = filter_input(INPUT_POST, 'qty', FILTER_SANITIZE_STRING);
    $size = filter_input(INPUT_POST, 'DOB', FILTER_SANITIZE_STRING);
    
    //Create a PHP array for portrait criteria
    $findCriteria = [
        "session_ID" => new MongoDB\BSON\ObjectId($session_ID)
    ];
    
    //Find the category that match this criteria
    $cartCursor = $cartCollection->find($findCriteria);

    //Work through the cart
    if ($cartCursor->isDead()) {

        //Convert to PHP array
        $dataArray = [
            "session_ID" => new MongoDB\BSON\ObjectId($session_ID),
            "created_at" => new Date("<YYYY-mm-ddTHH:MM:ss>"),
            "updated_at" => new Date("<YYYY-mm-ddTHH:MM:ss>"),
            "product_Array" => [
                "product_ID" => $prodID,
                "qty" => $qty,
                "size" => $size
            ]
        ];

        //Add the new user to the database
        $insertResult = $collection->insertOne($dataArray);

        // STORE REGISTRATION DATA IN MONGODB
        //Echo result back to user
        if($insertResult->getInsertedCount()!=1){
            echo 'false';
        } else {
            echo 'true';
        }

    } else {
        //Convert to PHP array
        $dataArray = [
            ['$set' => [ "updated_at" => new Date("<YYYY-mm-ddTHH:MM:ss>") ]],
            ['$push' => [ "product_Array" => [
                        "product_ID" => $prodID,
                        "qty" => $qty,
                        "size" => $size
                        ]    
                    ]
            ]
        ];

        //Add the new user to the database
        $insertResult = $collection->updateOne($findCriteria,$updateCriteria);

        // STORE REGISTRATION DATA IN MONGODB
        //Echo result back to user
        if($insertResult->getInsertedCount()!=1){
            echo 'false';
        } else {
            echo 'true';
        }
    }
