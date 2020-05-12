<?php
    header('Access-Control-Allow-Origin: *'); 
    header('Content-Type: application/json'); 
    
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "chat_users";

    $result = array();
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        echo "It's dead";
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM 'chat' WHERE 'id' >" . $start;
    $start = isset($_GET['start']) ? intval($_GET['start']) : 0; 
    $items = mysqli_query($conn, $sql);
    
    while($row = $items->fetch_assoc()){
        $result['items'][] = $row; 
    }

    mysqli_close($conn);
?>