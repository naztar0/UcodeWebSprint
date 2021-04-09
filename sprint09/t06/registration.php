<?php
    require_once("controller/DatabaseConnection.php");
    require_once("model/Model.php");

    echo(file_get_contents("index.html"));
    if (!$_POST)
        die();

    $model = new Model();
    $login = $_POST["login"];
    $password = md5($_POST["password"]);
    $full_name = $_POST["full_name"];
    $email = $_POST["email"];

    if ($model->findLogin($login)) {
        echo("<script>alert('Such login is already occuped!')</script>");
        die();
    }
    if ($model->findEmail($email)) {
        echo("<script>alert('Such email is already used!')</script>");
        die();
    }
    $model->createUser($login, $password, $full_name, $email);
    $model->save();
    echo("<script>alert('You registered successfully!')</script>");
?>