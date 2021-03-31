<h1>Files</h1>
<form action="index.php" method="post">
    <span>File name:</span>
    <input type="text" name="filename">
    <span>Content:</span>
    <textarea name="content"></textarea>
    <input type="submit" value="Create file">
</form>
<?php
    require_once("File.php");
    require_once("FilesList.php");
    if ($_POST) {
        if (isset($_POST["filename"])) {
            $list = new FilesList("tmp");
            $filesList = $list->toList();
            $file = new File($_POST["filename"]);
            $file->write($_POST["content"]);
        }
        else {
            unlink($_POST["filename_del"]);
        }
    }
    $list = new FilesList("tmp");
    $filesList = $list->toList();
    if ($filesList) {
        echo("<h1>List of files:</h1>");
        echo($filesList);
    }
    if ($_GET) {
        $file = new File($_GET["filename"]);
        $content = $file->toList();
        $filename = "tmp/".$_GET["filename"];
        echo("<h1>Selected file: <i>\"$filename\"</i></h1>");
        echo("<form action=\"index.php\" method=\"post\"><input type=\"text\" name=\"filename_del\" value=\"$filename\" style=\"display:none;\">
        <input type=\"submit\" value=\"Delete file\"></form>");
        echo("Content: $content<br>");
    }
?>