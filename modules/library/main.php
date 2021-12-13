<?php
$limit = 3;
$y = 1;
$res_books_q_all = q("SELECT COUNT(*) FROM library");
$res_books_q_all = $res_books_q_all->fetch_assoc();
if ($res_books_q_all["COUNT(*)"] > 0) {
    if (isset($_GET["num"])) {
        $page = $_GET["num"];
    } else {
        $page = 1;
    }
    $nr_libr = $res_books_q_all["COUNT(*)"] / $limit;
    $nr_libr = ceil($nr_libr);
    $num_l_s = $page * $limit - $limit;
    $res_books_q_paginator = q("SELECT * FROM library LIMIT " . intALL($num_l_s) . "," . intALL($limit));
    $num_rows_paginator = $res_books_q_paginator->num_rows;
    $res_arr_books = array();

    while ($res_author_libr = $res_books_q_paginator->fetch_assoc()) {
        $res_arr_books[$res_author_libr["id"]] = $res_author_libr;
        $res_arr_books_id[] = $res_author_libr["id"];
    }

    $res_books_id = implode(",", $res_arr_books_id);

    $res_authors_books_q = q("SELECT * FROM books_authors WHERE book_id IN (".$res_books_id.")");
    while ($authors_books_arr = $res_authors_books_q->fetch_assoc()) {
        $res_arr_books[$authors_books_arr["book_id"]]["authors"][]["id"] = $authors_books_arr["author_id"];
        $res_authors_books_arr[] = $authors_books_arr["author_id"];
    }
    $res_books_authors_id = implode(",", $res_authors_books_arr);

    $res_authors_q = q("SELECT * FROM library_authors WHERE id IN(" . $res_books_authors_id . ")");
    while ($author_arr = $res_authors_q->fetch_assoc()) {
        $res_arr_authors[$author_arr["id"]]["author"] = $author_arr["author"];
        $res_arr_authors[$author_arr["id"]]["birth"] = $author_arr["birth"];
    }
    $g = 1;
    $t = 1;
    if (($page - 4) > 0) {
        $page_num_g = 4;
        $page_g = $page - 5;
    } elseif (($page - 3) > 0) {
        $page_num_g = 3; 
        $page_g = $page - 4;
    } elseif (($page - 2) > 0) {
        $page_num_g = 2;
        $page_g = $page - 3;
    } elseif (($page - 1) > 0) {
        $page_num_g = 1;
        $page_g = $page - 2; 
    } else {
        $page_num_g = 0;
    }

    if (($page + 4) <= $nr_libr) {
        $page_num_t = 4;
    } elseif (($page + 3) <= $nr_libr) {
        $page_num_t = 3;
    } elseif (($page + 2) <= $nr_libr) {
        $page_num_t = 2;
    } elseif (($page + 1) <= $nr_libr) {
        $page_num_t = 1;
    } else {
        $page_num_t = 0;
    }
}


