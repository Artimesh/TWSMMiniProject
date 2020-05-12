<?php

    header('Access-Control-Allow-Origin: *'); 
    header('Content-Type: application/json'); 
    
    //Connection to database - port, user, password, server name
    $db = new mysqli("localhost", "root", " ", "chat_users"); 

    //if there's a connection error DIE >:3c
    if($db->connect_error){
        echo "it's dead";
        die("Connection failed: " . $db->connect_error); 
    }

    //Define items in the server
    $result = array(); 
    $Message = isset($_POST['message']) ? $_POST['Message'] : null; 
    $Sender = isset($_POST['Sender']) ? $_POST['Sender'] : null; 


    //If both message and sender is empty...
    if(!empty($Message) && !empty($Sender)){
        //... insert data into the database 
        echo 'I want to do stuff to the table.';
        $sql = "INSERT INTO messages ('message', 'from') VALUES ('{$Message}','{$Sender}')"; 
        $result['send_status'] = mysqli_query($db,$sql); 
    }

    //Print message
    echo 'Print stuff?';
    $start = isset($_GET['start']) ? intval($_GET['start']) : 0; 
    $items = $db->query("SELECT * FROM 'messages' WHERE 'ID' >" . $start); 
    while($row = $items->fetch_assoc()){
        $result['items'][] = $row; 
    }

    //Close connection to database
    echo 'closing connection';
    $db->close(); 

    //Idk what this does

    echo json_encode($result); 

/*    $servername = "127.0.0.1";
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
        while($row = $items->fetch_assoc()){
          $result['items'][] = $row; 
        }

        mysqli_close($conn);

        echo json_encode($result); 
    } catch(Exception $e){
        echo $e;
    */ 
?>