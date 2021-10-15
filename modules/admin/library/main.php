<?php
$limit = 3;

if (isset($_POST['author']) || isset($_POST['birth']) || isset($_GET['author']) || isset($_GET['birth'])){
    if (isset($_POST['author'])){
        $author = $_POST['author'];
    }elseif (isset($_GET['author'])){
        $author = $_GET['author'];
    }

    if (isset($_POST['birth'])){
        $birth = $_POST['birth'];
    }elseif (isset($_GET['birth'])){
        $birth = $_GET['birth'];
    }
    $res_author_libr_q = q("SELECT * FROM `library_authors` WHERE `author` = '" . mresALL($author) . "' OR `birth` = '" . mresALL($birth) . "'");
    if ($res_author_libr_q->num_rows){
        $res_nr = $res_author_libr_q->num_rows;
        while ($res_author_libr_arr_q = $res_author_libr_q->fetch_assoc()) {
            $res_author_libr = $res_author_libr_arr_q;
            $res_arr_author[] = $res_author_libr["id"];
        }
        $res_authors_arr = implode(",", $res_arr_author);
        if (!empty($res_authors_arr)){
            $res_book_q = q("SELECT * FROM `books_authors` WHERE `author_id` IN (".$res_authors_arr.")");
            while ($res_books_arr_q = $res_book_q->fetch_assoc()) {
                $res_books_arr = $res_books_arr_q;
                $res_arr_books[] = $res_books_arr["book_id"];
            }
            $res_arr = implode(",", $res_arr_books);
        }

        if (!empty($res_arr)){
            $res_cat = q("SELECT * FROM `library` WHERE `id` IN (".$res_arr.")");
            if ($res_cat->num_rows > $limit){
                if (isset($_GET["num"])) {
                    $page = $_GET["num"];
                }else{
                    $page = 1;
                }
                $nr_libr = $res_cat->num_rows / $limit;
                $nr_libr = ceil($nr_libr);

                $num_l_s = $page * $limit - $limit;

                $res_cat = q("SELECT * FROM `library` WHERE `id` IN (".$res_arr.") LIMIT " . intALL($num_l_s) .",". intALL($limit));

            }
        }else{
            $res_cat = false;
        }
    }else{
        $res_cat = false;
    }
} else {
    $res_cat = q("SELECT * FROM `library`");
}

if (isset($_POST['ids'], $_POST['delete'])) {
    foreach ($_POST['ids'] as $k => $v) {
        $_POST['ids'] [$k] = (int)$v;
    }
    $ids = implode(',', $_POST['ids']);
    q("
        DELETE FROM `library`
        WHERE `id` IN(" . $ids . ")
    ");
    q("
        DELETE FROM `books_authors`
        WHERE `book_id` IN(" . $ids . ")
    ");
    $_SESSION['info_l'] = 'Выбраные Книги были Удалены';
    header('Location: /admin/library');
    exit();
}



if (isset($_GET['id'])) {
    q("
        DELETE FROM `library`
        WHERE `id` = " . (int)$_GET['id'] . "
    ");
    q("
        DELETE FROM `books_authors`
        WHERE `book_id` = '". (int)$_GET['id'] . "'
    ");
    $_SESSION['info_l'] = 'Книга была Удалёна';
    header('Location: /admin/library');
    exit();
}
