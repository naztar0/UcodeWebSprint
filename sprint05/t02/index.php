<?php
    function checkDivision(int $num1 = 1, int $num2 = 60) {
        $div_str = "is divisible by ";
        $arr = [2, 3, 10];
        for ($i=$num1; $i <= $num2; $i++) {
            $res = "The number $i ";
            $oneAtLeast = false;
            for ($j = 0; $j < 3; $j++)
                if ($i % $arr[$j] === 0) {
                    if ($oneAtLeast)
                        $res .= ", ";
                    $res .= $div_str . $arr[$j];
                    $oneAtLeast = true;
                }
            if (!$oneAtLeast)
                $res .= "-";
            $res .= "\n";
            echo($res);
        }
    }
?>