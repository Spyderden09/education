<?php
if (isset($_SESSION['user']) || isset($_COOKIE['aa'],$_COOKIE['pass'], $_COOKIE['login'])) {
    $res_sel = q("SELECT * FROM `comments` WHERE `time` < ". $_SESSION['time']);
    if (!empty($_POST["comment"])){
    }

}