        <div class="catalog">
            <div class="margin_block">
                <h2 class="h1_comments">Catalog</h2>
                <div class="line_1"></div>
                <div class="line_2"></div>
                <br>
                <form style="margin-top: 20px;" action="/admin/catalog" method="post">
                    <?php
                    if(isset($_SESSION['info'])){
                        echo '<h1 style="    font-family: \'Open Sans Condensed\', sans-serif;">' . $_SESSION['info'] . '</h1>';
                    }
                    ?>
                    <input type="submit" class="main-sub2" value="Выбрать категорию товара">
                    <select name="categ" class="select-cat">
                        <?php foreach ($category as $k=>$v) {?>
                            <option class="option-cat" value="<?php echo $k?>"><?php echo $v?></option>
                        <?php }?>
                    </select>
                    <hr style="margin-bottom: 30px;">
                    <?php
                    if(isset($_POST['categ'])){
                        while ($row = $res_cat->fetch_assoc()) {
                            if (isset($row['img'])){echo '<img src="'. $row['img'] .'">';}
                            echo '<div class="clearfix"><br><span style="margin-left: 10px;color: #ff4f01;">' . floatALL($row['price']) . '$</span>
                    <a style="margin-left: 10px; font-family: \'Open Sans Condensed\', sans-serif; text-decoration: none; color: #ff4f01;" href="/admin/catalog/edit?id='.$row['id'].'">РЕДАКИРОВАТЬ ТОВАР</a>
                    <input style="float: left; " type="checkbox" name="ids[]" value="' . $row['id'] . '">
                    <a style="margin-left: 10px; font-family: \'Open Sans Condensed\', sans-serif; text-decoration: none; color: #ff4f01;" href="/admin/catalog?action=delete&id=' . $row['id'] . '">УДАЛИТЬ ТОВАР</a>
                    <h4 style="margin-top: 0; margin-left: 10px; float: left;">' . hscALL($row['title']) . '</h4></div>
                    <br>';
                        }
                    }else{
                        echo '<div>Выберите категорию товара</div>';
                    } ?>
                    <br>
                    <a class="main-sub" href="/admin/catalog/add">ДОБАВИТЬ ТОВАР</a>
                    <input class="main-sub2" type="submit" name="delete" value="Удалить Отмеченые Товары">
                    <a class="cat_button" href="/admin/catalog/add_cat">Добавить категорию</a>
                    <a class="cat_button" href="/admin/catalog/edit_cat">Изменить категорию</a>
                </form>
            </div>
        </div>