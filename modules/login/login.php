<?php
if(isset($_POST['login'],$_POST['pass'])){
    $res = q("
        SELECT *
        FROM `users`
        WHERE `login` = '".mysqli_real_escape_string($link_DB,$_POST['login'])."'
        AND `pass` = '".MyHash($_POST['pass'])."'
        AND `active` = 1
        LIMIT 1
    ");
    if (mysqli_num_rows($res)){
        $_SESSION['user'] = mysqli_fetch_assoc($res);
        $status = 'OK';
        if (isset($_POST['aa']) && $status == 'OK'){
            setcookie('login',$_SESSION['user'] ['login'],time()+3600 * 24 * 30,'/');

            setcookie('id',$_SESSION['user'] ['id'],time()+3600 * 24 * 30,'/');

            setcookie('hash',$_SESSION['user'] ['hash'],time()+3600 * 24 * 30,'/');

            setcookie('aa',$_POST['aa'],time()+3600 * 24 * 30,'/');


            $browse = q("
                UPDATE `users` SET
                `browse` = '". mysqli_real_escape_string($link_DB,$_SERVER['HTTP_USER_AGENT']) ."' 
                WHERE `hash` = '".mysqli_real_escape_string($link_DB,$_SESSION['user'] ['hash'])."'        
                AND `id` = '".(int)$_SESSION['user'] ['id']."'
                AND `active` = 1
            ");
            $ip = q("
                UPDATE `users` SET
                `ip` = '". mysqli_real_escape_string($link_DB,$_SERVER['REMOTE_ADDR']) ."' 
                WHERE `hash` = '".mysqli_real_escape_string($link_DB,$_SESSION['user'] ['hash'])."'
                AND `id` = '".(int)$_SESSION['user'] ['id']."'
                AND `active` = 1
            ");
            header("Location: /login/login");
            exit();
        }
    }else{
        $error = 'Нет пользователя с таким логином или паролем';
    }
}



