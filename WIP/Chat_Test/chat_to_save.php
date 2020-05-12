<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "chat_users";

    $message = $_POST['message'];
    $from = 'John';

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        echo "It's dead";
        die("Connection failed: " . mysqli_connect_error());
    }

    try{    

        //SQL query.
        $sql = "INSERT INTO `chat` (`message`, `from`) VALUES ('{$message}', '{$from}')";

        //Runs query on database.
        mysqli_query($conn, $sql);
        
    }catch(Exception $e){
        echo $e;
    }

?>