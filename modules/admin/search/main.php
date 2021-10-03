<?php

if(isset($_POST['search'])) {
    $res = q("
        SELECT *
        FROM `users`
        WHERE `login` LIKE '" . $_POST['search'] . "%'
        AND `active` = 1
    ");
    if (mysqli_num_rows($res)) {
            $search_arr = mysqli_fetch_assoc($res);
            $search = $search_arr['login'];
    } else {
        $search = 'Ничего не найдено';
    }
}
