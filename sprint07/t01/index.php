<?php
    session_start();
    function displayData($data) {
        echo("<h1>Session for new</h1>");
        echo(
        "name : " . $data["realName"] . "<br>" .
        "alias : " . $data["superheroAlias"] . "<br>" .
        "age : " . $data["age"] . "<br>" .
        "description : " . $data["about"] . "<br>" .
        "photo : " . $data["photo"] . "<br>" .
        "level : " . $data["control"] . "<br>" .
        "origin of Powers : " . $data["powers"] . "<br><br>"
        );
        echo("
        <form action=\"index.php\" method=\"post\">
            <input type=\"text\" name=\"forget\" value=\"true\" style=\"display:none;\">
            <input type=\"submit\" value=\"FORGET\">
        </form>");
    }
    if ($_POST) {
        if ($_POST["forget"] == "true") {
            unset($_SESSION["data"]);
            session_destroy();
            echo("Session forgot!");
        }
        else {
            displayData($_POST);
            $_SESSION["data"] = json_encode($_POST);
        }
    }
    else {
        if (isset($_SESSION["data"])) {
            $data = json_decode($_SESSION["data"], true);
            displayData($data);
        }
        else {
            echo("
            <h1>Session for new</h1>
                <form action=\"index.php\" method=\"post\">
                    <fieldset>
                        <legend>About the Superhero</legend>
                            <p>
                                <span>Real Name</span>
                                <input type=\"text\" name=\"realName\" placeholder=\"Superhero real name\" size=\"18\" autofocus>
                                <span>Superhero name</span>
                                <input type=\"text\" name=\"superheroAlias\" placeholder=\"Superhero alias\" size=\"18\">
                                <span>Age</span>
                                <input type=\"number\" name=\"age\" min=\"1\" max=\"999\" step=\"1\">
                                <br><br>
                                <span>About</span>
                                <textarea name=\"about\" id=\"about\" cols=\"70\" rows=\"5\" maxlength=\"500\" placeholder=\"Information about the superhero, max 500 symbols\"></textarea>
                                <br>
                            </p>
                            <p>
                                <span>Photo:</span>
                                <input type=\"file\" name=\"photo\">
                            </p>
                    </fieldset>
                    <fieldset>
                        <legend>Powers</legend>
                            <p>
                                <input type=\"checkbox\">
                                <span>Telekinesis</span>
                                <input type=\"checkbox\">
                                <span>Super strength or speed</span>
                                <input type=\"checkbox\">
                                <span>Shapeshifting</span>
                                <input type=\"checkbox\">
                                <span>Flight</span>
                                <input type=\"checkbox\">
                                <span>Elemental control</span>
                                <input type=\"checkbox\">
                                <span>Other</span>
                                <br>
                            </p>
                            <p>
                                <span>Level of control:</span>
                                <input type=\"range\" name=\"control\" min=\"1\" max=\"10\" step=\"1\" value=\"1\">
                            </p>
                    </fieldset>

                    <fieldset id=\"powers\">
                        <legend>Origin of Powers</legend>
                            <p>
                                <input type=\"radio\" name=\"powers\" value=\"Unknown\">
                                <span>Unknown</span>
                                <input type=\"radio\" name=\"powers\" value=\"Freak lab accident\">
                                <span>Freak lab accident</span>
                                <input type=\"radio\" name=\"powers\" value=\"Choosen by an ancient wise being\">
                                <span>Choosen by an ancient wise being</span>
                                <input type=\"radio\" name=\"powers\" value=\"The superhero is not human\">
                                <span>The superhero is not human</span>
                                <input type=\"radio\" name=\"powers\" value=\"Other\">
                                <span>Other</span>
                            </p>
                    </fieldset>
                    <p>
                    <button type=\"reset\" value=\"CLEAR\">CLEAR</button>
                    <input type=\"submit\" value=\"SEND\">
                    </p>
                </form>
            ");
        }
    }
?>