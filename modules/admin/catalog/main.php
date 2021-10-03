<?php

$categ = q("SELECT * FROM `catalog_cat`");

foreach ($categ as $v){
    $category[$v["id"]] = $v["cat"];
}


if (isset($_POST['categ'])) {
    $res_cat = q("SELECT * FROM `catalog` WHERE `cat` = '" . mresALL($_POST['categ']) . "'");
} else {
    $res_cat = false;
}

if (isset($_POST['ids'], $_POST['delete'])) {
    foreach ($_POST['ids'] as $k => $v) {
        $_POST['ids'] [$k] = (int)$v;
    }
    $ids = implode(',', $_POST['ids']);
    q("
        DELETE FROM `catalog`
        WHERE `id` IN(" . $ids . ")
    ");
    $_SESSION['info'] = 'Выбраные Товары были Удалены';
    header('Location: /admin/catalog');
    exit();
}

if (isset($_GET['id'])) {
    q("
        DELETE FROM `catalog`
        WHERE `id` = " . intALL($_GET['id']) . "
    ");

    $_SESSION['info'] = 'Товар был Удалён';
    header('Location: /admin/catalog');
    exit();
}
