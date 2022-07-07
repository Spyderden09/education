<div class="margin_block2">
<?php
if ($hp['user'] <= 0 || $hp['bot'] <= 0) {
    if ($hp['user'] <= 0) {
        $_SESSION['vis'] = "<h1>Ты проиграл</h1>";
        echo '<script>Hide("battleground");</script>';
    }
    if ($hp['bot'] <= 0) {
        $_SESSION['vis'] = "<h1>Ты победил</h1>";
        echo '<script>Hide("battleground");</script>';
    }
}?>
</div>
