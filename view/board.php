<?php
require_once '../db/Database.php';
session_start();
if(!isset($_SESSION['token'])) {
    header("Location: /~it154586/ADISE21_KORPAP/authentication/login.php");
}
include_once '../view/header.php';
?>

<body>
<div class="timer">
    <h4>Χρονόμετρο</h4>
<span id="countdown" style="font-weight: bold;"></span>
</div>
    <div id="opponent-cards"></div>
    <div id="mine-cards"></div>
</body>

<script src='../js/board.js'></script>
