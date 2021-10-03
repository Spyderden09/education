<?php

if (!empty($_POST['login_pr_ed'])) {
    $mg_check_login = q("
            SELECT *
            FROM `users`
            WHERE `login` = '" . mysqli_real_escape_string($link_DB, $_POST['login_pr_ed']) . "'
            AND id <> ". (int)$_SESSION ['user']['id'] ."
        ");
    if ($mg_check_login->num_rows($mg_check_login)) {
        $_SESSION['info_pr'] = 'Такой логин уже занят.';
        $err = 'Такой логин уже занят.';
    }

    if (!isset($err)) {
        $mg_upd = q("
            UPDATE `users` SET
            `login` = '" . mysqli_real_escape_string($link_DB, $_POST['login_pr_ed']) . "'
            WHERE `id` = '" . (int)$_SESSION ['user']['id'] . "'
            AND `active` = 1
        ");

        if (!empty($_POST['pass_pr_ed'])){
            $mg_upd_pass = q("
            UPDATE `users` SET
            `pass` = '" . MyHash($_POST['pass_pr_ed']) . "'  
            WHERE `id` = '" . (int)$_SESSION ['user']['id'] . "'
            AND `active` = 1
        ");
        }
        $_SESSION['info_pr'] = 'Пользователь был изменён';
    }
}
if (isset($_FILES['file'])) {
    if(IMG::uploader($_FILES['file'])){
        $filename = IMG::resize( 100, 100, 'user_100x100');
            $mg_img_upd = q("
            UPDATE `users` SET
            `img` = '" . $filename . "'
            WHERE `id` = '" . (int)$_SESSION ['user']['id'] . "'
            AND `active` = 1
        ");
    }else{
        $err = IMG::$error;
    }
}
//<img src=\"' . $filename . '\">


