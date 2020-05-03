<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "chat_users";

    $cookie_name = "username";

    $Username = $_POST['uname'];
    $Pw = $_POST['pw'];

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

        //tries to run the query.
    try{    
        //SQL query.
        $sql = "SELECT * FROM users WHERE Username = '$Username'";
        //Saves query in result variable
        $result = mysqli_query($conn, $sql);
        //stores row from result in row variable.
        $row = mysqli_fetch_array(($result));
    } catch(Exception $e){
        echo $e;
        echo 'something went wrong :(';
        header("refresh:3;url=//localhost/TWSMMiniProject/WIP/NicolaiTesting/nicolaiLogin.php");
    }
    //Checks if the typed username and password matches the stored username/password.
    if($row['Username'] === $Username and $row['Pw'] === $Pw){
        echo 'Credentials match, logging in...';
        
        //Creates cookie which saves username
        setcookie($cookie_name, $Username, time() + (86400 * 30), "/"); //Cookie expires after 30 days.

        //redirects to the chat.
        header("refresh:3;url=//localhost/TWSMMiniProject/WIP/Chat_Page/Chat_Main.php");
    }else{
        echo 'Credential mismatch.. BYEEEE';
        //redirects to the login page.
        header("refresh:3;url=//localhost/TWSMMiniProject/WIP/NicolaiTesting/nicolaiLogin.php");
    }

    mysqli_close($conn);
?>