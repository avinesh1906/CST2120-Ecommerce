<?php
    //Check file data has been sent
    if(!array_key_exists("imageToUpload", $_FILES)){
        echo 'File missing.';
        return;
    }
    if($_FILES["imageToUpload"]["name"] == "" || $_FILES["imageToUpload"]["name"] == null){
        echo 'File missing.';
        return;
    }
    $uploadFileName = $_FILES["imageToUpload"]["name"];

    /*  Check if image file is a actual image or fake image
        tmp_name is the temporary path to the uploaded file. */
    if(getimagesize($_FILES["imageToUpload"]["tmp_name"]) === false) {
        echo "File is not an image.";
        return;
    }
    
    // Check that the file is the correct type
    $imageFileType = pathinfo($uploadFileName, PATHINFO_EXTENSION);
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        return;
    }
    
    //Specify where file will be stored
    $target_file = 'images/' . $uploadFileName;
    
    /* Files are uploaded to a temporary location. 
        Need to move file to the location that was set earlier in the script */
    if (move_uploaded_file($_FILES["imageToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["imageToUpload"]["name"]). " has been uploaded.";
        echo '<p>Uploaded image: <img src="' . $target_file . '"></p>';//Include uploaded image on page
    } 
    else {
        echo "Sorry, there was an error uploading your file.";
    }

