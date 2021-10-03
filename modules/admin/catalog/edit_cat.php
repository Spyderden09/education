<?php
$categ = q("SELECT * FROM `catalog_cat`");

foreach ($categ as $v){
    $category[$v["id"]] = $v["cat"];
}
if (isset($_POST['id_cat'])){
    if (!empty($_POST['edit_cat'])) {
        q("
        UPDATE `catalog_cat` SET
        `cat` = '" . mysqli_real_escape_string($link_DB, $_POST['edit_cat']) . "'
        WHERE `id` = '" . $_POST['id_cat'] . "'
    ");

        $_SESSION['info'] = 'Категория была изменена';
        header('Location: /admin/catalog');
        exit();
    }elseif (isset($_POST['del_cat'])){
        q("
        DELETE FROM `catalog_cat`
        WHERE `id` = ".intALL($_POST["id_cat"])."
    ");
        $_SESSION['info'] = 'Категория была удалена';
        header('Location: /admin/catalog');
        exit();
    }
}
