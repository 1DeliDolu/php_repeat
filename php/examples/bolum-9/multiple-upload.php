<?php

    if(isset($_POST["btnFileUpload"]) && $_POST["btnFileUpload"]=="Upload") {

        $file_count = count($_FILES["fileToUpload"]["name"]);
        $maxFileSize = (1024 * 1024) * 1; // 1 MB
        $allowedTypes = array("image/png","image/jpg","image/jpeg");
        $uploadOk = true;

        if($file_count > 2) {
            $uploadOk = false;
            echo "You can upload a maximum of 2 files.";
        }

        if($uploadOk) {
            for($i=0; $i < $file_count; $i++) {
                
                $fileTmpPath = $_FILES["fileToUpload"]["tmp_name"][$i];
                $fileName = $_FILES["fileToUpload"]["name"][$i];
                $fileSize = $_FILES["fileToUpload"]["size"][$i];
                $fileType = $_FILES["fileToUpload"]["type"][$i];
                

                if(in_array($fileType, $allowedTypes)) {

                    if($fileSize > $maxFileSize) {
                        echo "Max file size should be 1 MB.<br>";
                    } else {

                        $fileNameArr = explode(".", $fileName);
                        $fileNameWithoutExt = $fileNameArr[0];
                        $fileExtension = $fileNameArr[1];

                        $newFileName = $fileNameWithoutExt."-".rand(0, 9999999).".".$fileExtension;
                        $dest_path = "images/".$newFileName;

                        if(move_uploaded_file($fileTmpPath, $dest_path)) {
                            echo $newFileName." has been uploaded.<br>";
                        } else {
                            echo "Error uploading ".$newFileName."<br>";
                        }
                    }

                } else {
                    echo "File type is not allowed.<br>";
                    echo "Allowed file types: ".implode(", ", $allowedTypes)."<br>";
                }
                
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Multiple File Upload</title>
</head>
<body>
    
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="username" placeholder="Username">
        <input type="file" name="fileToUpload[]" multiple="multiple">
        <input type="submit" value="Upload" name="btnFileUpload">
    </form>

</body>
</html>