<?php
    session_start();
?>
<h1>Password</h1>
<?php
    function displayData($hash) {
        echo("
        <form action=\"index.php\" method=\"post\">
            <p>
                Password saved at session.<br>
            </p>
            <p>
                Hash is $hash
            </p>
            <p>
                Try to guess:
                <input name=\"guess\" type=\"text\" placeholder=\"Password to session\">
                <input type=\"submit\" value=\"Check password\">
            </p>
        </form>
        <form action=\"index.php\" method=\"post\">
            <p>
                <input type=\"text\" name=\"clear\" value=\"true\" style=\"display:none;\">
                <input type=\"submit\" value=\"Clear\">
            </p>
        </form>
        ");
    }
    function displayNew() {
        echo("
        <form action=\"index.php\" method=\"post\">
            <p>
                Password not saved at session.<br>
            </p>
            <p>
                Password for saving to session
                <input name=\"password\" type=\"text\" placeholder=\"Password to session\">
            </p>
            <p>
                Salt for saving to session
                <input name=\"salt\" type=\"text\" placeholder=\"Salt to session\">
            </p>
            <p>
                <input type=\"submit\" value=\"Save\">
            </p>
        </form>
        ");
    }
    if ($_POST) {
        if ($_POST["clear"] == "true") {
            unset($_SESSION["salt"]);
            unset($_SESSION["hash"]);
            session_destroy();
            echo("Session cleared!");
        }
        else if (isset($_POST["guess"])) {
            $mHash = crypt($_POST["guess"], $_SESSION["salt"]);
            if ($mHash === $_SESSION["hash"]) {
                echo("<p style=\"color:green;\">Hacked!</p>");
                displayNew();
            }
            else {
                echo("<p style=\"color:red;\">Access denied!</p>");
                displayData($_SESSION["hash"]);
            }
        }
        else {
            $hash = crypt($_POST["password"], $_POST["salt"]);
            $_SESSION["salt"] = $_POST["salt"];
            $_SESSION["hash"] = $hash;
            displayData($hash);
        }
    }
    else {
        if (isset($_SESSION["hash"])) {
            displayData($_SESSION["hash"]);
        }
        else {
            displayNew();
        }
    }
?>