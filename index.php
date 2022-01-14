<?php
require_once 'db/Database.php';

session_start();
if(!isset($_SESSION['token'])) {
    header("location: authentication/login.php");
}
include_once './view/header.php';
?>

<body>
    <div class="container">
    <h1></h1>
    <button onclick="getGameStatus()">Players</button>
    <section class="chat">
        <div class="chathistory"></div>
        <div class="chatbox">
            <form action="" method="POST">
                <textarea name="message" cols="30" rows="10"></textarea>
            </form>    
        </div>
    </section>
    </div>
</body>
<script>
    async function test(){
       const response = await fetch('./db/Moutzouris.php/game-start');
       const data = await response.json();
       console.log(data);
        // .then(res => res.json()).then(data => console.log(data))
    }

    async function getGameStatus(){
        const response = await fetch('./db/Moutzouris.php/board/get-status');
        const data = await response.json();
        console.log(data);
        if (data.status == 'aborded'){
            alert('aborted');
        }
    }

    // setInteval(getGameStatus, 3000);
</script>
</html>

