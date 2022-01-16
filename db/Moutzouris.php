<?php
session_start();
include('Functions_api.php');
require_once "Database.php";
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/', trim($_SERVER['PATH_INFO'],'/'));
$input = json_decode(file_get_contents('php://input'),true);

// if(isset($_SERVER['HTTP_X_TOKEN'])) {
// 	$input['token']=$_SERVER['HTTP_X_TOKEN'];
// }

// header("Content-Type: text/plain");
// print "method = $method";
// print_r($request);

switch ($r=array_shift($request)) {
    case 'game-start' :
        start_game();
        echo json_encode(array('status' => '200'));
        $player_turn = player_turn();
        break;
    case 'get-players' :
        $players = get_players();
        echo json_encode($players);
        break;
    case 'board' : 
        switch ($b=array_shift($request)) {
            case '':
            case null: 
                        break;
            case 'take_card': 
                $take_card = get_opponent_card($request[0],$request[1],$request[2]);
                break;
            case 'remove_card' :
                $remove_card = remove_card($request[0],$request[1],$request[2]);
            case 'get-status':
                global $mysqli;
                $game_status = get_status();
                $cards_by_user = get_player_cards();
                $token = $_SESSION['token'];
                //id of the player
                $sql = "SELECT id FROM players where token = '$token'";
                $result = mysqli_query($mysqli, $sql)->fetch_assoc()['id'];
                echo json_encode(array('status' => $game_status, 'my_id' => $result, 'player_cards' => $cards_by_user));
                break;
	    default: header("HTTP/1.1 404 Not Found");
                            break;
			}
            break;
	default:  header("HTTP/1.1 404 Not Found");
                        exit;
}

?>

