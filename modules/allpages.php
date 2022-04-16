<?php
    if(isset($_SESSION['user'])){
        $res = q("
            SELECT *
            FROM `users`
            WHERE `id` = '".$_SESSION['user'] ['id']."'
            LIMIT 1
        ");

        if ($_SESSION['user'] ['active'] == 2 && $_GET['page'] != 'log_exit'){
                header("Location: /login/log_exit");
                exit();
            }
    }elseif(isset($_COOKIE['hash'],$_COOKIE['id'],$_COOKIE['aa'])){
        $res = q("
        SELECT *
        FROM `users`
        WHERE `hash` = '".mresALL($_COOKIE['hash'])."'
            AND `id` = '".(int)$_COOKIE['id']."'
            AND `active` = 1
            LIMIT 1
        ");
        $row = mysqli_fetch_assoc($res);
        if ($row['browse'] != $_SERVER['HTTP_USER_AGENT'] || $row['ip'] != $_SERVER['REMOTE_ADDR']){
            setcookie('login','',time()-3600,'/');
            setcookie('pass','',time()-3600,'/');
        }else{
            $_SESSION['user'] = $row;
        }
    }