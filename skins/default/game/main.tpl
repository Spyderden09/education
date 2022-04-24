<div class="game-content" id="main-content">
    <div class="margin_block2">
        <form action="" method="post" onsubmit="return myBattle('attack_num')">
            <?php
        if (!empty($_SESSION['vis'])){
            echo $_SESSION['vis'];
        }else{
            echo "<h1>Пожалуйста, введите число от 1-ого до 3-ёх</h1>";
            }
        ?>
             <?php
            echo '<div class="player1">';
            if ($_SESSION['vis'] == "<h1>Ты проиграл</h1>"){
                echo '<img width="150" src="/images/player1_dead.jfif"></div>';
            }else{
                echo '<span class="hp">'. $_SESSION['user_hp_arr']['hp'].'/10</span><br><img width="150" src="/images/player1.jfif"></div>';
            }
              echo '<div class="player2"><br>';
            if ($_SESSION['vis'] == "<h1>Ты победил</h1>"){
                echo '<img width="150" src="/images/player2_dead.jfif"></div>';
            }else{
                echo '<span class="hp">'.$_SESSION['user_hp_arr']['c_hp'].'/10</span><br><img width="150" src="/images/player2.jfif"></div>';
            }
            ?>
            <br>
            <div class="playground" id="playground">
                Введите число от 1-ого до 3-ёх
                <br>
                  <input type="hidden" name="module" value="game">
                <input type="number" id="attack_num" name="attack" min="1" max="3">
                <br>
                <br>
                <input type="submit" name="submit" value=
     </div>
</div>
<div class="loader" id="load_block"><img src="images/loader.gif" width="400"> </div>
<form action="" method="post" onsubmit="return myLoad()">
    <div class="<?=($is_started ? 'display_show' : 'display_hide')?>" id="start_block">
        <img id="start_image" src="images/battle-icon.jpg" width="400">
        <br>
        <input id="start_button" type="submit" name="start-game" class="start-game-button" value="Начать игру">
    </div>
</form>
<?php
$user_hp = q("SELECT * FROM `game` WHERE `user_id` = ".$_SESSION['user']['id']);
if ($user_hp->num_rows) {
    $_SESSION["user_hp_arr"] = $user_hp->fetch_assoc();
    echo "<script>myLoad();</script>";
}else{
    echo "<script>hideShow('start_block')</script>";
}
?>