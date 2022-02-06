<?php
    //Include libraries
    require '../vendor/autoload.php';

    //Create instance of MongoDB client
    $mongoClient = (new MongoDB\Client);

    //Select a database
    $db = $mongoClient->ecommerce;

    //Select collections 
    $collection = $db->Customer;

    //Extract the customer details 
    $id= filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
    $current_password= filter_input(INPUT_POST, 'current_password', FILTER_SANITIZE_STRING);
    $new_password= filter_input(INPUT_POST, 'new_password', FILTER_SANITIZE_STRING);
    $confirm_password = filter_input(INPUT_POST, 'confirm_password', FILTER_SANITIZE_STRING);

    //Criteria for finding document to replace
    $replaceCriteria = [
        "_id" => new MongoDB\BSON\ObjectID($id)
    ];

    //Data to replace
    $customerData = [
        [ '$set' => ["password" => $new_password]],
    ];

    //Replace customer data for this ID
    $updateRes = $collection->updateOne($replaceCriteria, $customerData);
        
    if($updateRes->getModifiedCount() == 1)
        echo 'Customer document successfully replaced.';
    else
        echo 'Customer replacement error.';


