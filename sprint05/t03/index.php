<?php
    function firstUpper($str = '') {
        if (gettype($str) !== 'string')
            return $str;
        return ucfirst(strtolower(trim($str)));
    }
?>