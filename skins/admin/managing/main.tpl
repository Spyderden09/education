<div class="managing">
    <div class="margin_block">
        <form action="/admin/managing" method="post">
            <?php
                if(isset($_SESSION['info_mg'])){
                    echo '<h1>'.$_SESSION['info_mg'].'</h1>';
                }
                if (isset($mg_select)){
                    while ($row =  mysqli_fetch_assoc($mg_select)){
                        echo '<div class="clearfix">
                              <a href="/admin/managing/edit?id='.$row['id'].'" class="edit_mg_cl"> РЕДАКИРОВАТЬ ПОЛЬЗОВАТЕЛЯ </a>
                              <input  type="checkbox" name="ides[]" value="' . $row['id'] . '" class="chb_mg">
                              <a class="del_mg_cl" href="/admin/managing?action=delete&id='.$row['id'].'&id_del=' . $row['id'] . '" >УДАЛИТЬ ПОЛЬЗОВАТЕЛЯ</a>
                              <h4 class="login_mg">' . hscALL($row['login']) . '</h4></div>
                              <br>';
                    }
                }
            ?>
            <hr>
            <input type="submit" name="delete_mg" value="Удалить Выбраных Пользователей">
        </form>
    </div>
</div>
