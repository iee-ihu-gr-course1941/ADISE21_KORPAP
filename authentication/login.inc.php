<?php

if (isset($_POST["submit"])) {
    
    $name = $_POST["name"];

    include('../db/Database.php');
    include('functions_login.php');


    global $mysqli;

    if(emptyInputLogin($name) !== false) {
        header("Location: ./login.php?error=emptyinput");
        exit();
    }

    loginUser($mysqli, $name);

}   else {
        header("Location: ./login.php");
        exit();
}





