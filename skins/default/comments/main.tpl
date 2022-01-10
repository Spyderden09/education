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
        while($row = $res_sel->fetch_assoc()) {
            echo '<div class="comment_div"><div class="comm_inf">
            <p class="login_comments">'. hscALL($row['login']);
            if (!empty($row["destination"])){
                echo '<span class="destination_comments">→'.$row["destination"].'</span>';
            }
            echo '<span class="comment_date">'.$row["date"].'</span></p></div><hr color="#1b2640" noshade  class="comment_hr">  
            <div class="comm_inf">
            <br>';

            echo hscALL($row['comment']);
            echo '</div></div>';
        }
        ?>
        <h1 class="h_comments">Комментарий:</h1>
        <textarea name="comment" class="comm_text" placeholder="Введите коментарий:"></textarea>
        <input name="destination" class="comm_text" placeholder="Кому:">
        <br>
        <input name="submit" type="submit" class="comm_sub">
    </form>
</div>
</div>
<?php }?>