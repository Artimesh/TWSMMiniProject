<?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $dbname = "chat_users";

    //Check if textfields are empty.
    if("" != trim($_POST['uname']) and "" != trim($_POST['pw']) and "" != trim($_POST['email'])){
        $Username = $_POST['uname'];
        $Pw = $_POST['pw'];
        $Email = $_POST['email'];

        try{       
            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            // Check connection
            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }
            //SQL query
            $sql = "INSERT INTO users (Username, Pw, Email)
            VALUES ('{$Username}', '{$Pw}', '{$Email}')";

            //Tries to run the query.
            if (mysqli_query($conn, $sql)) {
                //successfully created user, then redirects to login page.
                echo "New user created successfully";
                header("refresh:3;url=//localhost/TWSMMiniProject/WIP/NicolaiTesting/nicolaiLogin.php");
            } else {
                //Prints error message and redirects to register page
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                header("refresh:3;url=//localhost/TWSMMiniProject/WIP/NicolaiTesting/nicolaiRegister.php");
            }

            mysqli_close($conn);
        } catch(Exception $e){
            echo $e;
            header("refresh:3;url=//localhost/TWSMMiniProject/WIP/NicolaiTesting/nicolaiRegister.php");
        }
    } else {
        echo 'Please fill in all textfields...';
        header("refresh:3;url=//localhost/TWSMMiniProject/WIP/NicolaiTesting/nicolaiRegister.php");
    }
?>