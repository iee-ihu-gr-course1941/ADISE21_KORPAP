<!DOCTYPE html>
<html lang="en">
<head>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Μουτζούρης</title>
    <link rel="stylesheet" href="/~it154586/ADISE21_KORPAP/css/main.css">
</head>
<header>
    <nav class="">
        <div class="logo">
            <H1>ΜΟΥΤΖΟΥΡΗΣ</H4>
        </div>
        <ul class="nav-links">
            <?php
            if(!isset($_SESSION['token'] )) {
                echo  '<li><a href="/~it154586/ADISE21_KORPAP/authentication/login.php">Login</a></li>';
                } else {
                    echo '<li></li>';;
                }
            ?>
            
            <li><a href="/~it154586/ADISE21_KORPAP/authentication/signup.php">Sign Up</a></li>
            <li><a href="/~it154586/ADISE21_KORPAP/view/about.php">About</a></li>
            <?php

            if(isset($_SESSION['token'] )) {
           echo  '<li><a href="/~it154586/ADISE21_KORPAP/authentication/logout.php">Logout</a></li>';
            } else {
                echo '<li></li>';;
            }
            ?>
        </ul>
    </nav>
</header>

