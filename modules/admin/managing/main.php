<?php
$mg_select = q("
                SELECT *
                FROM `users`
            ");
if (isset($_POST['ides'], $_POST['delete_mg'])) {
    foreach ($_POST['ides'] as $k => $v) {
        $_POST['ides'] [$k] = (int)$v;
    }
    $ides = implode(',', $_POST['ides']);
    q("
        DELETE FROM `users`
        WHERE `id` IN(" . $ides . ")
    ");
    $_SESSION['info_mg'] = 'Выбраные Пользователи были Удалены';
    header('Location: /admin/managing');
    exit();
}
if (isset($_GET['id_del'])) {
    q("
        DELETE FROM `users`
        WHERE `id` = " . (int)$_GET['id_del'] . "
    ");

    $_SESSION['info_mg'] = 'Пользователь был Удалён';
    header('Location: /admin/managing');
    exit();
}
