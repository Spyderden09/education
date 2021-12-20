<div class="login_block" id="auth">
    <div class="X" onmousedown="hideShow('auth');hideShow('darkV')">Закрыть</div>

    <?php
    if (!isset($_SESSION['user'])){
        if (isset($_COOKIE['aa']) && !isset($_COOKIE['pass'], $_COOKIE['login']) || !isset($_COOKIE['aa'])){
    if(!isset($status) || $status != 'OK'){echo @$error;
        ?>
        <h3>Авторизация</h3>
        <form action="/login/login" method="post" onsubmit="return inputsValidation('login', 'pass', 'lenth_error_block', 'empty_input_error_block')">
            <input type="text" name="login" id="login" placeholder="Введите ваш логин">
            <br>
            <div style="display: none;" id="lenth_error_block">Длина вашего логина меньше 3 символов!</div>
            <div style="display: none;" id="empty_input_error_block">Заполните все поля!</div>
            <?php echo nl2br("\n");?>
            <input type="password" name="pass" id="pass" placeholder="Введите ваш пароль">
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
































