<?php

    //Connection to database - port, user, password, server name
    $db = new mysqli("127.0.0.1", "root", "", "chat_users"); 

    //if there's a connection error DIE >:3c
    if($db->connect_error){
        die("Connection failed: " . $db->connect_error); 
    }

    //Define items in the server
    $result = array(); 
    $message = isset($_POST['message']) ? $_POST['message'] : null; 
    $from = isset($_POST['from']) ? $_POST['from'] : null; 


    //If both message and sender is empty...
    if(!empty($Message) && !empty($Sender)){
        //... insert data into the database
        $sql = "INSERT INTO 'chat' ('message', 'from') VALUES ('".$message."','".$from."')"; 
        $result['send_status'] = $db->query($sql); 
    }

    //Print message
    $start = isset($_GET['start']) ? intval($_GET['start']) : 0; 
    $items = $db->query("SELECT * FROM 'chat' WHERE 'id' >" . $start); 
    while($row = $items->fetch_assoc()){
        $result['items'][] = $row; 
    }

    //Close connection to database
    $db->close(); 

    //Idk what this does
    header('Access-Control-Allow-Origin: *'); 
    header('Content-Type: application/json'); 

    echo json_encode($result); 
?>