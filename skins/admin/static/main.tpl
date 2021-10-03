<?php
if (!isset($_SESSION['user']) || $_SESSION['user'] ['access'] != 2){
    include './skins/default/login/login.tpl';
}elseif($_SESSION['user'] ['access'] == 2){
    echo "<div style='text-align: center'><h1>АДМИНКА</h1></div>";
}?>
