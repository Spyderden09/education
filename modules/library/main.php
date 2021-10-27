<?php
$limit = 3;
$y = 1;

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
        $i = 0;
        while ($res_author_libr_arr = $res_author_libr_q->fetch_assoc()) {
            $i++;
            $res_author_libr = $res_author_libr_arr;
            $res_arr_books[$i] = $res_author_libr;
            $res_authors_books_q = q("SELECT * FROM `books_authors` WHERE `author_id` = '" . $res_arr_books[$i] ["id"] . "'");
            $res_authors_books[] = $res_authors_books_q->fetch_assoc();
            wtf($res_authors_books);

            $res_books_q = q("SELECT * FROM `library` WHERE `id` = '" . $res_authors_books["book_id"] . "'");
            $res_books_arr = $res_books_q->fetch_assoc();
            $res_arr_books[$i] = $res_books_arr;
            $res_arr_books[$i]["author"] = $res_author_libr["author"];
            $res_arr_books[$i]["birth"] = $res_author_libr["birth"];
        }

            if (count($res_arr_books) > $limit){
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
} else {
    $res_books_q_all = q("SELECT * FROM `library`");
    $i = 0;
    while ($res_author_libr_arr_all = $res_books_q_all->fetch_assoc()) {
        $i++;
        $res_author_libr = $res_author_libr_arr_all;
        $res_arr_books[$i] = $res_author_libr;
        $res_authors_books_q = q("SELECT * FROM `books_authors` WHERE `book_id` = '" . $res_arr_books[$i] ["id"] . "'");
        $z = 1;
        while ($z <= $res_authors_books_q->num_rows){
            $res_authors_books = $res_authors_books_q->fetch_assoc();
            $res_authors_q = q("SELECT * FROM `library_authors` WHERE `id` = '" . $res_authors_books["author_id"] . "'");
            $res_arr_books[$i]["authors"]["author".$z] = $res_authors_q->fetch_assoc();
            ++$z;
        }
    }

}