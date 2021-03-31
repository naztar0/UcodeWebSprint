<?php
    $loads = $_COOKIE["loads"];
    if (!$loads)
        $loads = 0;
    setcookie('loads', ++$loads, time() + 60);
    echo("<h1>Cookie counter</h1>");
    echo("This page was loaded $loads time(s) in last minute");
?>