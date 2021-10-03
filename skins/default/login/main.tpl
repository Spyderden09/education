<div class="margin_block2">
    <?php if(!isset($_SESSION['user']) || isset($_COOKIE['aa']) && !isset($_COOKIE['pass'], $_COOKIE['login'])){ ?>
<form action="/login" method="post">
    <?php
    if (isset($errors['all'])){
                echo $errors['all'];
            }
            echo nl2br("\n");
    if (!count($errors)){
        echo '<h2>Всё верно!</h2><b>Для окончания регистрации перейдите в ваш электронный почтовый ящик и подтвердите активацию аккаунта</b>';
    }
    ?>
    <br>
    <input type="hidden" name="module" value="login">
    <br>
    <p class="p_log">Логин должен состоять из букв, цифр, нижнее подчеркивание и тире</p>
    <input type="text" name="login" placeholder="Введите ваш логин">
    <?php
    if (isset($errors['login'])) {
        echo '<br>'.$errors['login'];
    }
    ?>
    <br>
    <?php echo nl2br("\n");?>
    <p class="p_log">Пароль обязан состоять из 1 большой буквы, 1 маленькой, и одной цифры, и 1 символ не являющийся буквой или цифрой.</p>
    <input type="password" name="pass" placeholder="Введите ваш пароль">
    <br>
    <?php
    if (isset($errors['pass'])){
        echo $errors['pass'];
    }
    echo nl2br("\n");
    echo nl2br("\n");
    ?>
    <input type="text" name="email" placeholder="Введите ваш e-mail">
    <?php
    if (isset($errors['email'])) {
        echo '<br>'.$errors['email'];
    }
    ?>
    <br>
    <p>Введите ваш возраст</p>
    <input type="number" name="age" min="0" max="111">
    <br>
    <input type="submit" value="Войти" name="submit">
</form>
    <?php }else{
        echo '<h1>Вы зарегистрированы!</h1>';
        echo '<a href="/login/log_exit"><input type="button" value="Выйти"></a>';
    }?>
</div>



