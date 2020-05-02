<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "chat_users";

    $Username = $_POST['uname'];
    $Pw = $_POST['pw'];

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM users WHERE Username = '$Username'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array(($result));
    if (mysqli_query($conn, $sql)) {
        if($row['Username'] === $Username and $row['Pw'] === $Pw){
            echo 'Credentials match, logging in...';
            header("Location: //localhost/TWSMMiniProject/WIP/Chat_Page/Chat_Main.php");
        }
    } else {
        echo 'help';
    }

    mysqli_close($conn);
?>