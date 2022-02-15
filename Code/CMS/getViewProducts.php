<?php 
    require __DIR__ . '/vendor/autoload.php';

    $mongoClient = (new MongoDB\Client );
    $db =$mongoClient -> ecommerce;
    $collection = $db -> Products;

    // $records = $mongo->$collection;
    // $records = iterator_to_array($records);
    
    // array_walk(
    //     $records,
    //     function (&$record)
    //     {
    //       if (isset($record['subDoc'])) {
    //         $record['subDoc'] = iterator_to_array($record['subDoc']);
    //       }
    //     }
    // );
    
    $name = filter_input (INPUT_POST,'name',FILTER_SANITIZE_STRING);
    $password = filter_input (INPUT_POST,'password',FILTER_SANITIZE_STRING);

    $dataArray =[
        "name"=> $name,
        "password"=> $password,

    ];

    $insertResult= $collection->insertOne($dataArray);
  
    if ($insertResult->getInsertedCount()==1){
        echo'Staff added';
    }
    else{
        echo 'Error adding staff';
    }