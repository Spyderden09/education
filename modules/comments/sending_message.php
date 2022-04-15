<?php
$time = time();
$comment_send = q("INSERT INTO `comments` SET 
            `age` = '" . (int)$_SESSION['comment_arr']['age'] . "',
            `comment`  = '" . mresALL($_POST['comment']) . "',
            `login` = '" . mresALL($_SESSION['comment_arr']['login']) . "',
            `email` = '" . mresALL($_SESSION['comment_arr']['email']) . "',
            `date` = '" . mresALL($_SESSION['comment_arr']['date']) . "',
            `time` = '" . (int)$time . "',
            `destination` = '" . (isset($filename) ? $filename : $_POST['dest']) . "'"
);
echo "Комментарий был успешно добавлен!";
exit();
