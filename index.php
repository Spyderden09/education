<?php
error_reporting(-1);
ini_set('display_errors','on');
header('Content-Type: text/html; charset=utf-8');

session_start();

include_once './config.php';
include_once './libs/default.php';

$link_DB = mysqli_connect(Core::$DB_LOCAL,Core::$DB_LOGIN,Core::$DB_PASS,Core::$DB_NAME);
mysqli_set_charset($link_DB, 'utf8');

include_once './variables.php';

ob_start();
include './'.Core::$CONT.'/allpages.php';
if(!file_exists('./'.Core::$CONT.'/'.$_GET['module'].'/'.$_GET['page'].'.php') || !file_exists('./skins/'.Core::$SKIN.'/'. $_GET['module'].'/'.$_GET['page'].'.tpl')){
    header("Location: /errors/404");
    exit();
}
include './'.Core::$CONT.'/'.$_GET['module'].'/'.$_GET['page'].'.php';
include './skins/'.Core::$SKIN.'/' . $_GET['module'] . '/' . $_GET['page'] . '.tpl';
$content = ob_get_contents();
ob_end_clean();

include './skins/'.Core::$SKIN.'/index.tpl';




