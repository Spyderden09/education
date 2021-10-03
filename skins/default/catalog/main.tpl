        <div class="catalog">
            <div class="margin_block">
                <h2 class="h1_comments">Catalog</h2>
                <div class="line_1"></div>
                <div class="line_2"></div>
                <br>
                <form style="margin-top: 20px;" action="/catalog" method="post">
                    <?php
                    if(isset($_SESSION['info'])){
                        echo '<h1 style="    font-family: \'Open Sans Condensed\', sans-serif;">' . $_SESSION['info'] . '</h1>';
                    }
                    ?>
                    <input type="submit" class="main-sub2" value="Выбрать категорию товара">
                    <select name="categ" class="select-cat">
                        <?php foreach ($category as $k=>$v) {?>
                            <option class="option-cat" value="<?php echo $v?>"><?php echo $v?></option>
                        <?php }?>
                    </select>
                    <hr style="margin-bottom: 30px;">
                    <?php
                    if(isset($_POST['categ'])){
                        while ($row = mysqli_fetch_assoc($res_cat)) {
                            if (isset($filename)){echo $row['img'];}
                            echo '
                    <br>
                    <div class="clearfix"><br><span style="margin-left: 10px;color: #ff4f01;">' . floatALL($row['price']) . '$</span>
                    <h4 style="margin-top: 0px; margin-left: 10px; float: left; margin-bottom: 0px;">' . hscALL($row['title']) . '</h4>
                    <br>
                    <h4 style="margin-top: 10px; margin-left: 10px; float: left; margin-bottom: 0px; color: #ff4f01;">Description:</h4>
                    <br>
                    <p class="cat_text">'.hscALL($row['text']).'</p><br></div>
                    <br>
                    <hr style="width: 90px;float: left;">                    
                    ';
                        }
                    }else{
                        echo '<div>Выберите категорию товара</div>';
                    } ?>
                    <br
                </form>
            </div>
        </div>