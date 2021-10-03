<?php
if(isset($_GET['hash'])){
    q("
    UPDATE `users` SET
    `active` = 1
    WHERE `hash` = '".mresALL($_GET['hash'])."'
    ");
    $info = "Теперь ваш аккаунт активирован на сайте!";
}else{
    $info = "Вы прошли по не верной ссылке =(";
}


