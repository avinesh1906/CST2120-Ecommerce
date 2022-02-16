<?php
    //Include libraries
    require '../vendor/autoload.php';

    //Create instance of MongoDB client
    $mongoClient = (new MongoDB\Client);

    //Select a database
    $db = $mongoClient->ecommerce;

    //Select collections 
    $collection = $db->Customer;

    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    
    // call function depending on input func
    if(isset($_POST['func'])){
        $func = $_POST['func'];
        if ($func == "password") {
            checkPassword($email);
        } else {
            update();
        }
    }
    // function verify password
    function checkPassword($input){
        global $collection;
        
        //Create a PHP array with our search criteria
        $findCriteria = [
            'email' => $input
        ];
    
        //Find all of the customers that match  this criteria
        $cursor = $collection->find($findCriteria);
        foreach ($cursor as $cust){
            echo $cust['password'];
        }    
    }

    // function update password
    function update(){
        global $collection;
        //Extract the customer details 
        $id= filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);
        $new_password= filter_input(INPUT_POST, 'new_password', FILTER_SANITIZE_STRING);

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

    }