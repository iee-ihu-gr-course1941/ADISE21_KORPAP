<?php

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
        break;
    case 'board' : 
        switch ($b=array_shift($request)) {
            case '':
            case null: 
                        break;
            case 'change-card': 
                // if($request[0],$request[1],$request[2]);
                        break;
            case 'get-status':
                $game_status = get_status();
                echo json_encode($game_status);
                break;
	    default: header("HTTP/1.1 404 Not Found");
                            break;
			}
            break;
	default:  header("HTTP/1.1 404 Not Found");
                        exit;
}

?>

