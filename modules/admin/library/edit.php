<?php
$authors_search = q("SELECT * FROM `library_authors`");

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

    $libr_cat_id_arr = q("
            SELECT * FROM `library_authors` WHERE `book_id` = '". intALL($_GET["id"]) ."' 
            LIMIT 1
    ");
    $libr_cat_id_arr = $libr_cat_id_arr->fetch_assoc();
    $libr_cat_id = $libr_cat_id_arr["id"];
    $libr_author_arr = q("
            SELECT * FROM `library_authors` WHERE `book_id` = '". intALL($_POST["id_author"]) ."' 
            LIMIT 1
    ");
    $libr_author_arr = $libr_author_arr->fetch_assoc();
    q("
        UPDATE `library_authors` SET
        `author` = '". mresALL($libr_author_arr["author"])."',
        `birth` = '". mresALL($libr_author_arr["birth"])."'
        WHERE `book_id` = '". intALL($_GET["id"]) ."' AND `id` = '". intALL($libr_cat_id) ."'
    ");
    $_SESSION['info_l'] = 'Запись была изменена';
    header('Location: /admin/library');
    exit();
}elseif (isset($_POST["edit"])){
    $message_libr = "Заполните все поля";
}
$res_ed = q("SELECT * FROM `library` WHERE `id` = " . intALL($_GET['id']));
$res_authors_ed = q("SELECT * FROM `library_authors` WHERE `book_id` = " . intALL($_GET['id']));
if (!$res_ed->num_rows) {
    $_SESSION['info_l'] = 'Такой записи нету!';
    header('Location: /admin/library');
    exit();
}
$row = $res_ed->fetch_assoc();
$row_authors = $res_authors_ed->fetch_assoc();
