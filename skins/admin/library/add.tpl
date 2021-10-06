<div class="comments">
    <div class="margin_block">
        <h2 class="h1_comments">Add Book</h2>
        <div class="line_1"></div>
        <div class="line_2"></div>
        <br>
        <form action="" method="post" enctype="multipart/form-data">
            <?php if(isset($message_libr)){echo $message_libr;}
            echo nl2br("\n") . nl2br("\n");?>

            <input class="add-input" type="text" name="title" placeholder="Название:">
            <br>
            <input class="add-input" type="number" min="0" max="1000000" name="nump" placeholder="Кол-во стр:">
            <br>
            <p>Авторы:</p>
                <?php foreach ($authors as $k=>$v) {?>
                    <p><input type="checkbox" name="id_author[]" value="<?php echo hscALL($k)?>"> <?php echo hscALL($v)?></p>
                <?php }?>
            <br>
            <textarea class="add-input" type="text" name="description" placeholder="Описание:"></textarea>
            <br>
            <input type="file" name="file">
            <br>
            <input class="add-sub" type="submit" name="add" value="Добавить книгу">
            <br>
        </form>
        <br>
    </div>
</div>