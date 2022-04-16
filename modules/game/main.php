<?php
$user_hp = q("SELECT * FROM `game` WHERE `user_id` = ".$_SESSION['user']['id']);
$user_hp_arr = $user_hp->fetch_assoc();
if (isset($_SESSION['user'])){
    if (!isset($_SESSION['vis'])){
        $_SESSION['vis'] = "<h1>Пожалуйста, введите число от 1-ого до 3-ёх</h1>";
    }
}else{
    header("Location: /");
    exit();
}
