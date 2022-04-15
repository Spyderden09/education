<?php

$game = q("
        UPDATE `game` SET
        `c_hp` = 10,
        `hp` = 10
         WHERE `user_id` = '" . (int)$_SESSION ['user']['id'] . "'
");


