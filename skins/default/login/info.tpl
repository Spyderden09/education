<?php if (isset($_SESSION["user"]) || isset($_COOKIE['aa'],$_COOKIE['pass'], $_COOKIE['login'])){
    echo "<h1 style='text-align: center;'>Ваша авторизация прошла успешно!</h1>";
}
if (isset($_SESSION["error"])){
    echo "<h1 style='text-align: center;'>".$_SESSION["error"]."</h1>";
}?>
































