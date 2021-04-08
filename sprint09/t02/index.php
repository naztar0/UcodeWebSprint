<?php
    require_once("connection/DatabaseConnection.php");
    require_once("models/Model.php");

    if (!$_POST) {
        echo(file_get_contents("index.html"));
        die();
    }

    $model = new Model();
    $email = $_POST["email"];

    $id = $model->findEmail($email);
    if (!$id) {
        echo(file_get_contents("index.html"));
        echo("<script>alert('There is not such email in our DB!')</script>");
        die();
    }
    $model->findId($id);
    $newPass = substr($model->password, 0, 6);
    $model->password = md5($newPass);
    $model->update();
    echo("<script>alert('Email has been sent to your email!')</script>");
    mail($email, "Password reminder", "Your new password: \n".$newPass);
?>