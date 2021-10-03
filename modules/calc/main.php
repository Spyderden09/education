<?php

function calc($a,$b,$znak) { // не хватает по умолчанию
    $viv = $a . " " .  $znak . " " . $b . ' = ';

    if ($znak == "/" && $b == 0) {
        return 'На ноль делить нельзя';
    } elseif (empty($a) || empty($b)) {
        return 'Нечего считать';
    }
    if ($znak == "+") {
        $res = $a + $b;
    } elseif ($znak == "-") {
        $res = $a - $b;
    } elseif ($znak == "*") {
        $res = $a * $b;
    } elseif ($znak == "/") {
        $res = $a / $b;
    }
    $ob = $viv . $res;
    return $ob;



    // неправильно


}



