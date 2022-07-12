<div class="antibot_block">
    <h1>Напишите число: <?php echo $r_number; ?></h1>
    <img class="display_hide" src="/images/yes1.png">
    <img class="display_hide" src="/images/no1.png">
    <form action="" method="post" onsubmit="return myNumber()">
        <input type="number" id="antibot_input" name="antibot_inoput" min="1" max="3">
        <input type="submit">
    </form>
</div>