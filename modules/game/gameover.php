<?php

if($_SESSION['client'] <= 0 ){
    $resultover = "<h1>Ты проиграл</h1>";
    $_SESSION ['client'] = 10;
    $_SESSION ['bot'] = 10;
}
if($_SESSION['bot'] <= 0 ){
    $resultover = "<h1>Ты победил</h1>";
    $_SESSION ['client'] = 10;
    $_SESSION ['bot'] = 10;
}
