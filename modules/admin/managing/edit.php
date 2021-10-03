<?php
if(!isset($_GET['id'])){
    $_SESSION['info'] = 'Такого Пользователя нету!';
    header('Location: /admin/managing');
    exit();
}
$res_ed = q( "SELECT * FROM `users` WHERE `id` = " . intALL($_GET['id']));
if(!mysqli_num_rows($res_ed)){
    $_SESSION['info'] = 'Такой записи нету!';
    header('Location: /admin/managing');
    exit();
}
$row = mysqli_fetch_assoc($res_ed);

if (isset($_FILES['file'])) {
    if(IMG::uploader($_FILES['file'])){
        $filename = IMG::resize( 100, 100, 'user_100x100');
        $mg_img_upd = q("
            UPDATE `users` SET
            `img` = '" . $filename . "'
            WHERE `id` = '" . (int)$_GET['id'] . "'
            AND `active` = 1
        ");
    }else{
        $err = IMG::$error;
    }
}
if (!empty($_POST['login_mg_ed']) && !empty($_POST['email_mg_ed']) && !empty($_POST['access_mg_ed'])) {
    $mg_check_email = q("
            SELECT *
            FROM `users`
            WHERE `email` = '" . mysqli_real_escape_string($link_DB, $_POST['email_mg_ed']) . "'
            AND id <> ". (int)$row['id'] ."
        ");
    if (mysqli_num_rows($mg_check_email)) {
        $_SESSION['info_mg'] = 'Такой email уже занят.';
        $err = 'Такой email уже занят.';
    }
    $mg_check_login = q("
            SELECT *
            FROM `users`
            WHERE `login` = '" . mysqli_real_escape_string($link_DB, $_POST['login_mg_ed']) . "'
            AND id <> ". (int)$row['id'] ."
        ");
    if (mysqli_num_rows($mg_check_login)) {
        $_SESSION['info_mg'] = 'Такой логин уже занят.';
        $err = 'Такой логин уже занят.';
    }

    if (!isset($err)) {
        $mg_upd = q("
            UPDATE `users` SET
            `email` = '" . mysqli_real_escape_string($link_DB, $_POST['email_mg_ed']) . "',
            `login` = '" . mysqli_real_escape_string($link_DB, $_POST['login_mg_ed']) . "',  
            `access` = '" . mysqli_real_escape_string($link_DB, $_POST['access_mg_ed']) . "'  
            WHERE `id` = '" . (int)$_GET['id'] . "'
            AND `active` = 1
        ");

        if (!empty($_POST['pass_mg_ed'])){
            $mg_upd_pass = q("
            UPDATE `users` SET
            `pass` = '" . MyHash($_POST['pass_mg_ed']) . "'  
            WHERE `id` = '" . (int)$_GET['id'] . "'
            AND `active` = 1
        ");
        }
        $_SESSION['info_mg'] = 'Пользователь был изменён';
        header('Location: /admin/managing');
        exit();
    }
}

