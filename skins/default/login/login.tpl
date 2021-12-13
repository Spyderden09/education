<div class="login_block" id="auth">
    <div class="X" onmousedown="hideShow('auth');hideShow('darkV')">Закрыть</div>

    <?php
    if (!isset($_SESSION['user'])){
        if (isset($_COOKIE['aa']) && !isset($_COOKIE['pass'], $_COOKIE['login']) || !isset($_COOKIE['aa'])){
    if(!isset($status) || $status != 'OK'){echo @$error;
        ?>
        <h3>Авторизация</h3>
        <form action="/login/login" method="post" onsubmit="return simbolsCount('login')">
            <input type="text" name="login" id="login" placeholder="Введите ваш логин">
            <br>
            <?php echo nl2br("\n");?>
            <input type="password" name="pass" placeholder="Введите ваш пароль">
            <br>
            <?php echo nl2br("\n");?>
            <input type="checkbox" name="aa"> Запомнить меня
            <br>
            <input type="submit" value="Войти" name="submit">
        </form>
    <?php }else {
        echo '<h1>Вы авторизированы!</h1>';
    }
        }else{
            echo '<h1>Вы уже авторизированы</h1>';
            echo '<a href="/index.php?module=login&page=log_exit"><input type="button" value="Выйти"></a>';
        }
    }else{
        echo '<h1>Вы уже авторизированы</h1>';
        echo '<a href="/index.php?module=login&page=log_exit"><input type="button" value="Выйти"></a>';
    }
    ?>
</div>
































