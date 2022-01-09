<?php
include ('Database.php');

function shuffle_cards() {

    global $mysqli;
    $sql = "SELECT number, symbol FROM cards";

    $result = mysqli_query($mysqli, $sql);

    $cards = $result->fetch_all();
    shuffle($cards);
    return $cards;
}

function deal_cards($cards){
    $cards_by_user = array();

    for ($i = 0; $i <= count($cards); $i++){
        if ($i % 2 == 0 ){
            array_push($cards_by_user, array('0' => $cards[$i]));
        } else {
            array_push($cards_by_user, array('1' => $cards[$i]));
        }
    }

    // while ($cards_by_user as $key => $card){
    //     if ($key == '0'){
    //         $sql  = "INSERT INTO deck_cards VALUES (default, ,$card)"
    //     }
    // }
}


function start_game(){
    $cards = shuffle_cards();
    deal_cards($cards);
}

?>