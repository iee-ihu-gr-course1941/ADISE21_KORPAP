<?php

require_once '../db/Database.php';

function emptyInputSignup($name) {
    $result;
    if(empty($name)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function invalidUid($name) {
    $result;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $name)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function uidExists($mysqli, $name) {

    $sql = "SELECT * FROM players WHERE name = ?;";
    $stmt = mysqli_stmt_init($mysqli);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: login.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($mysqli, $name) {

    $sql = "INSERT INTO players (name) VALUES (?)";
    $stmt = mysqli_stmt_init($mysqli);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: login.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location : signup.php");
    exit();
}

function emptyInputLogin($name) {
    $result;
    if(empty($name)) {
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}

function loginUser($mysqli, $name) {
    $uidExists = uidExists($mysqli, $name, $name);

    if($uidExists === false) {
        header("location: login.php");
        exit();
    } else {
        session_start();
        $_SESSION["playername"] = $uidExists["name"];
        header("location: ../index.php");
        exit();
    }
       
}     