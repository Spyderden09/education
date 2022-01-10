<?php
if (isset($_SESSION['user']) || isset($_COOKIE['aa'],$_COOKIE['pass'], $_COOKIE['login'])) {
    $res_sel = q("SELECT * FROM `comments`");
    if (!empty($_POST["comment"])){
        $comment_date = date("F j, Y, g:i a");
        $comment_arr = array(
            'age'         => (int)($_SESSION['user']['age']),
            'comment'     => mresALL($_POST['comment']),
            'login'       => mresALL($_SESSION['user']['login']),
            'email'       => mresALL($_SESSION['user']['email']),
            'destination' => (!empty($_POST["destination"]) ? mresALL($_POST["destination"]) : ''),
            'date'        => mresALL($comment_date)

        );
        json_encode($comment_arr);
        $add_comm = q("
            INSERT INTO `comments` SET 
            `age`       =  " . $comment_arr["age"] . ",
            `comment`     = '" . $comment_arr["comment"] . "',
            `login`      = '" . $comment_arr["login"] . "',
            `email`     = '" . $comment_arr["email"] . "',  
            `destination` = '". $comment_arr["destination"] ."',
            `date` = '". $comment_arr["date"] ."'
        ");
    }
}