<?php

function load_img($file,$max_w,$max_h,$name_file){
    $array = array('image/gif','image/jpeg','image/png');
    $array2 = array('jpg','jpeg','gif','png');
    if ($_FILES['file'] ['error'] == 0) {
        if ($_FILES['file'] ['size'] < 5000 || $_FILES['file'] ['size'] > 50000000) {
            $err = 'Размер изображения не подходящий';
        } else {
            preg_match('#\.([a-z]+)$#iu', $_FILES['file'] ['name'], $matches);
            if (isset($matches[1])) {
                $matches[1] = mb_strtolower($matches[1]);

                $temp = getimagesize($_FILES['file'] ['tmp_name']);
                $name_un = '/' . date('Ymd-His') . 'img' . rand(10000, 99999) . '.'.$matches[1];
                $name = '/' . $name_file . $name_un;
                if (!in_array($matches[1], $array2)) {
                    $err = 'Не подходит расширение изображения';
                } elseif (!in_array($temp['mime'], $array)) {
                    $err = 'Не подходит тип файла, можно загружать только картинки';
                }
                if ($temp[0] > $max_w || $temp[1] > $max_h) {
                    if ($temp[1] > $max_h) {
                        $w_img = $temp[0] * $max_h / $temp[1];
                        $h_img = $max_h;
                    } else {
                        $h_img = $temp[1];
                    }
                    if ($temp[0] > 100) {
                        $h_img = $temp[1] * $max_w / $temp[0];
                        $w_img = $max_w;
                    } else {
                        $w_img = $temp[0];
                    }
                    if ($matches[1] == "jpeg") {
                        $src = imagecreatefromjpeg($_FILES['file'] ['tmp_name']);
                    } elseif ($matches[1] == "gif") {
                        $src = imagecreatefromgif($_FILES['file'] ['tmp_name']);
                    } elseif ($matches[1] == "png") {
                        $src = imagecreatefrompng($_FILES['file'] ['tmp_name']);
                    } elseif ($matches[1] == "jpg") {
                        $src = imagecreatefromjpeg($_FILES['file'] ['tmp_name']);
                    }
                    if (!copy($_FILES['file']['tmp_name'], '.' . $name)) {
                        $err = 'Ошибка! Изображение не было загружено';
                    } else {
                        $message = 'Изображение было загружено успешно!';
                        $img_load = 'OK';
                    }
                    unlink('.' . $name);
                    $dst = imagecreatetruecolor($w_img, $h_img);
                    imagecopyresampled($dst, $src, 0, 0, 0, 0, $w_img, $h_img, $temp[0], $temp[1]);
                    if ($matches[1] == "jpeg") {
                        $dst = imagejpeg($dst, '.' . $name);
                    } elseif ($matches[1] == "gif") {
                        $dst = imagegif($dst, '.' . $name);
                    } elseif ($matches[1] == "png") {
                        $dst = imagepng($dst, '.' . $name);
                    } elseif ($matches[1] == "jpg") {
                        $dst = imagejpeg($dst, '.' . $name);
                    }

                } else {
                    if (!copy($_FILES['file']['tmp_name'], '.' . $name)) {
                        $err = 'Ошибка! Изображение не было загружено';
                    } else {
                        $message = 'Изображение было загружено успешно!';
                        $img_load = 'OK';
                    }
                }
            } else {
                $err = 'Данный файл не является картинкой. Принимаемые типы файлов: jpg, jpeg, png, gif.';
            }
        }
        if (!isset($err)){
            return $arr_img = array($message,$img_load,$name);
        }else{
            return $err;
        }
    }else{
        return "Error";
    }
}









$array = array('image/gif','image/jpeg','image/png');
$array2 = array('jpg','jpeg','gif','png');

if (isset($_POST['submit'])) {
    if ($_FILES['file'] ['error'] == 0){

        if ($_FILES['file'] ['size'] < 5000 || $_FILES['file'] ['size'] > 50000000){
            echo 'Размер изображения не подходящий';
        }else{
            preg_match('#\.([a-z]+)$#iu',$_FILES['file'] ['name'],$matches);
            if (isset($matches[1])) {
                $matches[1] = mb_strtolower($matches[1]);

                $temp = getimagesize($_FILES['file'] ['tmp_name']);
                $name = './uploaded/' .date('Ymd-His'). 'img'.rand(10000,99999).'.'.$matches[1];
                if ($temp[0] > 100 || $temp[1] > 100) {
                            if ($temp[1] > 100) {
                                $w_img = $temp[0] * 100 / $temp[1];
                                $h_img = 100;
                            }else{
                                $h_img = $temp[1];
                            }
                            if ($temp[0] > 100) {
                                $h_img = $temp[1] * 100 / $temp[0];
                                $w_img = 100;
                            }else{
                                $w_img = $temp[0];
                            }
                            if ($matches[1] == "jpeg") {
                                $src = imagecreatefromjpeg($_FILES['file'] ['tmp_name']);
                            } elseif ($matches[1] == "gif") {
                                $src = imagecreatefromgif($_FILES['file'] ['tmp_name']);
                            } elseif ($matches[1] == "png") {
                                $src = imagecreatefrompng($_FILES['file'] ['tmp_name']);
                            } elseif ($matches[1] == "jpg") {
                                $src = imagecreatefromjpeg($_FILES['file'] ['tmp_name']);
                            }
                            if (!move_uploaded_file($_FILES['file']['tmp_name'],$name)){
                                $message = 'Ошибка! Изображение не было загружено';
                            }else{
                                $message = 'Изображение было загружено успешно!';
                                $img_load = 'OK';
                            }
                            unlink($name);
                            $dst = imagecreatetruecolor($w_img, $h_img);
                            imagecopyresampled($dst, $src, 0, 0, 0, 0, $w_img, $h_img, $temp[0], $temp[1]);
                            if ($matches[1] == "jpeg") {
                                $dst = imagejpeg($dst, $name);
                            } elseif ($matches[1] == "gif") {
                                $dst = imagegif($dst, $name);
                            } elseif ($matches[1] == "png") {
                                $dst = imagepng($dst, $name);
                            } elseif ($matches[1] == "jpg") {
                                $dst = imagejpeg($dst, $name);
                            }
                }else{
                    if (!move_uploaded_file($_FILES['file']['tmp_name'],$name)){
                        $message = 'Ошибка! Изображение не было загружено';
                    }else{
                        $message = 'Изображение было загружено успешно!';
                        $img_load = 'OK';
                    }
                }
                if (!in_array($matches[1],$array2)){
                    echo 'Не подходит расширение изображения';
                } elseif (!in_array($temp['mime'],$array)){
                    echo 'Не подходит тип файла, можно загружать только картинки';
                }
            }else{
                echo 'Данный файл не является картинкой. Принимаемые типы файлов: jpg, jpeg, png, gif.';
            }
        }
    }
}




?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="file" name="file">
    <input type="submit" name="submit" value="Загрузить файл">
</form>



