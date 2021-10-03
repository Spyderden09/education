<?php
$res_cat_choose = q("SELECT * FROM `catalog`");
if (isset($_POST['categ'])) {
    $res_cat = q("SELECT * FROM `catalog` WHERE `cat` = '" . mresALL($_POST['categ']) . "'");
} else {
    $res_cat = false;
}
$category = array(
    "1" => "Компьютеры",
    "2" => "Холодильники",
    "3" => "Телефоны",
);