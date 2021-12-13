<?php
if(isset($_POST['login'],$_POST['pass'])){
    $res = q(" 
        SELECT *
        FROM `users`
        WHERE `login` = '".mresALL($_POST['login'])."'
        AND `pass` = '".MyHash($_POST['pass'])."'
        AND `active` = 1
        LIMIT 1
    ");
    if ($res->num_rows){
        $_SESSION['user'] = $res->fetch_assoc();
        $status = 'OK';
        if (isset($_POST['aa']) && $status == 'OK'){
            setcookie('login',$_SESSION['user'] ['login'],time()+3600 * 24 * 30,'/');

            setcookie('id',$_SESSION['user'] ['id'],time()+3600 * 24 * 30,'/');

            setcookie('hash',$_SESSION['user'] ['hash'],time()+3600 * 24 * 30,'/');

            setcookie('aa',$_POST['aa'],time()+3600 * 24 * 30,'/');


            $browse = q("
                UPDATE `users` SET
                `browse` = '". mresALL($_SERVER['HTTP_USER_AGENT']) ."' 
                WHERE `hash` = '".mresALL($_SESSION['user'] ['hash'])."'        
                AND `id` = '".(int)$_SESSION['user'] ['id']."'
                AND `active` = 1
            ");
            $ip = q("
                UPDATE `users` SET
                `ip` = '". mresALL($_SERVER['REMOTE_ADDR']) ."' 
                WHERE `hash` = '".mresALL($_SESSION['user'] ['hash'])."'
                AND `id` = '".(int)$_SESSION['user'] ['id']."'
                AND `active` = 1
            ");
        }
        header("Location: /login/info");
        exit();
    }else{
        $_SESSION["error"] = 'Нет пользователя с таким логином или паролем';
        header("Location: /login/info");
        exit();
    }
}



