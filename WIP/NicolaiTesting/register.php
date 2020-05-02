<?php
$servername = "localhost";
$username = "root";
$password = ""; //Currently there is no password, Wooh! SECURITY!
$dbname = "chat_users";

//Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
//Check connection
if($connection->connect_error){
    die("Connection failed: " . $connection->connect_error);
}

$sql = "INSERT INTO 'users'(username, pw, email) VALUES('{$_POST['uname']}','{$_POST['pw']}',' {$_POST['email']}')";

if($connection->query($sql) === TRUE){
    echo "New user created successfully";
} else{
    echo "Error: " . $sql. "<br>" . $connection->error;
}

$connectoin->close();
?>