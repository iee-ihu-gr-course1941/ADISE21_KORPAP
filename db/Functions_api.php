<?php
include ('Database.php');

function shuffle_cards() {

    global $mysqli;
    $sql = "SELECT * FROM cards";

    $result = mysqli_query($mysqli, $sql);

    $cards = array();

    while ($row = $result->fetch_assoc()){
        array_push($cards,$row);
    }

    shuffle($cards);
    return $cards;
}

function deal_cards($cards, $players){
    global $mysqli;

    $i = 1;  
    foreach ($cards as $value) {
        $sql = "INSERT INTO deck_cards VALUES ({$value['id']}, {$players[$i - 1]['id']}, default)";
        mysqli_query($mysqli, $sql);

        if ($i == 1){
             $i = 2;
        } else {
            $i = 1;
        }
    }
}


function start_game(){
    //delete all deck cards
    global $mysqli;

    $sql = "DELETE FROM deck_cards";
    mysqli_query($mysqli, $sql);

    $cards = shuffle_cards();
    $players = get_players();

    if (count($players) == 2){
        deal_cards($cards, $players);
    }
}

function get_players() {

    global $mysqli;

    $sql = "SELECT * FROM players WHERE token != ''";

    $result = mysqli_query($mysqli, $sql);

    $players = array();
    while ($row = $result->fetch_assoc()){
        array_push($players, $row);
    }

    return $players;
}

function get_status(){
    global $mysqli;
    $sql = "SELECT * FROM game_status WHERE id=0";
    $result = mysqli_query($mysqli,$sql);

    return $result->fetch_assoc();
}

?>