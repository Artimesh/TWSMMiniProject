<?php
    header('Access-Control-Allow-Origin: *'); 
    header('Content-Type: application/json');

    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "chat_users";

    //$message = $_POST['message'];
    $from = 'John';

    $message = isset($_POST['message']) ? $_POST['message'] : null;
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        echo "It's dead";
        die("Connection failed: " . mysqli_connect_error());
    }
    //SQL query.
    $sql = "INSERT INTO `chat` (`message`, `from`) VALUES ('{$message}', '{$from}')";

    //Runs query on database.
    //mysqli_query($conn, $sql);
    if(!empty($message) && !empty($from)){
        //... insert data into the database
        $result['send_status'] = mysqli_query($conn, $sql); 
    }

    $start = isset($_GET['start']) ? intval($_GET['start']) : 0; 
    $sql_select = "SELECT * FROM `chat` WHERE `id` >" . $start;
    $items = mysqli_query($conn, $sql_select);
    if(mysqli_num_rows($items)){
        while($row = mysqli_fetch_assoc($items)){
            $result['items'][] = $row; 
        }
    }

    mysqli_close($conn);
?>