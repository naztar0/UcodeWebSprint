<?php
    require_once("DatabaseConnection.php");
    require_once("model.php");
    $model = new Model();
    $model->room =  intval($_GET["room"]);
    $model->username = $_GET["username"];
    $card_move = intval($_GET["card_move"]);
    while ($model->getUserMove() == $card_move)
        usleep(50);
    die(json_encode(["status" => "ok"]));
?>