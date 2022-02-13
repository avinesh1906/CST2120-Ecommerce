<?php
    //Include libraries
    require '../vendor/autoload.php';

    //Create instance of MongoDB client
    $mongoClient = (new MongoDB\Client);

    //Select a database
    $db = $mongoClient->ecommerce;

    //Select collections 
    $cartCollection = $db->Cart_Items;
    $productCollection = $db->Products;
    $stdCollection = $db->students;

    if(isset($_POST['func'])){
        $func = $_POST['func'];
        if ($func == "addCart") {
            addCart();
        } else {
            updateQty();
           
        }
    }

    function addCart(){
        global $cartCollection;
        //Get strings - need to filter input to reduce chances of SQL injection etc.
        $prodID = filter_input(INPUT_POST, 'prodID', FILTER_SANITIZE_STRING);
        $session_ID = filter_input(INPUT_POST, 'session_ID', FILTER_SANITIZE_STRING);
        $qty = filter_input(INPUT_POST, 'qty', FILTER_SANITIZE_STRING);
        $size = filter_input(INPUT_POST, 'size', FILTER_SANITIZE_STRING);

        //Create a PHP array with our search criteria
        $findCriteria = [
            'session_ID' => $session_ID
        ];

        //Find the session id that match  this criteria
        $cursor = $cartCollection->find($findCriteria);

        //Work through the cursor
        if ($cursor->isDead()){
            //Convert to PHP array
            $dataArray = [
                "session_ID" => $session_ID,
                "created_at" => date("l jS \of F Y h:i:s A"),
                "updated_at" => date("l jS \of F Y h:i:s A"),
                "product_Arr" => [["prodID" => $prodID,
                "qty" => $qty,
                "size" => $size]]
            ];

            //Add the new user to the database
            $insertResult = $cartCollection->insertOne($dataArray);

            //Echo result back to user
            if($insertResult->getInsertedCount()!=1){
                echo 'false';
            } else {
                echo $size;
            }
        } else {
            //Criteria for finding document to replace
            $replaceCriteria = [
                "session_ID" => $session_ID
            ];

            $dataArray = array(
                '$set' => array(
                    'updated_at' => date("l jS \of F Y h:i:s A")
                ),
                '$push' => array(
                    'product_Arr' => array("prodID" => $prodID, "qty" => $qty,
                    "size" => $size)
                )
                );
            
            //Replace customer data for this ID
            $updateRes = $cartCollection->updateOne($replaceCriteria, $dataArray);
                
            if($updateRes->getModifiedCount() == 1)
                echo $size;
            else
                echo 'false';
        }

    }


    function updateQty(){

        global $productCollection;
        //Get strings - need to filter input to reduce chances of SQL injection etc.
        $prodID = filter_input(INPUT_POST, 'prodID', FILTER_SANITIZE_STRING);
        $size = filter_input(INPUT_POST, 'size', FILTER_SANITIZE_STRING);
        $qty = filter_input(INPUT_POST, 'qty', FILTER_SANITIZE_STRING);

        //Criteria for finding document to update
        $updateCriteria = [
            "_id" => new MongoDB\BSON\ObjectID($prodID)
        ];
        // inventory
        $inv = 'inventory.' . $size;

        $productData = array(
            '$inc' => array($inv => -$qty)
        );
        
        //Replace product data for this ID
        $updateRes = $productCollection->updateOne($updateCriteria, $productData);

        //Find all of the category that match this criteria
        $productCursor = $productCollection->find($updateCriteria);

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
    
