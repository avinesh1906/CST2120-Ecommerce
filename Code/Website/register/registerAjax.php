<?php
    //Include libraries
    require '../vendor/autoload.php';
    
    //Create instance of MongoDB client
    $mongoClient = (new MongoDB\Client);

    //Select a database
    $db = $mongoClient->ecommerce;

    //Select a collection 
    $collection = $db->Customer;

    //Get strings - need to filter input to reduce chances of SQL injection etc.
    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING); 
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $DOB = filter_input(INPUT_POST, 'DOB', FILTER_SANITIZE_STRING);
    $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING); 
    $telephone = filter_input(INPUT_POST, 'telephone', FILTER_SANITIZE_STRING); 
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
    $postalCode = filter_input(INPUT_POST, 'postalCode', FILTER_SANITIZE_NUMBER_INT);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    
    //Convert to PHP array
    $dataArray = [
        "firstname" => $firstname,
        "lastname" => $lastname,
        "email" => $email, 
        "DOB" => $DOB,
        "gender" => $gender,
        "telephone" => $telephone,
        "address" => $address,
        "city" => $city,
        "postalCode" => $postalCode,
        "password" => $password
    ];

    //Add the new user to the database
    $insertResult = $collection->insertOne($dataArray);

    // STORE REGISTRATION DATA IN MONGODB
    //Echo result back to user
    if($insertResult->getInsertedCount()!=1){
        echo '<script>alert("Error adding customer")</script>';
    }