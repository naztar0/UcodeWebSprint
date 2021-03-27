<?php
    echo('<table><tbody>');
    echo('<tr><td>SCRIPT_NAME</td><td>' . $_SERVER['SCRIPT_NAME'] . "</td></tr>");
    echo('<tr><td>argv</td><td>' . $_SERVER['argv'] . "</td></tr>");
    echo('<tr><td>HTTP_HOST</td><td>' . $_SERVER['HTTP_HOST'] . "</td></tr>");
    echo('<tr><td>SERVER_NAME</td><td>' . $_SERVER['SERVER_NAME'] . "</td></tr>");
    echo('<tr><td>SERVER_PROTOCOL</td><td>' . $_SERVER['SERVER_PROTOCOL'] . "</td></tr>");
    echo('<tr><td>REQUEST_METHOD</td><td>' . $_SERVER['REQUEST_METHOD'] . "</td></tr>");
    echo('<tr><td>HTTP_USER_AGENT</td><td>' . $_SERVER['HTTP_USER_AGENT'] . "</td></tr>");
    echo('<tr><td>REMOTE_ADDR</td><td>' . $_SERVER['REMOTE_ADDR'] . "</td></tr>");
    echo('<tr><td>SCRIPT_NAME</td><td>' . $_SERVER['SCRIPT_NAME'] . "</td></tr>");
    echo('<tr><td>PARAMETERS</td><td>');
    foreach ($_SERVER['argv'] as $value)
        echo($value);
    echo("</td></tr>");
    echo('</body></table>')
?>