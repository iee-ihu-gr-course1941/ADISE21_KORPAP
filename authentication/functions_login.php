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

    $token = token();
    $sql = "INSERT INTO players VALUES (default,'$name',NOW(),'',0)";
    $stmt = mysqli_stmt_init($mysqli);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: login.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location : login.php");
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

function token($length = 20)
{
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;

}

function loginUser($mysqli, $name) {

    session_start();
    $uidExists = uidExists($mysqli, $name, $name);
 
    if($uidExists === false && isset($_SESSION['token'])) {
        header("location: ./login.php");
        exit();
    } else {
        $_SESSION['token'] = token();
        $_SESSION['id_player'] = $uidExists['id'];
        $sql = "UPDATE players SET token = '{$_SESSION['token']}' WHERE id = {$uidExists['id']}";
        $stmt = mysqli_stmt_init($mysqli);

        if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ./login.php?error=stmtfailed");
        exit();
        }

        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $_SESSION["playername"] = $uidExists["name"];
        header("location: ../index.php");
        exit();
    }
       
}



