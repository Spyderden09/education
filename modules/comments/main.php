<?php
if (isset($_SESSION['user']) || isset($_COOKIE['aa'],$_COOKIE['pass'], $_COOKIE['login'])) {
    $res_sel = mysqli_query($link_DB, "SELECT * FROM `comments`") or exit(mysqli_error($link_DB));
}
