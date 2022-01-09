<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<h2>Login</h2>
<form action="login.inc.php" method="post">
    <input type="text" name="name" placeholder="Name" required>
    <button type="submit" name="submit">Login</button>
</form>

<?php
    if(isset($_GET["error"])) {
        if($_GET["error"] == "emptyinput") {
            echo "<p>Fill in all fields</p>";
        }
     else if($_GET["error"] == "invaliduid") {
        echo "<p>Choose a proper player name</p>";
    } else if($_GET["error"] == "stmtfailed") {
        echo "<p>Something went wrong</p>";
    } else if($_GET["error"] == "usernametaken") {
        echo "<p>Username taken</p>";
    }
    else if($_GET["error"] == "none") {
        echo "<p>You have login</p>";
    }
}
?> 


</body>
</html>