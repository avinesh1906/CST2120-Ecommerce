<?php
    //Include libraries
    require '../vendor/autoload.php';

    //Create instance of MongoDB client
    $mongoClient = (new MongoDB\Client);

    //Select a database
    $db = $mongoClient->ecommerce;

    //Select collections 
    $customerCollection = $db->Customer;

    //Get id strings - need to filter input to reduce chances of SQL injection etc.
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    //Create a PHP array for id criteria
    $findCriteria = [
        "email" => $email
    ];

    //Find the customer that match this criteria
    $cursor = $customerCollection->find($findCriteria);
 
    $jsonStr = '';
    //Work through the customer
    if (!$cursor->isDead()){
        //Output each customer as a JSON object with comma in between
        $jsonStr = '['; //Start of array of customer in JSON

        foreach ($cursor as $cust){  
            //Convert PHP representation of customer into JSON
            $jsonStr .= json_encode($cust);
            //Separator between customer
            $jsonStr .= ',';
        }          
        //Remove last comma
        $jsonStr = substr($jsonStr, 0, strlen($jsonStr) - 1);
        //Close array
        $jsonStr .= ']';
    }

    //Echo final string
    echo $jsonStr;
