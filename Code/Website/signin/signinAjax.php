<?php
    //Include libraries
    require '../vendor/autoload.php';
    
    //Create instance of MongoDB client
    $mongoClient = (new MongoDB\Client);

    //Select a database
    $db = $mongoClient->ecommerce;

    //Select a collection 
    $collection = $db->Customer;

    //Get email and password strings - need to filter input to reduce chances of SQL injection etc.
    $email= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    
    //Create a PHP array with our search criteria
    $findCriteria = [
        'email' => $email 
    ];

    //Find all of the customers that match  this criteria
    $cursor = $collection->find($findCriteria);
 
    if ($cursor->isDead()) {
        echo 'false';
    } else {
        foreach ($cursor as $cust){
            if($cust['password'] == $password){
                echo $cust['firstname'] . ' ' . $cust['lastname'] ;
            } else {
                echo 'false';
            }
        }
    }

