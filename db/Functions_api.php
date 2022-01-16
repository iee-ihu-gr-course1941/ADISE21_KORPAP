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

function deal_cards($cards, $players) {
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

function start_game() {
    //delete all deck cards
    global $mysqli;

    $sql = "DELETE FROM deck_cards";
    mysqli_query($mysqli, $sql);

    $sql = "UPDATE game_status SET status = 'started' WHERE id=0";
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

function get_status() {
    global $mysqli;

    $sql = "SELECT * FROM game_status WHERE id=0";
    $result = mysqli_query($mysqli,$sql);

    return $result->fetch_assoc();
}

function get_player_cards(){
    global $mysqli;

    $sql = "SELECT * FROM deck_cards INNER JOIN cards ON deck_cards.id_card = cards.id";
    $result = mysqli_query($mysqli, $sql);

    $cards = array();
    while ($row = $result->fetch_assoc()){
        array_push($cards,$row);
    }

    $cards_by_user = array();
    foreach ($cards as $value) {
        $cards_by_user[$value['id_player']][] = $value;
    }
    return $cards_by_user;
}

function game_over() {
    global $mysqli;

    $sql = "UPDATE game_status SET status = 'ended' WHERE id = 0 ";
    $result = mysqli_query($mysqli, $sql);
    return $result;
}

function player_turn() {
    global $mysqli;

    $sql = "SELECT id FROM players WHERE token != '' ";
    $result = mysqli_query($mysqli, $sql);
    $player_turn = array();

    $count = 1;

    while($row = $result -> fetch_assoc()) {
        array_push($player_turn, array($row['id'] => $count));
        $sql = "UPDATE players SET player_turn='$count' WHERE id = '{$row['id']}'";
        mysqli_query($mysqli, $sql);
        $count++;
    }
    return $player_turn;
}

function remove_card($player_id, $id_card1, $id_card2) {
    session_start();
    global $mysqli;

    $sql = "DELETE FROM deck_cards WHERE id_card = '$id_card1' AND id_player='{$_SESSION['id_player']}'";
    $result = mysqli_query($mysqli, $sql);
    $sql = "DELETE FROM deck_cards WHERE id_card = '$id_card2' AND id_player='{$_SESSION['id_player']}'";
    $result = mysqli_query($mysqli, $sql);

    $sql = "UPDATE game_status SET last_change = NOW() WHERE id=0";
    mysqli_query($mysqli, $sql);

    return $result;
    
}

function get_opponent_card($card_id, $my_id, $opponent_id){
    global $mysqli;
    
    $sql = "UPDATE deck_cards SET id_player = $my_id WHERE id_card = $card_id AND id_player = $opponent_id";
    $result = mysqli_query($mysqli, $sql);

    $sql = "UPDATE game_status SET last_change = NOW() WHERE id=0";
    mysqli_query($mysqli, $sql);

    return $result;
}
?>