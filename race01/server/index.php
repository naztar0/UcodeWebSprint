<?
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: *");
    header("Access-Control-Allow-Headers: *");
    require_once("DatabaseConnection.php");
    require_once("model.php");
    require_once("cards.php");
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
            $card_id = $data["card_id"];
            $username = $data["username"];
            $model = new Model();
            $model->room = $room;
            $model->username = $username;
            $model->getUser($room, $username);
            $rival_card_id = $model->getUserMove()[1];
            $rival = $model->getRival();
            $win = false;
            if (count($rival->cards) == 0) {
                $rival->health -= $model->cards[$card_id]["attack"];
                if ($rival->health <= 0)
                    $win = true;
            }
            else {
                $rival->cards[$rival_card_id]["health"] -= $model->cards[$card_id]["attack"];
                if ($rival->cards[$rival_card_id]["health"] <= 0)
                    unset($rival->cards[$rival_card_id]);
            }
            $model->mana++;
            $rival->update();
            $model->update();
            $model->updateUserMove($userNum === 1 ? 2 : 1, $card_id);
            die(json_encode(["win" => $win]));
        }
    }
    else if ($_GET) {
        if (isset($_GET["get_rival"])) {
            $model = new Model();
            $model->room = intval($_GET["room"]);
            $model->username = $_GET["username"];
            $rival = $model->getRival();
            die(json_encode(["username" =>  $rival->username, "avatar" => $rival->avatar, "health" => $rival->health, "mana" => $rival->mana, "cards_count" => count($rival->cards)]));
        }
        else if (isset($_GET["get_me"])) {
            $model = new Model();
            $model->room = intval($_GET["room"]);
            $model->username = $_GET["username"];
            $model->getUser($_GET["room"], $_GET["username"]);
            die(json_encode(["username" =>  $model->username, "avatar" => $model->avatar, "health" => $model->health, "mana" => $model->mana, "cards" => $model->cards]));
        }
    }
    else
        echo("123");
?>