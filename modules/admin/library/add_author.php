<?php

if(!empty($_POST["author"]) && !empty($_POST["birth"])){
    q("
        INSERT INTO `library_authors` SET 
        `author`   = '" . mresALL($_POST["author"]) ."',
        `birth`   = '" . mresALL($_POST["birth"]) ."'
    ");
    $_SESSION['info_l'] = 'Автор был добавлен';
    header('Location: /admin/library');
    exit;
}elseif(isset($_POST["add"])){
    $message_libr = "Заполните все поля";
}
