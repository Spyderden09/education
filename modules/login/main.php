<?php
$errors = array();
if (isset($_POST['login'], $_POST['pass'], $_POST['email'], $_POST['age']) && !empty($_POST['login']) && !empty($_POST['pass']) && !empty($_POST['email']) && !empty($_POST['age'])) {
    if (isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        if (empty($_POST['login'])) {
            $errors['all'] = 'Заполните все поля';
        } elseif (mb_strlen($_POST['login']) < 2) {
            $errors['login'] = 'Логин слишком короткий';
        } elseif (mb_strlen($_POST['login']) > 14) {
            $errors['login'] = 'Логин слишком длинный';
        } elseif ((!preg_match("#[^A-ZА-Яa-zа-я\d]#u", $_POST['pass'])) || (!preg_match("#\d#u", $_POST['pass'])) || (!preg_match("#[a-zа-я]#u", $_POST['pass'])) || (!preg_match("#[A-ZА-Я]#u", $_POST['pass']))) {
            $errors['pass'] = 'Пароль не правильный';
        } elseif (!preg_match("#^[\w-]+$#u", $_POST['login'])) {
            $errors['login'] = 'Логин имеет сторонние символы';
        }
    } else {
        $errors['email'] = "Email введён не правильно";
    }
    if (!count($errors)) {
        $res = q("
            SELECT `id`
            FROM `users`
            WHERE `login` = '" . mysqli_real_escape_string($link_DB, $_POST['login']) . "'
            LIMIT 1
        ");
        if (mysqli_num_rows($res)) {
            $errors['login'] = 'Такой логин уже занят. Выберите себе другой.';
        }
    }
    if (!count($errors)) {
        $res = q("
            SELECT `id`
            FROM `users`
            WHERE `email` = '" . mysqli_real_escape_string($link_DB, $_POST['email']) . "'
            LIMIT 1
        ");
        if (mysqli_num_rows($res)) {
            $errors['email'] = 'Такой email уже занят. Выберите себе другой.';
        }
    }
    if (!count($errors)) {
        $acc = q("
            INSERT INTO `users` SET 
            `age`       =  " . (int)($_POST['age']) . ",
            `login`     = '" . mysqli_real_escape_string($link_DB, $_POST['login']) . "',
            `pass`      = '" . MyHash($_POST['pass']) . "',
            `email`     = '" . mysqli_real_escape_string($link_DB, $_POST['email']) . "',
            `browse`    = '" . mysqli_real_escape_string($link_DB, $_SERVER['HTTP_USER_AGENT']) . "',
            `ip`        = '" . mysqli_real_escape_string($link_DB, $_SERVER['REMOTE_ADDR']) . "',
            `hash`      = '" . MyHash($_POST['login'] . $_POST['age']) . "' 
        ");
        Mail::$from = 'admin@spyderden.school-php.com';
        Mail::$to = $_POST['email'];
        Mail::$subject = 'Вы зарегистрировались на сайте';
        Mail::$text = 'Пройдите по ссылке для активации аккаунта:' . Core::$DOMAIN . 'login/activate?hash=' . MyHash($_POST['login'] . $_POST['age']) . '';
        Mail::send();
        $account = q("
            SELECT * FROM `users` WHERE
            `age`       = " . (int)$_POST['age'] . " AND
            `login`     = '" . mysqli_real_escape_string($link_DB, $_POST['login']) . "' AND
            `pass`      = '" . MyHash($_POST['pass']) . "'AND
            `email`     = '" . mysqli_real_escape_string($link_DB, $_POST['email']) . "'AND
            `hash`      = '" . MyHash($_POST['login'] . $_POST['age']) . "'
        ");
        mysqli_fetch_assoc($account);
        $_SESSION['user'] = mysqli_fetch_assoc($account);
    }
} else {
    $errors['all'] = 'Заполните все поля';
}

