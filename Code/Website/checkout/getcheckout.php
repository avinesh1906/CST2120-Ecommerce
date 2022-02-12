<?php
    //Include libraries
    require '../vendor/autoload.php';

    //Create instance of MongoDB client
    $mongoClient = (new MongoDB\Client);

    //Select a database
    $db = $mongoClient->ecommerce;

    //Select collections 
    $customerCollection = $db->Customer;
    $cartItemCollection = $db->Cart_Items;
    $productCollection = $db->Products;
    $categoryCollection = $db->Category;
    $orderShippingCollection = $db->Order_Shipping;

    if(isset($_POST['func'])){
        $func = $_POST['func'];
        if ($func == "getAddress") {
            getAddress();
        } else if ($func == "getOrder") {
            getOrder();
        } else {
            storeOrder();
        }
    }

    function getAddress()
    {
        global $customerCollection;
        //Get id strings - need to filter input to reduce chances of SQL injection etc.
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

        //Create a PHP array for id criteria
        $findCriteria = [
            "email" => $email
        ];

        //Find the customer that match this criteria
        $cursor = $customerCollection->find($findCriteria);

        // //Output each customer as a JSON object with comma in between
        $jsonStr = '['; //Start of array of customer in JSON

        //Work through the customer
        if (!$cursor->isDead()){
            foreach ($cursor as $cust){  
                // Create customer array
                $arr = array("firstname" => $cust['firstname'], "lastname" => $cust['lastname']
                        , "telephone" => $cust['telephone'], "address" => $cust['address'],
                        "city" => $cust['city'], "postalCode" => $cust['postalCode'], "country" => $cust['country']);
                //Convert PHP representation of customer into JSON
                $jsonStr .= json_encode($arr);
                //Separator between customer
                $jsonStr .= ',';
            }          
            //Remove last comma
            $jsonStr = substr($jsonStr, 0, strlen($jsonStr) - 1);
        }

        //Close array
        $jsonStr .= ']';

        //Echo final string
        echo $jsonStr;
    }

    function getOrder()
    {
        global $cartItemCollection;
    
        //Get session id strings - need to filter input to reduce chances of SQL injection etc.
        $session_ID= filter_input(INPUT_POST, 'session_ID', FILTER_SANITIZE_STRING);
    
        //Create a PHP array for session criteria
        $findCartCriteria = [
            "session_ID" => $session_ID
        ];
    
        //Find all of the category that match this criteria
        $cartItemCursor = $cartItemCollection->find($findCartCriteria);
    
        //Work through the products
        if ($cartItemCursor->isDead()) {
            echo 'false';
        } else {
            $jsonStr = '['; //Start of array of products in JSON
            $arr = array();
            foreach ($cartItemCursor as $item){  
                foreach ($item['product_Arr'] as $each){
                    $productDetails = generateProductDetails($each['prodID']);
                    // create the array to display on cart
                    $arr = array("name" => $productDetails['name'], 'imageURL' => $productDetails['imageURL'], 'price' => $productDetails['price'], 'category' => $productDetails['category'],
                    'size' => $each['size'], 'qty' => $each['qty']);
                    //Convert PHP representation of product into JSON
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
    
        }
    
    }
    
    function generateProductDetails($prodID)
    {
        global $productCollection;
    
        //Create a PHP array for session criteria
        $findCartCriteria = [
            "_id" => new MongoDB\BSON\ObjectId($prodID)
        ];
    
        //Find all of the category that match this criteria
        $productCursor = $productCollection->find($findCartCriteria);
    
        //Work through the products
        if ($productCursor->isDead()) {
            echo 'false';
        } else {
            //Output each product as a JSON object with comma in between
            $jsonStr = '['; //Start of array of products in JSON
    
            foreach ($productCursor as $prod){ 
                $arr = array('name' => $prod['name'], 'imageURL' => $prod['imageURL'],'price' => $prod['price'], 'category' => extractCategory($prod['category_ID']));
            }
    
            return $arr;
        }
    }
    
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
            foreach ($categoryCursor as $category){
                return $category['name'];
            }
        }
    
    }

    function storeOrder()
    {
        global $orderShippingCollection;

        //Get strings - need to filter input to reduce chances of SQL injection etc.
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING); 
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
        $telephone = filter_input(INPUT_POST, 'telephone', FILTER_SANITIZE_STRING); 
        $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
        $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
        $postalCode = filter_input(INPUT_POST, 'postalCode', FILTER_SANITIZE_NUMBER_INT);
        $country = filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING);
        $session_ID = filter_input(INPUT_POST, 'session_ID', FILTER_SANITIZE_STRING);

        if ($email != "null") {
                $customer_ID = extractID($email);
                //Convert to PHP array
                $dataArray = [
                    "session_ID" => $session_ID,
                    "customer_ID" => $customer_ID,  
                    "firstname" => $firstname,
                    "lastname" => $lastname,
                    "telephone" => $telephone,
                    "address" => $address,
                    "city" => $city,
                    "postalCode" => $postalCode,
                    "country" => $country
                ];
        } else {
            //Convert to PHP array
            $dataArray = [
                "session_ID" => $session_ID,
                "firstname" => $firstname,
                "lastname" => $lastname,
                "telephone" => $telephone,
                "address" => $address,
                "city" => $city,
                "postalCode" => $postalCode,
                "country" => $country
            ];
        }

        //Add the new user to the database
        $insertResult = $orderShippingCollection->insertOne($dataArray);
        // STORE REGISTRATION DATA IN MONGODB
        //Echo result back to user
        if($insertResult->getInsertedCount()!=1){
            echo '<script>alert("Error adding order")</script>';
        }

    }

    function extractID($email)
    {
        global $customerCollection;

        //Create a PHP array for id criteria
        $findCriteria = [
            "email" => $email
        ];

        //Find the customer that match this criteria
        $cursor = $customerCollection->find($findCriteria);

        //Work through the customer
        if (!$cursor->isDead()){
            foreach ($cursor as $cust){  
                return $cust['_id'];
            }
        }
    }


