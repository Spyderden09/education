<?php
if (isset($_POST['categ'])) {
    $res_cat = q("SELECT * FROM `catalog` WHERE `cat` = '" . mresALL($_POST['categ']) . "'");
} else {
    $res_cat = false;
}
$categ = q("SELECT * FROM `catalog_cat`");

foreach ($categ as $v){
    $category[$v["id"]] = $v["cat"];
}
