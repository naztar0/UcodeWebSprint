<?php
    session_start();
    require_once("controller/DatabaseConnection.php");
    require_once("model/Model.php");
    require_once("view/View.php");

    $login = null;
    $password = null;

    if (!$_SESSION["login"]) {
        echo(file_get_contents("login.html"));
        die();
    }
    else {
        include "login.php";
    }
?>