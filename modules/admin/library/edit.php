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

if (isset($_GET['id']) && !empty($_POST['title']) && !empty($_POST['nump']) && !empty($_POST['description']) && !empty($_POST['id_author']) && count($_POST['id_author']) <= 4) {
    q("
        UPDATE `library` SET
        `nump` = '" . intALL($_POST['nump']) ."',
        `description`  = '" . mresALL($_POST['description']) ."',
        `title` = '" . mresALL($_POST['title']) ."'
        WHERE `id` = '" . $_GET['id'] . "'
    ");
    foreach ($_POST["id_author"] as $k=>$v) {
        $res_ed_book = q( "
                    SELECT * FROM `books_authors` WHERE 
                    `author_id`  = '" . (int)$v . "'AND
                    `book_id`   = '" . (int)$_GET["id"] . "'"
                );
        if (!$res_ed_book->num_rows){
            q("
                INSERT INTO `books_authors` SET 
                `author_id`  = '" . (int)$v . "',
                `book_id`   = '" . (int)$_GET["id"] . "'
            ");
        }
    }
    $_SESSION['info_l'] = 'Запись была изменена';
    header('Location: /admin/library');
    exit();
}elseif(isset($_POST["edit"])){
    if (empty($_POST['nump']) || empty($_POST['description']) || empty($_POST['id_author']) || empty($_POST['title'])){
        $message_libr = "Заполните все поля";
    }elseif(count($_POST['id_author']) > 4){
        $message_libr = "Вы указали больше 4 авторов. Укажите 4 или меньше авторов";
    }
}
$res_ed = q("SELECT * FROM `library` WHERE `id` = " . intALL($_GET['id']));
if (!$res_ed->num_rows) {
    $_SESSION['info_l'] = 'Такой записи нету!';
    header('Location: /admin/library');
    exit();
}
$row = $res_ed->fetch_assoc();
