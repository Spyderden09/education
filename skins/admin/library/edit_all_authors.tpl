<div class="catalog">
    <div class="margin_block">
        <h2 class="h1_comments">Edit Author</h2>
        <div class="line_1"></div>
        <div class="line_2"></div>
        <br>
        <form action="" method="post" enctype="multipart/form-data">
            <?php if(isset($res_cat) && $res_cat->num_rows){
            while ($row = $res_cat->fetch_assoc()) {
            if (isset($row['img'])) {
            echo '<img src="' . $row['img'] . '">';
            }
            echo '<div class="clearfix"><br><span style="margin-left: 10px;color: #ff4f01;">' . floatALL($row['birth']) . ' Год рождения</span>
                <a style="margin-left: 10px; font-family: \'Open Sans Condensed\', sans-serif; text-decoration: none; color: #ff4f01;" href="/admin/library/edit_author?id=' . $row['id'] . '">РЕДАКИРОВАТЬ АВТОРА</a>
                <input style="float: left; " type="checkbox" name="ids[]" value="' . $row['id'] . '">
                <a style="margin-left: 10px; font-family: \'Open Sans Condensed\', sans-serif; text-decoration: none; color: #ff4f01;" href="/admin/library/edit_all_authors?action=delete&id=' . $row['id'] . '">УДАЛИТЬ АВТОРА</a>
                <h4 style="margin-top: 0; margin-left: 10px; float: left;">' . hscALL($row['author']) . '</h4></div>
            <br>';
            }
            }else{
                echo "Авторов нету";
            }
            ?>
            <br>
            <input class="main-sub2" type="submit" name="delete" value="Удалить Отмеченых Авторов">
        </form>
    </div>
</div>