<?php
require_once 'db/Database.php';

if(!isset($_SERVER ['PHP_AUTH_USER'])) {
    header("WWW-Authenticate: Basic realm=\"Private Area\"");
    header("HTTP/1.0 404 Unauthorized");
    print "sorry";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Μουτζούρης</title>

    <link rel="stylesheet" href="css/main.css">
    <script src="js/main.js"></script>
</head>
<body>

    <h1>HELLO WORLD!</h1>
    <section class="chat">
        <div class="chathistory"></div>
        <div class="chatbox">
            <form action="" method="POST">
                <textarea name="message" cols="30" rows="10"></textarea>
            </form>    
        </div>
    </section>
</body>
</html>