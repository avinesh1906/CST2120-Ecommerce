<?php 
    require __DIR__ . '/vendor/autoload.php';
     //selecting database
    $mongoClient = (new MongoDB\Client );
    $db =$mongoClient -> ecommerce;
    $collection = $db -> Products;
    $categoryCollection = $db->Category;

    //extract the data
    $name = filter_input (INPUT_POST,'painting_name',FILTER_SANITIZE_STRING);
    $categoryName = filter_input (INPUT_POST,'painting_category',FILTER_SANITIZE_STRING);
    $description = filter_input (INPUT_POST,'painting_des',FILTER_SANITIZE_STRING);
    $keydetails = filter_input (INPUT_POST,'key_d',FILTER_SANITIZE_STRING);
    $price = intVal(filter_input (INPUT_POST,'price',FILTER_SANITIZE_STRING));
    $imageurl = filter_input (INPUT_POST,'image_url',FILTER_SANITIZE_STRING);
    $A2 = intVal(filter_input (INPUT_POST,'A2',FILTER_SANITIZE_NUMBER_INT));
    $A3 = intVal(filter_input (INPUT_POST,'A3',FILTER_SANITIZE_NUMBER_INT));
    $A4 = intVal(filter_input (INPUT_POST,'A4',FILTER_SANITIZE_NUMBER_INT));

    $keydetails .= ';';

    //Convert to PHP array
    $dataArray =[
        "name" => $name,
        "category_ID" => extractCategoryId($categoryName),
        "painting_des" => $description,
        "key_details" => $keydetails,
        "price" => $price,
        "imageURL" => "../common/img/labourerSugar.jpg",
        "date_created" => date("l jS \of F Y h:i:s A"),
        "inventory" => [
            "A2" => $A2,
            "A3" => $A3,
            "A4" => $A4
        ]
    ];
    //Add new product to database
    $insertResult= $collection->insertOne($dataArray);

    //echo back to staff member
    if ($insertResult->getInsertedCount()==1){
        echo 'Product added';
    }
    else{
        echo 'Error adding product';
    }

    function extractCategoryId($categoryName){
        global $categoryCollection;

        //Create a PHP array for portrait criteria
        $findCategoryCriteria = [
            "name" => $categoryName
        ];

        //Find the category that match this criteria
        $categoryCursor = $categoryCollection->find($findCategoryCriteria);

        // determine the category id
        foreach ($categoryCursor as $cate){
            $cateID =  $cate['_id'];    
        }

        return $cateID;
    }