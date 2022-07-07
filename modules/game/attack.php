<?php
$user_hp = q("SELECT * FROM `game` WHERE `user_id` = " . $_SESSION['user']['id']);
$user_hp = $user_hp->fetch_assoc();
    if (!empty($_POST['attack_user'])) {
        $user_attack = $_POST['attack_user'];
        $attack = rand(1, 4);
        $luck = rand(1, 3);
        if ($luck == $user_attack) {
            $hp["user"] = $user_hp["hp"] - $attack;
            $game = q("
                UPDATE `game` SET
                `hp` = '" . (int)$hp["user"] . "'
                WHERE `user_id` = '" . (int)$_SESSION ['user']['id'] . "' 
            ");
            $_SESSION ['client'] = $hp["user"];
            $hp["status"] = "Ваc ударили и нанесли " . $attack . "ед. урона";
            $hp["bot"] = $user_hp["c_hp"];
        } else {
            $hp["bot"] = $user_hp["c_hp"] - $attack;
            $game = q("
                UPDATE `game` SET
                `c_hp` = '" . (int)$hp["bot"] . "'
                WHERE `user_id` = '" . (int)$_SESSION ['user']['id'] . "'
            ");
            $_SESSION ['bot'] = $hp["bot"];
            $hp["status"] = "Вы ударили и нанесли " . $attack . "ед. урона";
            $hp["user"] = $user_hp["hp"];
        }
    } else {
        $user_attack = false;
        $attack = false;
    }
echo json_encode($hp);
exit();
