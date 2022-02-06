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
    $firstname= filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
    $lastname= filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
    $telephone = filter_input(INPUT_POST, 'telephone', FILTER_SANITIZE_STRING);
    $dob = filter_input(INPUT_POST, 'DOB', FILTER_SANITIZE_STRING);
    $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);

    //Criteria for finding document to replace
    $replaceCriteria = [
        "_id" => new MongoDB\BSON\ObjectID($id)
    ];

    //Data to replace
    $customerData = [
        [ '$set' => ["firstname" => $firstname]],
        [ '$set' => ["lastname" => $lastname]],
        [ '$set' => ["telephone" => $telephone]],
        [ '$set' => ["DOB" => $dob]],
        [ '$set' => ["email" => $email]],
        [ '$set' => ["gender" => $gender]]
    ];

    //Replace customer data for this ID
    $updateRes = $collection->updateOne($replaceCriteria, $customerData);
        
    if($updateRes->getModifiedCount() == 1)
        echo 'Customer document successfully replaced.';
    else
        echo 'Customer replacement error.';


