<?php
$user_hp = q("SELECT * FROM `game` WHERE `user_id` = ".$_SESSION['user']['id']);
if ($user_hp->num_rows) {
    $_SESSION["user_hp_arr"] = $user_hp->fetch_assoc();
    echo "<script>myLoad();</script>";
}else{
    echo "<script></script>";
}

