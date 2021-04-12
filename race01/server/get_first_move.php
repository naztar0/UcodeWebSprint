<?php
    require_once("DatabaseConnection.php");
    require_once("model.php");
    $model = new Model();
    $model->room = intval($_GET["room"]);
    while (!($firstMove = $model->getUserMove()))
        usleep(50);
    die(json_encode(["first_move" => $firstMove]));
?>