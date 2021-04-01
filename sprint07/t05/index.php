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
        .filter * {
            margin-right: 15px;
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
        $file = fopen($_FILES["csvfile"]["tmp_name"], "r");
        $arr = [];
        $cols = 0;
        while (($row = fgetcsv($file))) {
            if ($cols === 0)
                $cols = count($row);
            array_push($arr, $row);
        }
        fclose($file);
        $file = fopen("tmp", "w");
        foreach ($arr as $key)
            fputcsv($file, $key);
        fclose($file);
        echo("<form method=\"post\" class=\"filter\"><span>Filter:</span><select><option selected>NOT SELECTED</option></select><input type=\"button\" value=\"APPLY\"></form>");
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
        $col = $_POST["column"];
        $filter = $_POST["filter"];
        $file = fopen("tmp", "r");
        $arr = [];
        $cols = 0;
        while (($row = fgetcsv($file))) {
            if ($cols === 0)
                $cols = count($row);
            array_push($arr, $row);
        }
        if (!$filter) {
            for ($i = 0; $i < $cols; $i++)
                if ($arr[0][$i] === $col) {
                    $col = $i;
                    break;
                }
        }
        else {
            $col = explode(",", $filter)[1];
            $filter = explode(",", $filter)[0];
        }
        $uniq = [];
        echo("<form method=\"post\" class=\"filter\"><span>Filter:</span><select name=\"filter\"><option selected>NOT SELECTED</option>");
        for ($i = 1; $i < count($arr); $i++) {
            if (!in_array($arr[$i][$col], $uniq)) {
                array_push($uniq, $arr[$i][$col]);
                echo("<option value=\"".$arr[$i][$col].",".$col."\">".$arr[$i][$col]."</option>");
            }
        }
        echo("</select><input type=\"submit\" value=\"APPLY\"></form>");
        echo("<table cellspacing=\"0\"><tbody>");
        echo("<tr>");
        for ($i = 0; $i < $cols; $i++)
            echo("<td><form method=\"post\"><input class=\"hide\" type=\"text\" name=\"column\" value=\"".$arr[0][$i]."\"><input type=\"submit\" value=\"".$arr[0][$i]."\"></form></td>");
        echo("</tr>");
        for ($i = 1; $i < count($arr); $i++) {
            if (!$filter || $arr[$i][$col] === $filter) {
                echo("<tr>");
                for ($j = 0; $j < $cols; $j++)
                    echo("<td>".$arr[$i][$j]."</td>");
                echo("</tr>");
            }
        }
        echo("</tbody></table>");
    }
?>