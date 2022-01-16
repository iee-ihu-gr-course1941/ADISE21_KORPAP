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
// Give the shuffled cards into the connected players
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
//Create the whole game and re build the deck cards
function start_game() {
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
// Get the players that they have token
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
// Get the status of the board
function get_status() {
    global $mysqli;

    $sql = "SELECT * FROM game_status WHERE id=0";
    $result = mysqli_query($mysqli,$sql);

    return $result->fetch_assoc();
}

// Inner join the 2 tables cards and deck_cards to give them on the players
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
// Not calling it somewhere
// function game_over() {
//     global $mysqli;

//     $sql = "UPDATE game_status SET status = 'ended' WHERE id = 0 ";
//     $result = mysqli_query($mysqli, $sql);
//     return $result;
// }

// Remove the card from your hand if you match the same cards
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

// Get from your opponent one card
function get_opponent_card($card_id, $my_id, $opponent_id){
    global $mysqli;
    
    $sql = "UPDATE deck_cards SET id_player = $my_id WHERE id_card = $card_id AND id_player = $opponent_id";
    $result = mysqli_query($mysqli, $sql);

    $sql = "UPDATE game_status SET last_change = NOW() WHERE id=0";
    mysqli_query($mysqli, $sql);

    return $result;
}
?>