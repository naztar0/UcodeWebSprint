<h1>Notepad mini</h1>
<form action="index.php" method="post">
    <input type="text" name="name" placeholder="Name"><br><br>
    <select name="importance">
        <option>low</option>
        <option>medium</option>
        <option>high</option>
    </select><br><br>
    <textarea name="text" placeholder="Text of note..."></textarea><br><br>
    <input type="submit" value="Create"><br><br>
</form>
<?php
    require_once("Note.php");
    require_once("NotePad.php");
    if ($_POST) {
        $note = new Note($_POST["name"], $_POST["importance"], $_POST["text"]);
    }
    $list = new NotePad();
    $list = $list->toList();
    if ($list)
        echo("<h1>List of notes:</h1>$list");
    if ($_GET) {
        $note = new Note();
        if (isset($_GET["delete"])) {
            $note->delete($_GET["delete"]);
        }
        else {
            $note = $note->read($_GET["name"]);
            echo("<h1>Detail of \"".$_GET["name"]."\"</h1>" .
                "<ul><li>date: <b>" . $note["date"] . "</b>" .
                "<li>name: <b>" . $_GET["name"] . "</b>" .
                "<li>importance: <b>" . $note["importance"] . "</b>" .
                "<li>text: <b>" . $note["text"] . "</b></ul>"
            );
        }
    }
?>