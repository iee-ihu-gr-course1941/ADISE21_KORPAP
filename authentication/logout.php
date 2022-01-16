<?php
session_start();
require_once '../db/Database.php';

function logoutUser($mysqli) {
    global $mysqli;
    $sql = "UPDATE players SET token = '' WHERE name = '{$_SESSION['playername']}'";
    $stmt = mysqli_stmt_init($mysqli);

    $sql = "UPDATE game_status SET status = 'aborded' WHERE id=0";
    mysqli_query($mysqli, $sql);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
    header("location: login.php?error=stmtfailed");
    exit();
    }

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    session_destroy();
    header("location: login.php");
    exit();
}

logoutUser($mysqli);
?>