<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="nicolaiTest.css" rel="stylesheet" type="text/css">
    <title>Login</title>
</head>
<body>
    <div class="centered">
        <form action="//localhost/TWSMMiniProject/WIP/NicolaiTesting/login.php" method="POST">
            <fieldset>
                <legend>Login</legend>    
                <label for="uname">Username:</label>
                <input type="text" id="uname" name="uname"></br></br>
                <label for="pw">Password:</label>
                <input type="password" id="pw" name="pw"></br></br>
                <input class="textfont" type="submit" value="Connect">
                <a href="nicolaiRegister.php">Register</a>            
            </fieldset>
        </form>
    </div>
</body>
</html>