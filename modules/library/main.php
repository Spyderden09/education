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
    $res_cat_libr_q = q("SELECT * FROM `library_authors` WHERE `author` = '" . mresALL($author) . "' OR `birth` = '" . mresALL($birth) . "'");
    if ($res_cat_libr_q->num_rows){
        $res_nr = $res_cat_libr_q->num_rows;
        for ($i = 1; $i <= $res_nr; $i++) {
            $res_cat_libr = $res_cat_libr_q->fetch_assoc();
            $res_arr[$i] = $res_cat_libr["book_id"];
            $res_arr = array_unique($res_arr);
        }
        $res_arr = implode(",", $res_arr);

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