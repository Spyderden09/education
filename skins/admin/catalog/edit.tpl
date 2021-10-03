<div class="comments">
    <div class="margin_block">
        <h2 class="h1_comments">Catalog</h2>
        <div class="line_1"></div>
        <div class="line_2"></div>
        <br>
        <form action="" method="post" enctype="multipart/form-data">
            <input class="add-input" type="text" name="title" value="<?php echo hscALL($row['title'])?>">
            <br>
            <input class="add-input" type="number" min="0" max="1000000" name="price" value="<?php echo hscALL($row['price'])?>">
            <br>
            <select name="cat" class="select-cat2">
            <?php foreach ($category as $k=>$v) {?>
                <option class="option-cat" value="<?php echo $k?>"><?php echo $v?></option>
            <?php }?>
            </select>
            <br>
            <textarea class="add-input" name="text"><?php
                if(empty($_POST['text'])){
                    echo hscALL($row['text']);
                }else{
                    echo hscALL($_POST['text']);
                }
                ?></textarea>
            <br>
            <input type="file" name="file">
            <?php if(isset($message)){echo $message;}?>
            <br>
            <input class="add-sub" type="submit" name="edit" value="Изменить товар">
            <br>
        </form>
</div>
</div>