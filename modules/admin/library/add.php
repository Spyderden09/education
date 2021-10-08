<?php
$authors_search = q("SELECT * FROM `library_authors`");
foreach ($authors_search as $v){
    $authors[$v["id"]] = $v["author"];
}
if(!empty($_POST['nump']) && !empty($_POST['description']) && !empty($_POST['id_author']) && !empty($_POST['title'])){
    if (isset($_FILES['file'])) {
        if(IMG::uploader($_FILES['file'])){
            $filename = IMG::resize( 300, 300, 'library_400x400');
        }else{
            $err = IMG::$error;
        }
    }
    q("
        INSERT INTO `library` SET 
        `nump` = '" . (int)$_POST['nump'] ."',
        `description`  = '" . mresALL($_POST['description']) ."',
        `title` = '" . mresALL($_POST['title']) ."',
        `img` = '". (isset($filename) ? $filename : '') ."'
    ");
    $book_id_arr = q("
        SELECT * FROM `library` WHERE
        `nump` = '" . (int)$_POST['nump'] ."' AND
        `description`  = '" . mresALL($_POST['description']) ."' AND
        `title` = '" . mresALL($_POST['title']) ."' 
    ");
    $book_id_arr = $book_id_arr->fetch_assoc();
    $book_id = $book_id_arr["id"];
    foreach ($_POST["id_author"] as $k=>$v) {

        $authors_check = q("
            SELECT * FROM `library_authors` WHERE
            `id` = '" . mresALL($v) . "' AND 
            `book_id` = '0'
        ");
        if ($authors_check->num_rows) {
            q("
                UPDATE `library_authors` SET
                `book_id` = '" . mresALL($book_id) . "'
                WHERE
                `id`  = '" . mresALL($v) . "'
            ");
            $_SESSION['info_l'] = 'Книга была добавлена';
            header('Location: /admin/library');
        } else {
            $authors_add = q("
                SELECT * FROM `library_authors` WHERE
                `id` = '" . mresALL($v) . "'
            ");
            $authors_add = $authors_add->fetch_assoc();
            print_r($authors_add);
            q("
                INSERT INTO `library_authors` SET 
                `author`  = '" . mresALL($authors_add["author"]) . "',
                `birth`   = '" . mresALL($authors_add["birth"]) . "',
                `book_id` = '" . (int)$book_id . "'
            ");
            $_SESSION['info_l'] = 'Книга была добавлена';
            header('Location: /admin/library');
        }
    }
    exit;
}elseif(isset($_POST["add"])){
    $message_libr = "Заполните все поля";
}
