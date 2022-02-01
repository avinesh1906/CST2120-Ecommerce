<?php
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
    
    // STORE REGISTRATION DATA IN MONGODB
    
    //Output message confirming registration
    echo 'Thank you for registering ' . $firstname;
    

