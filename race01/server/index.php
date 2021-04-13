<?
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: *");
    header("Access-Control-Allow-Headers: *");
    require_once("DatabaseConnection.php");
    require_once("model.php");
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);
        if (isset($data["create_room"])) {
            $model = new Model();
            $model->createUserAndRoom($data["username"], $data["avatar"]);
            $model->save();
            die(json_encode(["room" => $model->room]));
        }
        else if (isset($data["join_room"])) {
            $model = new Model();
            $model->createUser($data["room"], $data["username"], $data["avatar"]);
            $model->save();
            $firstMove = $model->getFirstUserMove();
            die(json_encode(["room" => $model->room, "first_move" => $firstMove]));
        }
        else if (isset($data["card_move"])) {
            $room = $data["room"];
            $userNum = $data["user_num"];
            $card = $data["card"];
            // TODO increase rival health etc.
            $model = new Model();
            $model->room = $room;
            $model->updateUserMove($userNum === 1 ? 2 : 1);
            die("ok");
        }
    }
    else if ($_GET) {
        if (isset($_GET["get_rival"])) {
            $model = new Model();
            $model->room = intval($_GET["room"]);
            $model->username = $_GET["username"];
            $rival = $model->getRival();
            die(json_encode(["username" =>  $rival->username, "avatar" => $rival->avatar, "health" => $rival->health, "cards_count" => count($rival->cards)]));
        }
        else if (isset($_GET["get_me"])) {
            $model = new Model();
            $model->room = intval($_GET["room"]);
            $model->username = $_GET["username"];
            $result = $model->getUser($_GET["room"], $_GET["username"]);
            die(json_encode(["username" =>  $result->username, "avatar" => $result->avatar, "health" => $result->health, "cards_count" => $result->cards]));
        }
    }
    else
        echo("123");
?>