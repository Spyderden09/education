<?php
$game_add = q("
        INSERT INTO `game` SET 
        `user_id` = " . (int)$_SESSION['user']['id'].",
        `hp` = 10, 
        `c_hp` = 10
");