<div class="managing">
    <div class="margin_block">
        <?php if (isset($err)){echo $err;}?>
    <br>
    <form action="" method="post" enctype="multipart/form-data">
        <?php if (isset($_SESSION['info_pr'])){echo '<h2>'.$_SESSION['info_pr'].'</h2>';}?>
        <br>
        <?php if(isset($_SESSION['user']['img'])){echo '<img src="'. $_SESSION['user']['img'] .'">';} ?>
        <br>
        Изменить пароль:
        <input class="inp-d1" type="text" name="pass_pr_ed" value="">
        <br>Логин:
        <input class="inp-d1" type="text" name="login_pr_ed" value="<?php echo $_SESSION['user']['login'];?>">
        <br>Права: <?php
        if ($_SESSION['user']['access'] == 2){
            echo 'Админ';
        }elseif($_SESSION['user']['access']){
            echo 'Стандарт';
        }
        ?>
        <br>
        <input type="file" name="file">
        <?php
        if(isset($message)){
            echo $message;
        }
        ?>
        <br>
        <input class="" type="submit" name="ed_user" value="Изменить пользователя">
        <br>
    </form>
    </div>
</div>