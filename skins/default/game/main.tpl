<div id="main-content">
    <div class="margin_block2">
        <form class="battle" id="battle" action="" method="post" onsubmit="return myBattle('attack_num')">
            <h1 id='game_status'>Пожалуйста, введите число от 1-ого до 3-ёх</h1>
            <div class="player1">
                <img id="player_dead" class="display_hide" width="150" src="/images/player1_dead.jfif">
                <span class="hp" id="player_hp">10/10</span><img id="player_alive" width="150" src="/images/player1.jfif">
            </div>
            <div class="player2"><br>
                <img id="bot_dead" class="display_hide" width="150" src="/images/player2_dead.jfif">
                <span class="hp" id="bot_hp">10/10</span><img id="bot_alive" width="150" src="/images/player2.jfif">
            </div>
            <br>
            <div class="playground" id="playground">
                <div id="battleground">
                    Введите число от 1-ого до 3-ёх
                    <br>
                    <input type="hidden" name="module" value="game">
                     <input type="number" id="attack_num" name="attack" min="1" max="3">
                    <br>
                    <br>
                    <input type="submit" name="submit" value="Сражаться">
                </div>
                <div onmousedown="myRestart()" class="restart-button">Начать Заново</div>
            </div>
        </form>
      <div class="<?=($is_started_load == 'display_show' ? 'display_show' : 'display_hide')?>" id="load_block"><img src="images/loader.gif" width="400"> </div>
        <div class="<?=($is_started == 'display_show' ? 'display_show' : 'display_hide')?>" id="start_block">
            <img id="start_image" src="images/battle-icon.jpg" width="400">
            <br>
            <div class="start-game-button" onmousedown="return myStartGame()">Начать Игру</div>
        </div>
    </div>
</div>
<div id="game_end" class="game-end"><span id="status"></span><br><div onmousedown="myRestart()" class="restart-button">Начать Заново</div></div>
<?php if ($is_started == 'display_hide'){?>
<script>Load();</script>
<?php }?>
