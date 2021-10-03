<?php

    $img1 = "<img src='images/computer_dir1.2.jpg' alt='' height='60' width='70' />";
    $img2 = "<img src='images/computer_dir2.2.png' alt='' height='80' width='70'/>";


if(isset($_GET['dir'])){
    $dir = $_GET['dir'];
}else{
    $dir = ".";
}
$home = scandir($dir);