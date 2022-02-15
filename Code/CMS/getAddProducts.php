<?php 
    require __DIR__ . '/vendor/autoload.php';

    $mongoClient = (new MongoDB\Client );
    $db =$mongoClient -> ecommerce;
    $collection = $db -> Products;

    $name = filter_input (INPUT_POST,'painting_name',FILTER_SANITIZE_STRING);
    $category_ID = filter_input (INPUT_POST,'painting_category',FILTER_SANITIZE_STRING);
    $description = filter_input (INPUT_POST,'painting_des',FILTER_SANITIZE_STRING);
    $keydetails = filter_input (INPUT_POST,'key_d',FILTER_SANITIZE_STRING);
    $price = filter_input (INPUT_POST,'price',FILTER_SANITIZE_STRING);
    $imageurl = filter_input (INPUT_POST,'image_url',FILTER_SANITIZE_STRING);
    $date = filter_input (INPUT_POST,'date_created',FILTER_SANITIZE_STRING);

    $dataArray =[
        "name" => $name,
        "category_ID" => $category_ID,
        "description" => $description,
        "key_details" => $keydetails,
        "price" => $price,
        "imageURL" => $imageurl,
        "created_at" => $date,
    ];

    $insertResult= $collection->insertOne($dataArray);
  
    if ($insertResult->getInsertedCount()==1){
        echo 'Product added';
    }
    else{
        echo 'Error adding product';
    }