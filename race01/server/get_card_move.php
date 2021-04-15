<?php
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: *");
    header("Access-Control-Allow-Headers: *");
    require_once("DatabaseConnection.php");
    require_once("model.php");
    require_once("cards.php");
    $model = new Model();
    $model->room =  intval($_GET["room"]);
    $card_move = intval($_GET["card_move"]);
    while (!$model->getUserMove() || $model->getUserMove()[0] != $card_move) {
        if (connection_aborted())
            die();
        usleep(50);
    }
    global $allCardsArray;
    $card_id = $model->getUserMove()[1];
    $card_data = null;
    if ($card_id != null)
        $card_data = $allCardsArray[$card_id];
    die(json_encode(["card_data" => $card_data]));
?>