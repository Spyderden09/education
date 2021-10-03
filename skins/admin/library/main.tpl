        <div class="catalog">
            <div class="margin_block">
                <h2 class="h1_comments">Library</h2>
                <div class="line_1"></div>
                <div class="line_2"></div>
                <br>
                <form style="margin-top: 20px;" action="/admin/library" method="post">
                    <?php
                    if(isset($_SESSION['info_l'])){
                        echo '<h1 style="    font-family: \'Open Sans Condensed\', sans-serif;">' . $_SESSION['info_l'] . '</h1>';
                    }
                    ?>
                    <input type="submit" class="main-sub2" value="Найти книгу 🔎">
                    <input type="text" class="main-text" name="author" placeholder="Имя/Фамилия автора книги">
                    <input type="number" class="main-num" name="birth" placeholder="Дата рождения автора" max="2017" min="-1000">
                    <br>
                    <?php echo nl2br("\n");?>
                    <hr style="margin-bottom: 30px;">
                    <?php
                    if(isset($res_cat) && $res_cat != false){
                        while ($row = $res_cat->fetch_assoc()) {
                            if (isset($row['img'])) {
                                echo '<img src="' . $row['img'] . '">';
                            }
                            echo '<div class="clearfix"><br><span style="margin-left: 10px;color: #ff4f01;">' . floatALL($row['nump']) . 'Стр.</span>
                                  <a style="margin-left: 10px; font-family: \'Open Sans Condensed\', sans-serif; text-decoration: none; color: #ff4f01;" href="/admin/library/edit?id=' . $row['id'] . '">РЕДАКИРОВАТЬ КНИГУ</a>
                                  <input style="float: left; " type="checkbox" name="ids[]" value="' . $row['id'] . '">
                                  <a style="margin-left: 10px; font-family: \'Open Sans Condensed\', sans-serif; text-decoration: none; color: #ff4f01;" href="/admin/library?action=delete&id=' . $row['id'] . '">УДАЛИТЬ КНИГУ</a>
                                  <h4 style="margin-top: 0; margin-left: 10px; float: left;">' . hscALL($row['title']) . '</h4></div>
                                  <br>';
                        }
                    }else{
                        echo '<div>Выберите категорию книги</div>';
                    }
                    if (isset($nr_libr)){
                        for ($i = 1; $i <= $nr_libr; $i++){
                            echo "<a href=\"/admin/library?num=".$i."&author=".$author."&birth=".$birth."\" class=\"a_paginator\">".$i."</a>";
                        }
                    }
                    echo nl2br("\n");echo nl2br("\n");echo nl2br("\n");
                    ?>
                    <br>

                    <a class="main-sub" href="/admin/library/add">ДОБАВИТЬ КНИГУ</a>
                    <input class="main-sub2" type="submit" name="delete" value="Удалить Отмеченые Книги">
                    <a class="cat_button" href="/admin/library/add_author">Добавить автора</a>
                    <a class="cat_button" href="/admin/library/edit_all_authors">Изменить автора</a>
                </form>
            </div>
        </div>