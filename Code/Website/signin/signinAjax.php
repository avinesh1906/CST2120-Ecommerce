<?php
    //Get email and password strings - need to filter input to reduce chances of SQL injection etc.
    $email= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    
    if(){//Check query parameters 
        //STORE REGISTRATION DATA IN MONGODB
    
        //Output message confirming registration
        echo 'Login as' . $;
    }
    else{//A query string parameter cannot be found
        echo '*username/password incorrect';
    }

