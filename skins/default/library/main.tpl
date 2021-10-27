        <div class="catalog">
            <div class="margin_block">
                <h2 class="h1_comments">Library</h2>
                <div class="line_1"></div>
                <div class="line_2"></div>
                <br>
                <form style="margin-top: 20px;" action="/library" method="post">
                    <input type="submit" class="main-sub2" value="Найти книгу 🔎">
                    <input type="text" class="main-text" name="author" placeholder="Имя/Фамилия автора книги">
                    <input type="number" class="main-num" name="birth" placeholder="Дата рождения автора" max="2017" min="-1000">
                    <br>
                    <?php echo nl2br("\n");?>
                    <hr style="margin-bottom: 30px;">
                    <?php

                    if(isset($res_arr_books) && $res_arr_books != false){
                        $books_count = count($res_arr_books);
                        while ($y <= $books_count) {
                            $x = 1;
                            $row = $res_arr_books[$y];
                            if (isset($row['img'])) {
                                echo '<img src="' . $row['img'] . '">';
                            }
                            echo '<div class="clearfix"><br><span style="margin-left: 10px;color: #ff4f01;">' . floatALL($row['nump']) . 'Стр.</span>
                                  <h4 style="margin-top: 0; margin-left: 10px; float: left;">' . hscALL($row['title']) . '</h4>';
                            while ($x <= count($res_arr_books[$y]["authors"])){
                                echo '<span style="margin-left: 15px;"> Автор: </span><span style="color: #ff4f01;">'.hscALL($res_arr_books[$y]["authors"]["author".$x]["author"]).'</span><span style="margin-left: 15px;"> Год Рождения: </span><span style="color: #ff4f01;">'.intALL($res_arr_books[$y]["authors"]["author".$x]["birth"]).'</span>';
                                $x++;
                            }
                            echo "</div>";
                            $y++;
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
                </form>
            </div>
        </div>