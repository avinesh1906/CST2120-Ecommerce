<?php

//Include libraries
require '../vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

//Select collections 
$customerCollection = $db->Customer;
$orderCollection = $db->Order_Shipping;
$productCollection = $db->Products;
$categoryCollection = $db->Category;
$cartItemCollection = $db->Cart_Items;

if(isset($_POST['func'])){
    $func = $_POST['func'];
    if ($func == "getDetails") {
        getCustomerID();
    } 
}

function getCustomerID()
{
    global $customerCollection;

    //Get session id strings - need to filter input to reduce chances of SQL injection etc.
    $sessionEmail= filter_input(INPUT_POST, 'sessionEmail', FILTER_SANITIZE_STRING);

    //Create a PHP array for session criteria
    $findCartCriteria = [
        "email" => $sessionEmail
    ];

    //Find all of the category that match this criteria
    $customerCursor = $customerCollection->find($findCartCriteria);

    //Work through the products
    if ($customerCursor->isDead()) {
        echo 'false';
    } else {
        foreach ($customerCursor as $customer){  
            $customer_id =  $customer['_id'];
        }
        extractOrder($customer_id);
    }

}

function extractOrder($customer_id)
{   
    global $orderCollection;

    //Create a PHP array for session criteria
    $findCustomerCriteria = [
        "customer_ID" =>  new MongoDB\BSON\ObjectId($customer_id)
    ];

    //Find all of the category that match this criteria
    $orderCursor = $orderCollection->find($findCustomerCriteria);

    //Work through the products
    if ($orderCursor->isDead()) {
        echo 'false';
    } else {
         //Start of array of products in JSON
        $jsonStr = '[';
        foreach ($orderCursor as $item){  
            $jsonStr .= getDetails($item['session_ID']);
            //Separator between products
            $jsonStr .= ',';
        }

        //Remove last comma
        $jsonStr = substr($jsonStr, 0, strlen($jsonStr) - 1);
        //Close array
        $jsonStr .= ']';
        //Echo final string
        echo $jsonStr;

    }
}

function getDetails($session_ID)
{
    global $cartItemCollection;

    //Create a PHP array for session criteria
    $findCartCriteria = [
        "session_ID" => $session_ID
    ];
    
    //Find all of the category that match this criteria
    $cartItemCursor = $cartItemCollection->find($findCartCriteria);

    //Work through the products
    if ($cartItemCursor->isDead()) {
        echo 'false';
    } else {
        foreach ($cartItemCursor as $item){  
            $arr = array();
            if (sizeof($item['product_Arr']) == 0 ){
                echo 'false';
            }
            else {
                $jsonStr = '';
                foreach ($item['product_Arr'] as $each){
                    $productDetails = generateProductDetails($each['prodID']);
                    // create the array to display on cart
                    $arr += array("name" => $productDetails['name'], 'imageURL' => $productDetails['imageURL'], 'price' => $productDetails['price'], 'category' => $productDetails['category'],
                    'size' => $each['size'], 'qty' => $each['qty']);
                    //Convert PHP representation of product into JSON
                    $jsonStr = json_encode($arr);
                                                                       
                }
                return $jsonStr;
            }
        }


    }

}

function generateProductDetails($prodID)
{
    global $productCollection;

    //Create a PHP array for session criteria
    $findCartCriteria = [
        "_id" => new MongoDB\BSON\ObjectId($prodID)
    ];

    //Find all of the category that match this criteria
    $productCursor = $productCollection->find($findCartCriteria);

    //Work through the products
    if ($productCursor->isDead()) {
        echo 'false';
    } else {
        //Output each product as a JSON object with comma in between
        $jsonStr = '['; //Start of array of products in JSON

        foreach ($productCursor as $prod){ 
            $arr = array('name' => $prod['name'], 'imageURL' => $prod['imageURL'],'price' => $prod['price'], 'category' => extractCategory($prod['category_ID']));
        }

        return $arr;
    }
}

function extractCategory($input)
{
    global $categoryCollection;

    //Create a PHP array for session criteria
    $findCartCriteria = [
        "_id" => new MongoDB\BSON\ObjectId($input)
    ];

    //Find all of the category that match this criteria
    $categoryCursor = $categoryCollection->find($findCartCriteria);

    //Work through the categories
    if ($categoryCursor->isDead()) {
        echo 'false';
    } else {
        foreach ($categoryCursor as $category){
            return $category['name'];
        }
    }

}