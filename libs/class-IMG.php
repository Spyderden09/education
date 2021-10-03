<?php

class IMG
{
    public static $file = '';
    public static $file_type = '';
    public static $original_width = '';
    public static $original_height = '';
    public static $error = '';
    public static $file_name = '';

    public static function uploader($file_arr)
    {

        $array = array('image/gif','image/jpeg','image/png');
        $array2 = array('jpg','jpeg','gif','png');

        self::$file = $file_arr;

        if (self::$file['error'] != 0) {
            self::$error = 'Ошибка';
        } else {
            if (self::$file['size'] < 5000 || self::$file['size'] > 50000000) {
                self::$error = 'Размер изображения не подходящий';
            } else {

                preg_match('#\.([a-z]+)$#iu', self::$file['name'], $matches);
                if (isset($matches[1])) {
                    self::$file_type = $matches[1];
                    self::$file_type = mb_strtolower(self::$file_type);
                    $temp = getimagesize(self::$file['tmp_name']);
                    self::$original_width = $temp[0];
                    self::$original_height = $temp[1];
                    self::$file_name = '/' . date('Ymd-His') . 'img' . rand(10000, 99999) . '.' . self::$file_type;

                    if (!in_array(self::$file_type, $array2)) {
                        self::$error = 'Не подходит расширение изображения';
                    } elseif (!in_array($temp['mime'], $array)) {
                        self::$error = 'Не подходит тип файла, можно загружать только картинки';
                    }

                    if (!move_uploaded_file( self::$file['tmp_name'], './uploaded/original' . self::$file_name)) {
                        self::$error = 'Ошибка! Изображение не было загружено';
                    }
                } else {
                    self::$error = 'Данный файл не является картинкой. Принимаемые типы файлов: jpg, jpeg, png, gif.';
                }
            }
            if (!empty(self::$error)){

                return false;
            }else{

                return true;
            }
        }
    }
    public static function resize($max_w, $max_h, $folder_name)
    {

        $file_path = '/uploaded/' . $folder_name . self::$file_name;

        if (self::$original_width > $max_w || self::$original_height > $max_h) {
                if (self::$original_height > self::$original_width) {
                    $w_img = self::$original_width * $max_w / self::$original_height;
                    $h_img = $max_h;
                } elseif (self::$original_width > self::$original_height) {
                    $h_img = self::$original_height * $max_h / self::$original_width;
                    $w_img = $max_w;
                }elseif (self::$original_width == self::$original_height){
                    $h_img = $max_h;
                    $w_img = $max_w;
                }


            if (self::$file_type == "jpeg") {
                $src = imagecreatefromjpeg('./uploaded/original' . self::$file_name);
            } elseif (self::$file_type == "gif") {
                $src = imagecreatefromgif('./uploaded/original' . self::$file_name);
            } elseif (self::$file_type == "png") {
                $src = imagecreatefrompng('./uploaded/original' . self::$file_name);
            } elseif (self::$file_type == "jpg") {
                $src = imagecreatefromjpeg('./uploaded/original' . self::$file_name);
            }

            $dst = imagecreatetruecolor($w_img, $h_img);

            imagecopyresampled($dst, $src, 0, 0, 0, 0, $w_img, $h_img, self::$original_width, self::$original_height);

            if (self::$file_type == "jpeg") {
                imagejpeg($dst, '.' . $file_path);

                return $file_path;
            } elseif (self::$file_type == "gif") {
                imagegif($dst, '.' . $file_path);

                return $file_path;
            } elseif (self::$file_type == "png") {
                imagepng($dst, '.' . $file_path);

                return $file_path;
            } elseif (self::$file_type == "jpg") {
                imagejpeg($dst, '.' . $file_path);

                return $file_path;
            }
        }
    }
}
