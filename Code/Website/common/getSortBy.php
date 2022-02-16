<?php
    //Include libraries
    require '../vendor/autoload.php';

    //Create instance of MongoDB client
    $mongoClient = (new MongoDB\Client);

    //Select a database
    $db = $mongoClient->ecommerce;

    //Select collections 
    $productCollection = $db->Products;
    $categoryCollection = $db->Category;

    //Get category name strings - need to filter input to reduce chances of SQL injection etc.
    $categoryName= filter_input(INPUT_POST, 'categoryName', FILTER_SANITIZE_STRING);

    //Create a PHP array for portrait criteria
    $findCategoryCriteria = [
        "name" => $categoryName
    ];

    //Find the category that match this criteria
    $categoryCursor = $categoryCollection->find($findCategoryCriteria);

    foreach ($categoryCursor as $cate){
        $cateID =  $cate['_id'];    
    }

    //Create a PHP array to search specifc category id from Products
    $findProductCriteria = [
        "category_ID" => new MongoDB\BSON\ObjectId($cateID)
    ];

    // call functions depeding on input func
    if(isset($_POST['func'])){
        $func = $_POST['func'];
        if ($func == "priceAsc") {
            priceAsc();
        } else if ($func == "priceDesc"){
            priceDesc();
        } else if ($func == "alphaAsc"){
            alphaAsc();
        } else if ($func == "alphaDesc"){
            alphaDesc();
        }
    }
    
    // function for price ascending order
    function priceAsc()
    {
        global $productCollection;

        // price sort array 
        $priceSortAsc = array(
            "sort" => array("price" => 1)
        );

        // call function
        sendContent($priceSortAsc);
    }

    // price desc order func
    function priceDesc()
    {
        global $productCollection;

        // price sort desc
        $priceSortDesc = array(
            "sort" => array("price" => -1)
        );

        // call function
        sendContent($priceSortDesc);
    }

    // function for alphabetical ascending order
    function alphaAsc()
    {
        global $productCollection;

        // create array for alphabet asc order
        $alphaSortAsc = array(
            "sort" => array("name" => 1)
        );

        // call function
        sendContent($alphaSortAsc);
    }

    // function descending alphabetical order
    function alphaDesc()
    {
        global $productCollection;

        // array for alpha descending order
        $alphaSortDesc = array(
            "sort" => array("name" => -1)
        );

        sendContent($alphaSortDesc);
    }

    // function for send content
    function sendContent($queryArr)
    {
        global $productCollection;
        global $findProductCriteria;

        //Find all of the category that match this criteria
        $productCursor = $productCollection->find($findProductCriteria, $queryArr);

        // //Output each product as a JSON object with comma in between
        $jsonStr = '['; //Start of array of products in JSON

        //Work through the products
        if ($productCursor->isDead()) {
            echo 'false';
        } else {
            foreach ($productCursor as $prod){  
                //Convert PHP representation of product into JSON
                $jsonStr .= json_encode($prod);
                //Separator between products
                $jsonStr .= ',';
            }
        }

        //Remove last comma
        $jsonStr = substr($jsonStr, 0, strlen($jsonStr) - 1);

        //Close array
        $jsonStr .= ']';

        //Echo final string
        echo $jsonStr;

    }

