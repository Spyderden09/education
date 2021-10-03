<?php
if(!isset($_GET['id'])){
    $_SESSION['info'] = 'Такой записи нету!';
    header('Location: /admin/catalog');
    exit();
}else{
    $res_cat_edit = q( "SELECT * FROM `catalog` WHERE `id` = ".intALL($_GET['id']));
}
$categ = q("SELECT * FROM `catalog_cat`");

foreach ($categ as $v){
    $category[$v["id"]] = $v["cat"];
}

if (isset($_FILES['file'])) {
    if(IMG::uploader($_FILES['file'])){
        $filename = IMG::resize( 400, 400, 'catalog_400x400');
        $mg_img_upd = q("
                UPDATE `catalog` SET
                `img` = '" . $filename . "'
                WHERE `id` = '" . $_GET['id'] . "'
            ");
    }else{
        $err = IMG::$error;
    }
}

if (isset($_GET['id']) && !empty($_POST['cat']) && !empty($_POST['title']) && !empty($_POST['price'] && !empty($_POST['text']))) {
    foreach ($_POST as $k => $v) {
        $_POST[$k] = trim($v);
    }
    q("
        UPDATE `catalog` SET
        `cat` = '" . mysqli_real_escape_string($link_DB, $_POST['cat']) . "',
        `title` = '" . mysqli_real_escape_string($link_DB, $_POST['title']) . "',
        `text` = '" . mysqli_real_escape_string($link_DB, $_POST['text']) . "',
        `price` = '" . mysqli_real_escape_string($link_DB, $_POST['price']) . "'
        WHERE `id` = '" . $_GET['id'] . "'
    ");

    $_SESSION['info'] = 'Запись была изменена';
    header('Location: /admin/catalog');
    exit();
}
$res_ed = q("SELECT * FROM `catalog` WHERE `id` = " . intALL($_GET['id']));
if (!mysqli_num_rows($res_ed)) {
    $_SESSION['info'] = 'Такой записи нету!';
    header('Location: /admin/catalog');
    exit();
}
$row = mysqli_fetch_assoc($res_ed);
