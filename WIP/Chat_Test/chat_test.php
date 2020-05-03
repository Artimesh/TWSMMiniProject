<?php

//Connection to database - port, user, password, server name
$db = new mysqli("localhist", "root", "", "messages"); 

//if there's a connection error DIE >:3c
if($db->connect_error){
    die("Connection failed: " . $db->connect_error); 
}

//Define items in the server
$result = array(); 
$Message = isset($_POST['Message']) ? $_POST['Message'] : null; 
$Sender = isset($_POST['Sender']) ? $_POST['Sender'] : null; 


//If both message and sender is empty...
if(!empty($Message) && !empty($Sender)){
    //... insert data into the database 
    $sql = "INSERT INTO 'messages' ('Message', 'Sender') VALUES ('".$Message."','".$Sender."')"; 
    $result['send_status'] = $db->query($sql); 
}

//Print message
$start = isset($_GET['start']) ? intval($_GET['start']) : 0; 
$items = $db->query("SELECT * FROM 'messages' WHERE 'ID' >" . $start); 
while($row = $items->fetch_assoc()){
    $result['items'][] = $row; 
}

//Close connection to database
$db->close(); 

//Idk what this does
header('Access-Control-Allow-Origin: *'); 
header('Content-Type: application/json'); 

echo json_encode($result); 
