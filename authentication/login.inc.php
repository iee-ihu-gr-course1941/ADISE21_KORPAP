<?php

if (isset($_POST["submit"])) {
    
    $name = $_POST["name"];

    require_once '../db/Database.php';
    require_once 'functions_login.php';

    if(emptyInputLogin($name) !== false) {
        header("location: ./login.php?error=emptyinput");
        exit();
    }

    loginUser($mysqli, $name);

}   else {
        header("location: ./login.php");
        exit();
}





