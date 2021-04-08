<?php
    session_start();
    require_once("connection/DatabaseConnection.php");
    require_once("models/Model.php");

    $login = null;
    $password = null;

    if (!$_POST) {
        if (!$_SESSION["login"]) {
            echo(file_get_contents("index.html"));
            die();
        }
        else {
            $login = $_SESSION["login"];
            $password = $_SESSION["password"];
        }
    }
    if ($_POST["logout"]) {
        unset($_SESSION["login"]);
        unset($_SESSION["password"]);
        echo(file_get_contents("index.html"));
        session_destroy();
        die();
    }

    $model = new Model();
    if (!$login)
        $login = $_POST["login"];
    if (!$password)
        $password = md5($_POST["password"]);

    if (!$model->findLogin($login, $password)) {
        echo(file_get_contents("index.html"));
        echo("<script>alert('Login or password is wrong!')</script>");
        die();
    }
    $_SESSION["login"] = $login;
    $_SESSION["password"] = $password;
    echo("<script>alert('You have sign in successfully!')</script>");
    echo("Login: ".$model->login."<br>Full name: ".$model->full_name."<br>Email: ".$model->email."<br>Admin: ".($model->admin ? "true" : "false"));
    echo("<form action='index.php' method='POST'><input type='text' name='logout' style='display:none;'><input type='submit' value='Log out'></form>")
?>