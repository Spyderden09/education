<?php
$res_cat = q("SELECT * FROM `library_authors`");



if (isset($_POST['ids'], $_POST['delete'])) {
    foreach ($_POST['ids'] as $k => $v) {
        $_POST['ids'] [$k] = (int)$v;
    }
    $ids = implode(',', $_POST['ids']);
    q("
        DELETE FROM `library_authors`
        WHERE `id` IN(" . $ids . ")
    ");
    $_SESSION['info_l'] = 'Выбраные Авторы были Удалены';
    header('Location: /admin/library');
    exit();
}
if (isset($_GET['id'])) {
    q("
        DELETE FROM `library_authors`
        WHERE `id` = " . intALL($_GET['id']) . "
    ");

    $_SESSION['info_l'] = 'Автор был Удалён';
    header('Location: /admin/library');
    exit();
}
