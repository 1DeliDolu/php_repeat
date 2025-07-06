<?php

    if(isset($_POST["btnFileUpload"]) && $_POST["btnFileUpload"]=="Upload") {
       
        if(isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == 0) {
            $uploadOk = true;
            $dest_path = "./uploadedFiles/";
            // Check if directory exists, if not create it
            if (!is_dir($dest_path)) {
                mkdir($dest_path, 0777, true);
            }
            $filename = $_FILES["fileToUpload"]["name"];
            $fileSize = $_FILES["fileToUpload"]["size"];
            $allowed_extensions = array('jpg','png','jpeg','tiff');

            if(empty($filename)) {
                $uploadOk = false;
                echo "Please select a file";
                echo "<br>";
            }

            if($fileSize > 500000) {
                $uploadOk = false;
                echo "File size is too large";
                echo "<br>";
            }

            $fileParts = explode(".", $filename); 
            $fileNameWithoutExt = $fileParts[0];
            $fileExtension = $fileParts[1];

            if(!in_array($fileExtension, $allowed_extensions)) {
                $uploadOk = false;
                echo "File extension is not allowed";
                echo "Allowed extensions: ".implode(",", $allowed_extensions);
                echo "<br>";
            } 

            $newFileName = md5(time().$fileNameWithoutExt).'.'.$fileExtension;

            $fileSourcePath = $_FILES["fileToUpload"]["tmp_name"];
            $fileDestPath = $dest_path.$newFileName;

            if(!$uploadOk) {
                echo "File was not uploaded";
            } else {
                if(move_uploaded_file($fileSourcePath, $fileDestPath)) {
                    echo "File uploaded successfully";
                } else {
                    echo "Error occurred";
                }
            }
        } else {
            echo "An error occurred";
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <form method="post" enctype="multipart/form-data">
        <input type="text" name="username">
        <input type="file" name="fileToUpload">
        <input type="submit" value="Upload" name="btnFileUpload">
    </form>

</body>
</html>
