<?php

$game = q("
        UPDATE `game` SET
        `c_hp` = 10,
        `hp` = 10
         WHERE `user_id` = '" . (int)$_SESSION ['user']['id'] . "'
");
$_SESSION['vis'] = "<h1>Пожалуйста, введите число от 1-ого до 3-ёх</h1>";

