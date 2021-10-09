<?php
$authors_search = q("SELECT * FROM `library_authors` WHERE `book_id` = 0");

foreach ($authors_search as $v){
    $authors[$v["id"]] = $v["author"];
}

if(!isset($_GET['id'])){
    $_SESSION['info_l'] = 'Такой записи нету!';
    header('Location: /admin/library');
    exit();
}else{
    $res_cat_edit = q( "SELECT * FROM `library` WHERE `id` = ".intALL($_GET['id']));
}

if (isset($_FILES['file'])) {
    if(IMG::uploader($_FILES['file'])){
        $filename = IMG::resize( 400, 400, 'library_400x400');
        $mg_img_upd = q("
                UPDATE `library` SET
                `img` = '" . $filename . "'
                WHERE `id` = '" . $_GET['id'] . "'
            ");
    }else{
        $err = IMG::$error;
    }
}

if (isset($_GET['id']) && !empty($_POST['title']) && !empty($_POST['nump']) && !empty($_POST['description']) && !empty($_POST['id_author'])) {
    foreach ($_POST as $k => $v) {
        $_POST[$k] = trim($v);
    }
    q("
        UPDATE `library` SET
        `nump` = '" . intALL($_POST['nump']) ."',
        `description`  = '" . mresALL($_POST['description']) ."',
        `title` = '" . mresALL($_POST['title']) ."'
        WHERE `id` = '" . $_GET['id'] . "'
    ");

    foreach ($_POST["id_author"] as $k=>$v) {
        $authors_add = q("
                SELECT * FROM `library_authors` WHERE
                `id` = '" . mresALL($v) . "'
            ");
        $authors_add = $authors_add->fetch_assoc();
        q("
                UPDATE `library_authors` SET 
                `author`  = '" . mresALL($authors_add["author"]) . "',
                `birth`   = '" . mresALL($authors_add["birth"]) . "'
                WHERE `book_id` = '" . (int)$_GET['id'] . "'
            ");
    }
    $_SESSION['info_l'] = 'Запись была изменена';
    header('Location: /admin/library');
    exit();
}elseif (isset($_POST["edit"])){
    $message_libr = "Заполните все поля";
}
$res_ed = q("SELECT * FROM `library` WHERE `id` = " . intALL($_GET['id']));
if (!$res_ed->num_rows) {
    $_SESSION['info_l'] = 'Такой записи нету!';
    header('Location: /admin/library');
    exit();
}
$row = $res_ed->fetch_assoc();
