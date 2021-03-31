<h1>Charset</h1>
<form action="index.php" method="post">
    <p>
        Change charset:
        <input name="input" type="text" placeholder="Input string">
    </p>
    <p>
        Select charset or several charsets:
        <select size="3" multiple name="charsets[]">
            <option value="UTF-8" selected>UTF-8</option>
            <option value="ISO-8859-1">ISO-8859-1</option>
            <option value="Windows-1252">Windows-1252</option>
        </select>
        <input type="submit" value="Change charset">
    </p>
</form>
<form action="index.php" method="post">
    <input type="text" name="clear" value="true" style="display:none;">
    <input type="submit" value="Clear">
</form>
<?php
    if ($_POST) {
        if ($_POST["clear"] == "true") {
            // pass
        }
        else {
            $input = $_POST["input"];
            $charsets = $_POST["charsets"];
            echo("<p>Input string: <textarea placeholder=\"$input\"></textarea></p>");
            foreach ($charsets as $key => $value) {
                $newStr = mb_convert_encoding($input, $value);
                echo("<p>$value: <textarea placeholder=\"$newStr\"></textarea></p>");
            }
        }
    }
?>