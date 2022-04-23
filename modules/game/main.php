<?php
if  (isset($_SESSION['user'])){
    if (!isset($_SESSION['vis'])){
        $_SESSION['vis'] = "<h1>Пожалуйста, введите число от 1-ого до 3-ёх</h1>";
    }
}else{
    header("Location: /");
}
