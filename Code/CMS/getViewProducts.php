<?php 
    require __DIR__ . '/vendor/autoload.php';

    //Create instance of MongoDB client
    $mongoClient = (new MongoDB\Client);

    //Select a database
    $db = $mongoClient->ecommerce;

    //Select collections 
    $productCollection = $db->Products;
    $categoryCollection = $db->Category;

    $productCursor = $productCollection->find();


    //Work through the products
    if ($productCursor->isDead()) {
        echo 'false';
    } else {
        $jsonStr = '['; //Start of array of products in JSON
        foreach ($productCursor as $product){  
            $arr = array("name" => $product['name'], 'imageURL' => $product['imageURL'], 'price' => $product['price'],
            'id' => $product['_id'], 'description' => $product['description'], 'category' => extractCategory($product['category_ID']));
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

    // function to extract category
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
            // return category name
            foreach ($categoryCursor as $category){
                return $category['name'];
            }
        }

    }