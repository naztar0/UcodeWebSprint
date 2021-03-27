<?php
    echo("
    <h1>New Avenger application</h1>
    <form>
        <fieldset>
            <legend>About candidate</legend>
                <p>
                    <span>Name</span>
                    <input type=\"text\" name=\"realName\" placeholder=\"Tell your name\" size=\"18\" autofocus>
                    <span>E-mail</span>
                    <input type=\"text\" name=\"superheroAlias\" placeholder=\"Tell your e-mail\" size=\"18\">
                    <span>Age</span>
                    <input type=\"number\" name=\"age\" min=\"1\" max=\"999\" step=\"1\">
                    <br><br>
                    <span>About</span>
                    <textarea name=\"about\" id=\"about\" cols=\"70\" rows=\"5\" maxlength=\"500\" placeholder=\"Tell about yourself, max 500 symbols\"></textarea>
                    <br>
                </p>
                <p>
                    <span>Your photo:</span>
                    <input type=\"file\" name=\"photo\">
                </p>
        </fieldset>
        <p>
            <button type=\"reset\" value=\"CLEAR\">CLEAR</button>
            <input type=\"button\" value=\"SEND\"/>
        </p>
    </form>
    ");
?>