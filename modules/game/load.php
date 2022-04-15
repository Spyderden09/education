<?php

$game_data = q("
            SELECT *
            FROM `game`
            WHERE `user_id` = '".$_SESSION['user'] ['id']."'
            LIMIT 1
");
if ($game_data->num_rows){
    $_SESSION["game_data"] = $game_data->fetch_assoc();
}else{
    $game_data_add = q("
        INSERT INTO `game` SET 
        `user_id` = '".$_SESSION['user'] ['id']."'
    ");
}


