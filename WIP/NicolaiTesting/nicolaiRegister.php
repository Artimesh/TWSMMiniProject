<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="nicolaiTest.css" rel="stylesheet" type="text/css">
    <title>Register</title>
</head>
<body>
    <div class="centered">
        <form action="//localhost/TWSMMiniProject/WIP/NicolaiTesting/register2.php" method="post">
            <fieldset>
                <legend>Register</legend>
                <label for="uname">Choose Username:</label>
                <input type="text" id="uname" name="uname"></br></br>
                <label for="pw">Choose Password:</label>
                <input type="password" id="pw" name="pw"></br></br>
                <label for="rpw">Repeat Password:</label>
                <input type="password" id="rpw" name="rpw"></br></br>
                <label for="email">Enter Email:</label>
                <input type="text" id="email" name="email"></br></br>
                <input class="textfont" type="submit" value="Register">
                <a href="nicolaiLogin.php">Cancel</a>
            </fieldset>
        </form>
    </div>
</body>
</html>