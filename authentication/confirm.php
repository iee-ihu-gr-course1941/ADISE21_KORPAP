<?php

session_start();

require_once '../db/Database.php';


if(empty($_GET['token'])) {
    header("location: login.php");
}

if (empty($_SESSION['token'])) {
    echo "token expired";
    header("location: login.php");
}

$token = $_GET['token'];

if($_SESSION['token'] === $token) {

}