<?php
if (isset($_POST["submit"])) {
    
    $name = $_POST["name"];
    require_once '../db/Database.php';
    require_once 'functions_login.php';

    if(emptyInputSignup($name) !== false) {
        header("location: signup.php?error=emptyinput");
        exit();
    }
    if(invalidUid($name) !== false) {
        header("location: signup.php?error=invaliduid");
        exit();
    }
    if(uidExists($mysqli, $name) !== false){
        header("location: signup.php?error=usernametaken");
        exit();
    }
    createUser($mysqli, $name);
    
} else {
    header("location: login.php");
    exit();
}



