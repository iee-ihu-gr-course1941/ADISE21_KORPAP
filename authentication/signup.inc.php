<?php
if (isset($_POST["submit"])) {
    
    $name = $_POST["username"];
    include('../db/Database.php');
    include('functions_login.php');

    global $mysqli;

    if(emptyInputSignup($name) !== false) {
        header("Location: signup.php?error=emptyinput");
        exit();
    }
    if(invalidUid($name) !== false) {
        header("Location: signup.php?error=invaliduid");
        exit();
    }
    if(uidExists($mysqli, $name) !== false){
        header("Location: signup.php?error=usernametaken");
        exit();
    }

    createUser($mysqli, $name);
    
} else {
    header("Location: login.php");
    exit();
}


