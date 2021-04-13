<?php
// nouse
    require_once("../DatabaseConnection.php");
    require_once("../model.php");
    $model = new Model();
    $model->room = intval($_GET["room"]);
    $model->username = $_GET["username"];
    while (!($rival = $model->getRival()))
        usleep(50);
    die(json_encode(["username" =>  $rival->username, "avatar" => $rival->avatar, "health" => $rival->health, "cards_count" => count($rival->cards)]));
?>