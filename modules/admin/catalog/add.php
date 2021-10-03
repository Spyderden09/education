<?php
$categ = q("SELECT * FROM `catalog_cat`");

foreach ($categ as $v){
    $category[$v["id"]] = $v["cat"];
}

if(!empty($_POST['price']) && !empty($_POST['cat']) && !empty($_POST['text']) && !empty($_POST['title'])){
    if (isset($_FILES['file'])) {
        if(IMG::uploader($_FILES['file'])){
            $filename = IMG::resize( 300, 300, 'catalog_400x400');
        }else{
            $err = IMG::$error;
        }
    }
    q("
        INSERT INTO `catalog` SET 
        `cat`   = '" . intALL($_POST['cat']) ."',
        `price` = '" . mresALL($_POST['price']) ."',
        `text`  = '" . mresALL($_POST['text']) ."',
        `title` = '" . mresALL($_POST['title']) ."',
        `img` = '". (isset($filename) ? $filename : '') ."'
    ");
    $_SESSION['info'] = 'Запись была добавлена';
    header('Location: /admin/catalog');
    exit;
}
