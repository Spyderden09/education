<div class="game-content" id="main-content">
    <div class="margin_block2">
        <form action="" method="post" onsubmit="return myBattle('attack_num')">
            <?php
        if (isset($_SESSION['vis'])){
            echo $_SESSION['vis'];
        }else{
            echo "<h1>Пожалуйста, введите число от 1-ого до 3-ёх</h1>";
        }
        ?>
            <?php
            echo '<div class="player1"><span class="hp">'.$hp_player.'/10</span><br>';
            if ($_SESSION['vis'] == "<h1>Ты проиграл</h1>"){
                echo '<img width="150" src="/images/player1_dead.jfif"></div>';
            }else{
                echo '<img width="150" src="/images/player1.jfif"></div>';
            }
            echo '<div class="player2"><span class="hp">'.$hp_bot.'/10</span><br>';
            if ($_SESSION['vis'] == "<h1>Ты победил</h1>"){
                echo '<img width="150" src="/images/player2_dead.jfif"></div>';
            }else{

                echo '<img width="150" src="/images/player2.jfif"></div>';
            }
            ?>
            <br>
            <div class="playground">
                Введите число от 1-ого до 3-ёх
                <br>
                <input type="hidden" name="module" value="game">
                <input type="number" id="attack_num" name="attack" min="1" max="3">
                <br>
                <br>
                <input type="submit" name="submit" value="Сражаться">
                <form action="" method="post" onsubmit="return myRestart()">
                    <input type="submit" name="restart" value="Начать заново">
                </form>
            </div>
        </form>
    </div>
</div>
<div class="loader" id="load_block"><img src="images/loader.gif" width="400"> </div>
<form action="" method="post" onsubmit="return startGame('start_block','load_block')">
    <div class="start-game" id="start_block">
        <img id="start_image" src="images/battle-icon.jpg" width="400">
        <br>
        <input id="start_button" type="submit" name="start-game" class="start-game-button" value="Начать игру">
    </div>
</form>