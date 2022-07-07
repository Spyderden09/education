<?php

$game = q("
                UPDATE `game` SET
                `hp` = 10,
                `c_hp` = 10
                WHERE `user_id` = '" . (int)$_SESSION ['user']['id'] . "'
");
$game_status = "Пожалуйста, введите число от 1-ого до 3-ёх";
echo json_encode($game_status);
exit();
