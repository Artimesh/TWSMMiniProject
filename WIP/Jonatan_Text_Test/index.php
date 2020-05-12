<?php
session_start();
$_SESSION['user'] = (isset($GET['user']) === true)
 ? (int)$GET['user'] : 0;
?>

<!DOCTYPE html>
<html>
    <head>
        <title>AJAX Chat</title>
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        
        <div class="chat">
            <div class="messages"></div>
            <textarea class="entry" placeholder="Type here and hit Return. Use Shift + Return for a new line"></textarea>
        </div>

        <script src="http://code.jquery.com/jquery-1.8.2.min.js"></script>
        <script src="js/chat.js"></script>
    </body>
</html>