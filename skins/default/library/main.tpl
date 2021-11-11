<div class="catalog">
    <div class="margin_block">
        <h2 class="h1_comments">Library</h2>
        <div class="line_1"></div>
        <div class="line_2"></div>
        <br>
        <form style="margin-top: 20px;" action="/library" method="post">
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
                                  <h4 style="margin-top: 0; margin-left: 10px; float: left;">' . hscALL($row['title']) . '</h4>
                                  <div class="authors-all">Авторы:
                                  <div class="drop-list-authors">';
                    while ($x <= count($res_arr_books[$y]["authors"])){
                        echo '<p><span style="margin-left: 15px;"> Автор: </span><span style="color: #ff4f01;">'.hscALL($res_arr_books[$y]["authors"]["author".$x]["author"]).'</span><span style="margin-left: 15px;"> Год Рождения: </span><span style="color: #ff4f01;">'. intALL($res_arr_books[$y]["authors"]["author".$x]["birth"]).'</span></p>';
                        $x++;
                    }
                    echo "</div></div></div>";
                    $y++;
                }
            }else{
                echo '<div>Выберите категорию книги</div>';
            }
            echo '<div class="paginator">';
            if (isset($nr_libr)){
                echo "<a href=\"/library?num=1\" class=\"a_paginator_first\">1</a>";
                    while ($g <= $page_num_g) {
                        echo "<a href=\"/library?num=" . ($page_g + $g) . "\" class=\"a_paginator\">" . ($page_g + $g) . "</a>";
                        $g++;
                    }
                echo "<a href=\"/library?num=". $page ."\" class=\"a_paginator\">".$page."</a>";

                if ($page_num_t != 0) {
                    while ($t <= $page_num_t) {
                        echo "<a href=\"/library?num=" . ($page+$t) . "\" class=\"a_paginator\">" . ($page+$t) . "</a>";
                        $t++;

                    }
                }
                echo "<a href=\"/library?num=" . $nr_libr . "\" class=\"a_paginator_last\">" . $nr_libr . "</a>";
                echo '</div>';

            }
            echo nl2br("\n");echo nl2br("\n");echo nl2br("\n");
            ?>
            <br>
        </form>
    </div>
</div>