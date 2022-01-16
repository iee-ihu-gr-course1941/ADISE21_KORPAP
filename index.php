<?php
require_once './db/Database.php';

session_start();
if(!isset($_SESSION['token'])) {
    header("Location: ./authentication/login.php");
}
if(isset($_SESSION['token'])) {
    if(isset($_SESSION['game_status'])  == 'aborded') {
        header("Location: ./authentication/signup.php");
    }
}
include_once './view/header.php';

?>
<script src="/~it154586/ADISE21_KORPAP/js/main.js"></script>


<body>
    <div class="container">

    <button onclick="start_game()" class="button button--bubble">ΕΝΑΡΞΗ ΠΑΙΧΝΙΔΙΟΥ</button>
    </div>
    <div class="player-name">
    <h4>Όνομα Παίχτη: <?php 
    echo $_SESSION['playername'];
    ?></h4>
    </div>

    <div id="check-players"></div>
</body>
</html>

