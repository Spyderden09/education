<div class="comments">
    <div class="margin_block">
        <h2 class="h1_comments">Library</h2>
        <div class="line_1"></div>
        <div class="line_2"></div>
        <br>
        <form action="" method="post" enctype="multipart/form-data">
            <?php if(isset($message_libr)){echo $message_libr;}
            echo nl2br("\n") . nl2br("\n");?>
            <select name="id_author" class="select-author-admin">
                <?php foreach ($authors as $k=>$v) {?>
                    <option class="option-cat" value="<?php echo hscALL($k)?>"><?php echo hscALL($v)?></option>
                <?php }?>
            </select>
            <br>
            <input class="add-input" type="text" name="title" value="<?php echo hscALL($row['title']);?>" placeholder="Название:">
            <br>
            <input class="add-input" type="number" min="0" max="1000000" name="nump" placeholder="Кол-во стр:" value="<?php echo hscALL($row['nump']);?>">
            <br>
            <textarea class="add-input" type="text" name="description" placeholder="Описание:"><?php
                if(empty($_POST['description'])){
                    echo hscALL($row['description']);
                }else{
                    echo hscALL($_POST['description']);
                }
                ?></textarea>
            <br>
            <input type="file" name="file">
            <br>
            <input class="add-sub" type="submit" name="edit" value="Изменить книгу">
            <br>
        </form>
</div>
</div>