<div class="comments">
    <div class="margin_block">
        <h2 class="h1_comments">Library</h2>
        <div class="line_1"></div>
        <div class="line_2"></div>
        <br>
        <form action="" method="post" enctype="multipart/form-data">
            <?php if(isset($message_libr)){echo $message_libr;}
            echo nl2br("\n") . nl2br("\n");?>
            <br>
            <input class="add-input" type="text" name="title" value="<?php echo hscALL($row['title']);?>" placeholder="Название:">
            <br>
            <input class="add-input" type="number" min="0" max="1000000" name="nump" placeholder="Кол-во стр:" value="<?php echo hscALL($row['nump']);?>">
            <br>
            <?php if($authors_search->num_rows){?>
                <p>Авторы:</p>
                <?php foreach ($authors as $k=>$v) {
                    $res_authors_ed = q("SELECT * FROM `books_authors` WHERE `author_id` = '". $k ."'");
                    ?>
                    <p><input type="checkbox" name="id_author[]" value="<?php echo hscALL($k)?>" <?php if ($res_authors_ed->num_rows){?> checked="checked"<?php }?>> <?php echo hscALL($v)?></p>
                <?php }?>
                <br>
            <?php }else{
                echo "<p>У этой книги нету автора. СРОЧНО создайте автора и присвойте его этой книге!</p>";
            }?>
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