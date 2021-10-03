<div class="catalog_cat">
    <div class="margin_block">
        <h2 class="h1_comments">Catalog</h2>
        <div class="line_1"></div>
        <div class="line_2"></div>
        <br>
        <form action="" method="post" enctype="multipart/form-data">
            <select name="id_cat" class="select-cat-admin">
                <?php foreach ($category as $k=>$v) {?>
                    <option class="option-cat" value="<?php echo $k?>"><?php echo $v?></option>
                <?php }?>
            </select>
            <br>
            <input class="add-input" type="text" name="edit_cat" placeholder="Название:">
            <br>
            <input class="add-sub-cat" type="submit" name="edit" value="Изменить категорию">
            <br>
            <input class="del-sub-cat" type="submit" name="del_cat" value="Удалить категорию">
            <br>
        </form>
</div>
</div>