<?php

class Mail{
    static $subject = 'По умолчанию';
    static $from = 'admin@spyderden.school-php.com';
    static $to = 'spyderden09@gmail.com';
    static $text = 'Шаблонное письмо';
    static $headers = '';

    static function send(){
        self::$subject = '=?utf-8?b?'. base64_encode(self::$subject) . '?=';

        self::$headers = "Content-type: text/html; charset=\"utf-8\"\r\n";
        self::$headers = "From: ".self::$from."\r\n";
        self::$headers = "MIME-Version: 1.0\r\n";
        self::$headers = "Date: ".date('D, d M Y h:i:s O')."\r\n";
        self::$headers = "Precenence: bulk\r\n";

        return mail(self::$to,self::$subject,self::$text,self::$headers);
    }



    static function testMail(){
        if(mail(self::$to,'English words','English words')){
            echo 'Письмо отправилось';
        }else{
            echo 'Письмо не отправилось';
        }
exit();
    }
}


Mail::$to = 'spyderden09@gmail.com';
Mail::$subject = 'Вы зарегистрировались';
Mail::$text = 'Текст';
Mail::send();
