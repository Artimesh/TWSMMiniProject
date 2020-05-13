<?php

header("Access-Control-Allow-Origin: *"); 
header("Content-Type: application/json"); 
header("Access-Control-Allow-Credentials: true");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization, X-Requested-With");
header("Content-Type: application/json; charset=UTF-8");

    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "chat_users";

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');

    try{       
        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        //SQL query

        //Define items in the server
        $result = array(); 
        $Message = isset($_POST['message']) ? $_POST['message'] : null; 
        $Sender = isset($_POST['from']) ? $_POST['from'] : null; 
        if(!empty($Message) && !empty($Sender)){
            $sql = "INSERT INTO chat ('message', 'from') 
            VALUES ('{$Message}','{$Sender}')";
            
        }

        //Tries to run the query.
        if (mysqli_query($conn, $sql)) {
            $result['send_status'] = mysqli_query($conn,$sql);
            //successfully created user, then redirects to login page.
            echo "Message saved successfully";
            header("refresh:3;url=//localhost/TWSMMiniProject/WIP/LoginRegister/Login.html");
        } else {
            //Prints error message and redirects to register page
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            header("refresh:3;url=//localhost/TWSMMiniProject/WIP/LoginRegister/Register.html");
        }

        $start = isset($_GET['start']) ? intval($_GET['start']) : 0; 
        $sql2 = ("SELECT * FROM messages WHERE ID >" . $start);
        $items = mysqli_query($conn, $sql2); 

        $row = $items->fetch_assoc()
        $result['items'][] = $row; 
        echo $sql2; 
        

        mysqli_close($conn);

        echo json_encode($result); 
    } catch(Exception $e){
        echo $e;
    */ 
?>