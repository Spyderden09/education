<div class="login_block" id="auth">
    <div class="X" onmousedown="hideShow('auth');hideShow('darkV')">Закрыть</div>

    <?php
    if (!isset($_SESSION['user'])){
        if (isset($_COOKIE['aa']) && !isset($_COOKIE['pass'], $_COOKIE['login']) || !isset($_COOKIE['aa'])){
    if(!isset($status) || $status != 'OK'){echo @$error;
        ?>
        <h3>Авторизация</h3>
        <form action="/login/login" method="post" onsubmit="return inputsValidation('login', 'pass', 'length_error_block1', 'empty_login_error_block', 'lenth_error_block2', 'empty_pass_error_block', 'empty_inputs_error_block')">
            <div style="display: none;" id="empty_inputs_error_block">Заполните все поля!</div>
            <input type="text" name="login" id="login" placeholder="Введите ваш логин">
            <br>
            <div style="display: none;" id="length_error_block1">Длина вашего логина меньше 3 символов!</div>
            <div style="display: none;" id="empty_login_error_block">Заполните поле логина!</div>
            <?php echo nl2br("\n");?>
            <input type="password" name="pass" id="pass" placeholder="Введите ваш пароль">
            <br>
            <div style="display: none;" id="empty_pass_error_block">Заполните поле пароля!</div>
            <div style="display: none;" id="lenth_error_block2">Длина вашего пароля меньше 3 символов!</div>
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