<?php



if(isset($_SESSION ['bot'], $_SESSION ['client'])) {
if(isset($_GET['atack'])){
    $client_atack = $_GET ['atack'];
    $atack = rand(1, 4);
    $sovpad = rand(1, 3);
    if ($sovpad == $client_atack) {
        $_SESSION ['client'] = $_SESSION ['client'] - $atack;
        $vis = "<h1>Ваc ударили и нанесли ". $atack ."ед. урона</h1>";

    } else {
        $_SESSION ['bot'] = $_SESSION ['bot'] - $atack;
        $vis = "<h1>Вы ударили и нанесли " . $atack . "ед. урона</h1>";
    }
}else{
    $client_atack = false;
    $atack = false;
    $vis = "<h1>Пожалуйста введите число от 1-ого до 3-ёх</h1>";
}
}else{
    $_SESSION ['client'] = 10;
    $_SESSION ['bot'] = 10;
}
if($_SESSION ['client'] <= 0 || $_SESSION ['bot'] <= 0){
    header("Location: /game/gameover");
    exit;
}


