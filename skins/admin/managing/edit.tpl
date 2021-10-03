<div class="managing">
    <div class="margin_block">
        <?php if (isset($err)){echo $err;}?>
    <br>
    <form action="" method="post" enctype="multipart/form-data">
        <?php if(isset($row['img'])){echo '<img src="'. $row['img'] .'">';} ?>
        <br>
        Изменить пароль:
        <input class="inp-d1" type="text" name="pass_mg_ed" value="">
        <br>Логин:
        <input class="inp-d1" type="text" name="login_mg_ed" value="<?php echo $row['login'];?>">
        <br>E-mail:
        <input class="inp-d1" type="text" name="email_mg_ed" value="<?php echo $row['email'];?>">
        <br>Права:<select name="access_mg_ed">
            <option class="option-cat" value="1" <?php if ($row['access']==1){?> selected="selected"<?php }?>>Базовый</option>
            <option class="option-cat" value="2"<?php if ($row['access']==2){?> selected="selected"<?php }?>>Админ</option>
            <option class="option-cat" value="5"<?php if ($row['access']==5){?> selected="selected"<?php }?>>Забанен</option>
        </select>
        <br>
        <input type="file" name="file">
        <?php if(isset($message)){echo $message;}?>

        <br>
        <input class="" type="submit" name="ed_user" value="Изменить пользователя">
        <br>
    </form>
    </div>
</div>