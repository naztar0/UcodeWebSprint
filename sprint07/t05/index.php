<head>
    <style>
        table {
            border: 1px solid grey;
        }
        td {
            border: 0.5px solid grey;
            padding-left: 5px;
        }
        .hide {
            display: none;
        }
    </style>
</head>
<h1>Parsing CSV data</h1>
<form method="post" enctype="multipart/form-data">
    <span>Upload file:</span>
    <input type="file" name="csvfile" accept=".csv">
    <input type="submit" value="Upload">
</form>
<?php
    if ($_FILES) {
        ini_set("auto_detect_line_endings", true);
        $file = fopen($_FILES["csvfile"]["tmp_name"], "r");
        $arr = [];
        $cols = 0;
        while (($row = fgetcsv($file))) {
            if ($cols === 0)
                $cols = count($row);
            array_push($arr, $row);
        }
        echo("<table cellspacing=\"0\"><tbody>");
        echo("<tr>");
        for ($i = 0; $i < $cols; $i++)
            echo("<td><form method=\"post\"><input class=\"hide\" type=\"text\" name=\"column\" value=\"".$arr[0][$i]."\"><input type=\"submit\" value=\"".$arr[0][$i]."\"></form></td>");
        echo("</tr>");
        for ($i = 1; $i < count($arr); $i++) {
            echo("<tr>");
            for ($j = 0; $j < $cols; $j++)
                echo("<td>".$arr[$i][$j]."</td>");
            echo("</tr>");
        }
        echo("</tbody></table>");
    }
    else if ($_POST) {
        print_r($_POST["column"]);
    }
?>