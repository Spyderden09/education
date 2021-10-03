<?php
    if (!empty($_POST["author"]) && !empty($_POST["birth"])) {
        q("
        UPDATE `library_authors` SET
        `author` = '" . mysqli_real_escape_string($link_DB, $_POST["author"]) . "',
        `birth` = '" . mysqli_real_escape_string($link_DB, $_POST["birth"]) . "'
        WHERE `id` = '" . $_GET["id"] . "'
    ");

        $_SESSION['info_l'] = 'Автор был изменен';
        header('Location: /admin/library');
        exit();
    }elseif (isset($_POST['del_author'])){
        q("
        DELETE FROM `library_authors`
        WHERE `id` = ".intALL($_POST["id_author"])."
    ");
        $_SESSION['info_l'] = 'Автор был удален';
        header('Location: /admin/library');
        exit();
    }elseif(isset($_POST["edit_author"])){
        $message_libr = "Заполните все поля";
    }
$res_ed = q("SELECT * FROM `library_authors` WHERE `id` = " . intALL($_GET['id']));
if (!$res_ed->num_rows) {
    $_SESSION['info_l'] = 'Такого Автора нету!';
    header('Location: /admin/library');
    exit();
}
$row = $res_ed->fetch_assoc();