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
    $country= filter_input(INPUT_POST, 'country', FILTER_SANITIZE_STRING);
    $address= filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
    $postalCode = filter_input(INPUT_POST, 'postalCode', FILTER_SANITIZE_NUMBER_INT);

    //Criteria for finding document to replace
    $replaceCriteria = [
        "_id" => new MongoDB\BSON\ObjectID($id)
    ];

    //Data to replace
    $customerData = [
        [ '$set' => ["country" => $country]],
        [ '$set' => ["address" => $address]],
        [ '$set' => ["city" => $city]],
        [ '$set' => ["postalCode" => $postalCode]]
    ];

    //Replace customer data for this ID
    $updateRes = $collection->updateOne($replaceCriteria, $customerData);
        
    if($updateRes->getModifiedCount() == 1)
        echo 'Customer document successfully replaced.';
    else
        echo 'Customer replacement error.';


