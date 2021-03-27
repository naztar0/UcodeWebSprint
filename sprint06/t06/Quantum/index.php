<?php
    function calculate_time() {
        return [11, 11, 30];
    }
    $y = calculate_time()[0];
    $m = calculate_time()[1];
    $d = calculate_time()[2];
    $str = "In quantum space you were absent for $y years, $m months, $d days";
    $html = "<!DOCTYPE html>
<html>

<head>
    <meta charset=\"utf-8\">
    <title>Quantum space</title>
</head>

<body>
    <p>$str</p></body>

</html>\n";
    echo($html);
?>