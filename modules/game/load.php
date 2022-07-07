<?php
$user_hp = q("SELECT * FROM `game` WHERE `user_id` = " . $_SESSION['user']['id']);
$user_hp = $user_hp->fetch_assoc();
echo json_encode($user_hp);
exit();