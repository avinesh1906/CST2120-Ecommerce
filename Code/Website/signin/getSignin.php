<?php
    //Start session management
    session_start();

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
    
    if (!$cursor->isDead()){
        // Output each customer as a JSON object with comma in between
        $jsonStr = '['; //Start of array of customer in JSON

        foreach ($cursor as $cust){
            if($cust['password'] == $password){
                //Convert PHP representation of customer into JSON
                $jsonStr .= json_encode($cust);
                //Separator between customer
                $jsonStr .= ',';

                //Start session for this user
                $_SESSION['loggedUser'] = $cust['firstname']. " ". $cust['lastname'];;
                $_SESSION['email'] = $email;

            } else {
                $jsonStr .= ' ';
            }
        }
            
        //Remove last comma
        $jsonStr = substr($jsonStr, 0, strlen($jsonStr) - 1);
        //Close array
        $jsonStr .= ']';


        // Echo final string
        echo $jsonStr;

    } else {
        echo '[]';
    }



