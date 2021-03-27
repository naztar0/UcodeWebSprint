<?php
    namespace Space\Normal;
    use \Datetime;
    function calculate_time() {
        $origin = new DateTime('1939-01-01');
        $target = new DateTime('now');
        return $origin->diff($target);
    }
?>