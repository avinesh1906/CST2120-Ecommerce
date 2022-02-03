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
        '$text' => [ '$search' => $email ] 
    ];

    //Find all of the customers that match  this criteria
    $cursor = $collection->find($findCriteria);
 
    if ($cursor->isDead()) {
        echo '*username/password incorrect';
    } else {
        foreach ($cursor as $cust){
            if($cust['password'] == $password){
                echo 'Login as ' . $cust['firstname'];
            } else {
                echo '*username/password incorrect';
            }
        }
    }
    // if (!count($cursor->toarray())) {
    //     echo '*username/password incorrect';
    // } else {
    //     foreach ($cursor as $cust){
    //         // if($cust['password'] == $password){
    //         //     echo 'Login as ' . $cust['firstname'];
    //         // }
    //         echo 'Login as ' . $cust['firstname'];
    //     }
    // }
    // } else {
    //     // foreach ($cursor as $cust){
    //     //     if($cust['password'] == $password){
    //     //         echo 'Login as ' . $cust['firstname'];
    //     //     }
    //     // }
    //     echo 'Login as ' . $cust['firstname'];
    // }

    // if($cursor){//Check query parameters 
    //     //STORE REGISTRATION DATA IN MONGODB
    
    //     //Output message confirming registration
    //     echo 'Login as' . $;
    // }
    // else{//A query string parameter cannot be found
    //     echo '*username/password incorrect';
    // }

