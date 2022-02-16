<?php

//Include libraries
require '../vendor/autoload.php';

//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->ecommerce;

//Select collections 
$cartItemCollection = $db->Cart_Items;
$productCollection = $db->Products;
$categoryCollection = $db->Category;

// call different function depending on func input
if(isset($_POST['func'])){
    $func = $_POST['func'];
    if ($func == "getDetails") {
        getDetails();
    } else if ($func == "deleteItem") {
        deleteItem();
    }
}

// function getDetails to create list of products
function getDetails()
{
    global $cartItemCollection;

    //Get session id strings - need to filter input to reduce chances of SQL injection etc.
    $session_ID= filter_input(INPUT_POST, 'session_ID', FILTER_SANITIZE_STRING);

    //Create a PHP array for session criteria
    $findCartCriteria = [
        "session_ID" => $session_ID
    ];

    //Find all of the category that match this criteria
    $cartItemCursor = $cartItemCollection->find($findCartCriteria);

    //Work through the products
    // check if cartItemCursor is empty
    if ($cartItemCursor->isDead()) {
        echo 'false';
    } else {
        $jsonStr = '['; //Start of array of products in JSON
        // declaration of array
        $arr = array();
        // loop through cart items
        foreach ($cartItemCursor as $item){  
            // check whether cart item is zero
            if (sizeof($item['product_Arr']) == 0 ){
                echo 'false';
            }
            else {
                // loop through the array product_Arr
                foreach ($item['product_Arr'] as $each){
                    // extract the product details depending on prodID
                    $productDetails = generateProductDetails($each['prodID']);
                    // create the array to display on cart
                    $arr = array("name" => $productDetails['name'], 'imageURL' => $productDetails['imageURL'], 'price' => $productDetails['price'], 'category' => $productDetails['category'],
                    'size' => $each['size'], 'qty' => $each['qty']);
                    //Convert PHP representation of product into JSON
                    $jsonStr .= json_encode($arr);
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

    }

}

// function to extract single product details
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

        // loop through productCursor 
        foreach ($productCursor as $prod){
            // create an array for specific field 
            $arr = array('name' => $prod['name'], 'imageURL' => $prod['imageURL'],'price' => $prod['price'], 'category' => extractCategory($prod['category_ID']));
        }

        // return the array
        return $arr;
    }
}

// extract the category depending on id
function extractCategory($id)
{
    global $categoryCollection;

    //Create a PHP array for session criteria
    $findCartCriteria = [
        "_id" => new MongoDB\BSON\ObjectId($id)
    ];

    //Find all of the category that match this criteria
    $categoryCursor = $categoryCollection->find($findCartCriteria);

    //Work through the categories
    if ($categoryCursor->isDead()) {
        echo 'false';
    } else {
        // return the category name
        foreach ($categoryCursor as $category){
            return $category['name'];
        }
    }

}

// function to delete a specific item from cart
function deleteItem(){
    global $cartItemCollection;
    global $productCollection;

    //Get session id strings - need to filter input to reduce chances of SQL injection etc.
    $session_ID= filter_input(INPUT_POST, 'session_ID', FILTER_SANITIZE_STRING);
    $arrayIndex = filter_input(INPUT_POST, 'arrayIndex', FILTER_SANITIZE_STRING);
    
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
        // extract cart details
        foreach ($cartItemCursor as $cart){
            $prod_ID = json_encode($cart['product_Arr'][$arrayIndex]['prodID']);
            $size = json_encode($cart['product_Arr'][$arrayIndex]['size']);
            $qty = json_encode($cart['product_Arr'][$arrayIndex]['qty']);
        }

        //Create a PHP array for session criteria
        $updateProductCriteria = [
            "_id" => new MongoDB\BSON\ObjectID(json_decode($prod_ID))
        ];

        // inventory
        $inv = 'inventory.' . json_decode($size);

        $productData = array(
            '$inc' => array($inv => + json_decode($qty))
        );

        //Replace product data for this ID
        $updateRes = $productCollection->updateOne($updateProductCriteria, $productData);
    }
    
    // delete the specific index of the product_Arr
    $dataArray = array(
        '$unset' => array("product_Arr.$arrayIndex" => 1)
    );
    $nullArray = array(
        '$pull' => array("product_Arr" => null)
    );
    
    //Find and delete the chosen index from cart items
    $cartItemCollection->updateOne($findCartCriteria, $dataArray);
    $updateRes =$cartItemCollection->updateOne($findCartCriteria, $nullArray);
    
}