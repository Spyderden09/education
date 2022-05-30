<?php

if (isset($_SESSION['user'])  || isset($_COOKIE['aa'],$_COOKIE['pass'], $_COOKIE['login'])) {
    ?>
<div class="comments">
    <div class="margin_block">
    <form action="" method="post" onsubmit="return myAjax('comment', 'dest')">
        <br>
        <h2 class="h1_comments">Comments</h2>
        <div class="line_1"></div>
        <div class="line_2"></div>
        <br>
        <br>
        <?php
        $comment_date = date("F j, Y, g:i a");
        $_SESSION['comment_arr'] = $comment_arr = array(
            'age'         => (int)($_SESSION['user']['age']),
            'login'       => mresALL($_SESSION['user']['login']),
            'email'       => mresALL($_SESSION['user']['email']),
            'date'        => mresALL($comment_date)
        );
        while($row = $res_sel->fetch_assoc()) {
            echo '<div class="comment_div" id="comment_block"><div class="comm_inf">
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
        $_SESSION['time'] = time();
        ?>
        <h1 class="h_comments">Комментарий:</h1>
        <textarea name="comment" class="comm_text" id="comment" placeholder="Введите коментарий:"></textarea>
        <input name="destination" class="comm_text" id="dest" placeholder="Кому:">
        <br>
        <input name="submit" type="submit" id="submit_comm" class="comm_sub">
    </form>
</div>
</div>
<?php }?>