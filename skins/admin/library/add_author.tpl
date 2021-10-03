<div class="comments">
    <div class="margin_block">
        <h2 class="h1_comments">Add Author</h2>
        <div class="line_1"></div>
        <div class="line_2"></div>
        <br>
        <form action="" method="post">
            <?php if (isset($message_libr)){echo $message_libr;}
            echo nl2br("\n").nl2br("\n").nl2br("\n");?>
            <input type="text" class="main-text" name="author" placeholder="Имя/Фамилия автора">
            <br>
            <?php echo nl2br("\n");?>
            <?php echo nl2br("\n");?>
            <input type="number" class="main-num" name="birth" placeholder="Дата рождения автора" max="2017" min="-1000">
            <br>
            <?php echo nl2br("\n");?>
            <?php echo nl2br("\n");?>
            <input class="add-sub-cat" type="submit" name="add" value="Добавить автора">
            <br>
        </form>
        <br>
    </div>
</div>