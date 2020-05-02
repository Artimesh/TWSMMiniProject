<?php
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "users";
$Username = $_POST['uname'];
$Pw = $_POST['pw'];
$Email = $_POST['email'];

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO users (Username, Pw, Email)
VALUES ('{$Username}', '{$Pw}', '{$Email}')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>