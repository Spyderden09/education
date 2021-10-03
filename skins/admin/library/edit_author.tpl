<div class="catalog_cat">
    <div class="margin_block">
        <h2 class="h1_comments">Edit Author</h2>
        <div class="line_1"></div>
        <div class="line_2"></div>
        <br>
        <form action="" method="post" enctype="multipart/form-data">
            <?php if (isset($message_libr)){echo $message_libr;}?>
            <?php echo nl2br("\n") . nl2br("\n");?>
            <br>
            <input type="text" class="main-text" name="author" placeholder="Имя/Фамилия автора" value="<?php echo hscALL($row["author"])?>">
            <br>
            <?php echo nl2br("\n") . nl2br("\n");?>
            <input type="number" class="main-num" name="birth" placeholder="Дата рождения автора" max="2017" min="-1000" value="<?php echo hscALL($row["birth"])?>">
            <br>
            <?php echo nl2br("\n") . nl2br("\n");?>
            <input class="edit-sub-author" type="submit" name="edit_author" value="Изменить автора">
            <input class="edit-sub-author" type="submit" name="del_author" value="Удалить автора">
            <br>
        </form>
</div>
</div>