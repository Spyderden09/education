<div class="antibot_block">
    <h1>Напишите число: <?php echo $r_number; ?></h1>
    <img id="yes" class="display_hide" src="/images/yes.png">
    <img id="no" class="display_hide" src="/images/no.png">
    <form action="" method="post" onsubmit="return Antibot('antibot_input',<?php echo $r_number; ?>)">
        <input type="number" id="antibot_input" name="antibot_inoput" min="1" max="3">
        <input type="submit">
    </form>
</div>