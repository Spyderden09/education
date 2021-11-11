<?php
$limit = 3;
$y = 1;
$res_books_q_all = q("SELECT * FROM library");
if ($res_books_q_all->num_rows) {
    $i = 0;
    while ($res_author_libr_arr_all = $res_books_q_all->fetch_assoc()) {
        $i++;
        $res_author_libr = $res_author_libr_arr_all;
        $res_arr_books[$i] = $res_author_libr;
        $res_authors_books_q = q("SELECT * FROM books_authors WHERE book_id = '" . $res_arr_books[$i] ["id"] . "'");

        $z = 1;
        while ($z <= $res_authors_books_q->num_rows) {
            $res_authors_books = $res_authors_books_q->fetch_assoc();
            $res_authors_q = q("SELECT * FROM library_authors WHERE id = '" . $res_authors_books["author_id"] . "'");
            $res_arr_books[$i]["authors"]["author" . $z] = $res_authors_q->fetch_assoc();
            ++$z;
        }
    }

    if (count($res_arr_books) > $limit) {
        if (isset($_GET["num"])) {
            $page = $_GET["num"];
        } else {
            $page = 1;
        }
        $nr_libr = count($res_arr_books) / $limit;
        $nr_libr = ceil($nr_libr);
        $num_l_s = $page * $limit - $limit;
        $res_books_q_paginator = q("SELECT * FROM library LIMIT " . intALL($num_l_s) . "," . intALL($limit));

        $res_arr_books = array();
        $d = 1;
        while ($d <= $res_books_q_paginator->num_rows) {
            $res_author_libr = $res_books_q_paginator->fetch_assoc();
            $res_arr_books[$d] = $res_author_libr;
            $res_authors_books_q = q("SELECT * FROM books_authors WHERE book_id = '" . $res_arr_books[$d] ["id"] . "'");
            $z = 1;
            while ($z <= $res_authors_books_q->num_rows) {
                $res_authors_books = $res_authors_books_q->fetch_assoc();
                $res_authors_q = q("SELECT * FROM library_authors WHERE id = '" . $res_authors_books["author_id"] . "'");
                $res_arr_books[$d]["authors"]["author" . $z] = $res_authors_q->fetch_assoc();
                ++$z;
            }
            $d++;
        }
        $g = 1;
        $t = 1;
        if (($page-4) > 0){
            $page_num_g = 4;
            $page_g = $page - 5;
        }elseif (($page-3) > 0){
            $page_num_g = 3;
            $page_g = $page - 4;
        }elseif (($page-2) > 0){
            $page_num_g = 2;
            $page_g = $page - 3;
        }elseif (($page-1) > 0){
            $page_num_g = 1;
            $page_g = $page - 2;
        }else{
            $page_num_g = 0;
        }

        if (($page+4) <= $nr_libr){
            $page_num_t = 4;
        }elseif (($page+3) <= $nr_libr){
            $page_num_t = 3;
        }elseif (($page+2) <= $nr_libr){
            $page_num_t = 2;
        }elseif (($page+1) <= $nr_libr){
            $page_num_t = 1;
        }else{
            $page_num_t = 0;
        }
    }
}