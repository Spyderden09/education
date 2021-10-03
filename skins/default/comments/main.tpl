<?php
if (isset($_SESSION['user'])  || isset($_COOKIE['aa'],$_COOKIE['pass'], $_COOKIE['login'])) {
    ?>
<div class="comments">
    <div class="margin_block">
    <form action="" method="post">
        <br>
        <h2 class="h1_comments">Comments</h2>
        <div class="line_1"></div>
        <div class="line_2"></div>
        <br>
        <br>
        <?php
        while($row = mysqli_fetch_assoc($res_sel)) {
            echo '<div class="comm_inf">
            <h4 class="h4_comments">Name</h4>';
            echo htmlspecialchars($row['login']);
            echo '<br></div>
        <div class="comm_inf">
        <h4 class="h4_comments">Last comment</h4>
        <br>';

            echo htmlspecialchars($row['text']);
            echo '</div>';
        }
        ?>
        <h1 class="h_comments">Write comments:</h1>
        <textarea name="comm" class="comm_text" placeholder="Введите коментарий:"></textarea>
        <input name="wrlog" class="comm_text" placeholder="Введите имя:">
        <br>
        <input name="submit" type="submit" class="comm_sub">
    </form>
</div>
</div>
<?php }?>