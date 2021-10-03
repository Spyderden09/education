<?php
if (!isset($_SESSION['user']) || $_SESSION['user'] ['access'] != 2){
    include './modules/login/login.php';
}?>
