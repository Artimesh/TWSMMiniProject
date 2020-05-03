<?php
    if(isset($_POST['submit'])){
        $file = $_FILES['file'];
        
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError = $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        //Splits the name of the uploaded file, seperator is a period sign.
        $fileExt = explode('.', $fileName);
        $fileActualExt = strtolower(end($fileExt));

        //File extentions that are valid for upload.
        $allowed = array('jpg', 'jpeg', 'png', 'pdf', 'txt', 'doc', 'docx');

        //checks wether or not the file extension is valid for upload.
        if(in_array($fileActualExt, $allowed)) {
            //Checks if there aren't any errors in the file.
            if($fileError === 0){
                //Checks if the file size is lower than a threshold.
                if($fileSize < 500000){

                    $fileNameNew = uniqid('', true).".".$fileActualExt;
                    $fileDestination = 'images/'.$fileNameNew;
                    move_uploaded_file($fileTmpName, $fileDestination);
                    echo 'Upload successful';
                    header("refresh:2;url=//localhost/TWSMMiniProject/WIP/Chat_Page/Chat_Main.html");
                } else {
                    echo 'Your file is too big.';
                    header("refresh:2;url=//localhost/TWSMMiniProject/WIP/Chat_Page/Upload_Files.html");
                }
            } else {
                echo 'There was an error uploading your file';
                header("refresh:2;url=//localhost/TWSMMiniProject/WIP/Chat_Page/Upload_Files.html");
            }
        } else {
            echo 'You cannot upload files of this type';
            header("refresh:2;url=//localhost/TWSMMiniProject/WIP/Chat_Page/Upload_Files.html");
        }
    }
?>