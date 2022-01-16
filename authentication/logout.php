<?php
session_start();
require_once '../db/Database.php';

function logoutUser($mysqli) {
    global $mysqli;
    //Delete token on logout
    $sql = "UPDATE players SET token = '' WHERE name = '{$_SESSION['playername']}'";
    $stmt = mysqli_stmt_init($mysqli);
    //Change game status to aborted when someone is log out
    $game_status_sql = "UPDATE game_status SET status = 'aborded' WHERE id=0";
    mysqli_query($mysqli, $game_status_sql);

    if(!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: login.php?error=stmtfailed");
    exit();
    }

    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    session_destroy();
    header("Location: login.php");
    exit();
}

logoutUser($mysqli);
?>