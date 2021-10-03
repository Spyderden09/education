<?php

if(!empty($_POST['add_cat'])){
    q("
        INSERT INTO `catalog_cat` SET 
        `cat`   = '" . mresALL($_POST['add_cat']) ."'
    ");
    $_SESSION['info'] = 'Категория была добавлена';
    header('Location: /admin/catalog');
    exit;
}
