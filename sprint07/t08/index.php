<h1>Show other sites</h1>
<form method="get">
    <input name="url" type="text" placeholder="url">
    <input type="submit" value="go">
    <a href="?back">BACK</a>
</form>
<?php
    if ($_GET) {
        $url = $_GET["url"];
        if ($url) {
            echo("<hr>url: $url<hr>");
            $content = file_get_contents($url);
            $content = substr($content, strpos($content, "<body"), strpos($content, "</body>") - strpos($content, "<body") + 7);
            $content = str_replace("<", "&lt;", $content);
            $content = str_replace(">", "&gt;", $content);
            $content = nl2br($content);
            echo($content);
        }
    }
?>
