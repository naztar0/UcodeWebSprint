<?php
    function calculate_time() {
        $origin = new DateTime('1939-01-01');
        $target = new DateTime('now');
        $interval = $origin->diff($target);
        return $interval;
    }
    $y = calculate_time()->format('%Y');
    $m = calculate_time()->format('%m');
    $d = calculate_time()->format('%d');
    $str = "In real life you were absent for $y years, $m months, $d days";
    $html = "<!DOCTYPE html>
<html>

<head>
    <meta charset=\"utf-8\">
    <title>Normal space</title>
</head>

<body>
    <p>$str</p></body>

</html>\n";
    echo($html);
?>