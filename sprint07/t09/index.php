<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Marvel API</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
    <?php
        $pubkey = "861a0ec39890386bf4b653bbceda54c1";
        $prikey = "0178127df68c7a7b80464a24b5c06e8c2e3e152f";
        $ts = time();
        $url = "https://gateway.marvel.com:443/v1/public/characters?limit=2&ts=$ts&apikey=$pubkey&hash=".md5($ts.$prikey.$pubkey);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($result, true);

        function createElem($key, $value) {
            echo("
            <div class=\"elem-box\">
                <span class=\"key\">$key</span>
                <span class=\"colon\">:</span>
                <span class=\"value\">$value</span>
            </div>
            ");
        }
        function openContainer($name) {
            echo("<div class=\"data-container\">
            <span class=\"data-text\">$name:</span>");
        }
        function closeContainer() {
            echo("</div>");
        }
        function jsonForeach($arr) {
            foreach ($arr as $key => $value) {
                if (gettype($value) !== "array" && gettype($value) !== "object") {
                    createElem($key, $value);
                }
                else {
                    openContainer($key);
                    jsonForeach($value);
                    closeContainer();
                }
            }
        }
        jsonForeach($json);
    ?>
    </body>
</html>