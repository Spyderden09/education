<?php
    if (!empty($_POST['attack_user'])) {
        $user_attack = $_POST['attack_user'];
        $attack = rand(1, 4);
        $luck = rand(1, 3);
        if ($luck == $user_attack) {
            $hp["user"] = $_SESSION ['client'] - $attack;
            $game = q("
                UPDATE `game` SET
                `hp` = '" . (int)$hp["user"] . "'
                WHERE `user_id` = '" . (int)$_SESSION ['user']['id'] . "'++
            ");
            $_SESSION ['client'] = $hp["user"];
            $_SESSION['vis'] = "<h1>Ваc ударили и нанесли " . $attack . "ед. урона</h1>";
        } else {
            $hp["bot"] = $_SESSION ['bot'] - $attack;
            $game = q("
                UPDATE `game` SET
                `c_hp` = '" . (int)$hp["bot"] . "'
                WHERE `user_id` = '" . (int)$_SESSION ['user']['id'] . "'
            ");
            $_SESSION ['bot'] = $hp["bot"];
            $_SESSION['vis'] = "<h1>Вы ударили и нанесли " . $attack . "ед. урона</h1>";
        }
    } else {
        $user_attack = false;
        $attack = false;
    }
if ($_SESSION ['client'] <= 0 || $_SESSION ['bot'] <= 0) {
    if ($_SESSION['client'] <= 0) {
        $_SESSION['vis'] = "<h1>Ты проиграл</h1>";
        $_SESSION["bot"] = 10;
        $_SESSION["client"] = 10;
        $game = q("
                UPDATE `game` SET
                `c_hp` = 10,
                `hp` = 10
                WHERE `user_id` = '" . (int)$_SESSION ['user']['id'] . "'
            ");

    }
    if ($_SESSION['bot'] <= 0) {
        $_SESSION['vis'] = "<h1>Ты победил</h1>";
        $_SESSION["bot"] = 10;
        $_SESSION["client"] = 10;
        $game = q("
                UPDATE `game` SET
                `c_hp` = 10,
                `hp` = 10
                WHERE `user_id` = '" . (int)$_SESSION ['user']['id'] . "'
            ");
    }
}
echo json_encode($hp);
