<div class="comments">
    <div class="margin_block">
        <h2 class="h1_comments">Add Product</h2>
        <div class="line_1"></div>
        <div class="line_2"></div>
        <br>
        <form action="" method="post" enctype="multipart/form-data">
            <input class="add-input" type="text" name="title" placeholder="Название:">
            <br>
            <input class="add-input" type="number" min="0" max="1000000" name="price" placeholder="Цена:">
            <br>
            <select name="cat" class="select-cat2">
                <?php foreach ($category as $k=>$v) {?>
                    <option class="option-cat" value="<?php echo $k?>"><?php echo $v?></option>
                <?php }?>
            </select>
            <br>
            <textarea class="add-input" type="text" name="text" placeholder="Описание:"></textarea>
            <br>
            <input type="file" name="file">
            <?php if(isset($message)){echo $message;}?>
            <br>
            <input class="add-sub" type="submit" name="add" value="Добавить товар">
            <br>
        </form>
    </div>
</div>