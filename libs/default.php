<?php

function wtf($array, $stop = false) {
	echo '<pre>'.print_r($array,1).'</pre>';
	if(!$stop) {
		exit();
	}
}

function q($query,$key = 0) {
    $res = DB::_($key)->query($query);
    if($res === false) {
        $inf = debug_backtrace();
        $error = "QUERY: " . $query ."; <br>".
            "On line " . $inf['0']['line'] .
            "When: " . date("l dS of F Y h:i:s A") ."; <br>".
            "In function " . $inf['0']['function'] ."; <br>".
            "In file:" . $inf['0']['file'] ."; <br>".
            "\n" . DB::_($key)->error;

        file_put_contents('./logs/mysql.log',strip_tags($error)."\n\n",FILE_APPEND);
        echo $error;
        exit();
    }
    return $res;
}



class DB {
    static public $mysqli = array();
    static public $connect = array();

    static public function _($key = 0) {
        if(!isset(self::$mysqli[$key])) {
            if(!isset(self::$connect['server']))
                self::$connect['server'] = Core::$DB_LOCAL;
            if(!isset(self::$connect['user']))
                self::$connect['user'] = Core::$DB_LOGIN;
            if(!isset(self::$connect['pass']))
                self::$connect['pass'] = Core::$DB_PASS;
            if(!isset(self::$connect['db']))
                self::$connect['db'] = Core::$DB_NAME;

            self::$mysqli[$key] = @new mysqli(self::$connect['server'],self::$connect['user'],self::$connect['pass'],self::$connect['db']); // WARNING
            if (mysqli_connect_errno()) {
                echo 'Не удалось подключиться к Базе Данных';
                exit;
            }
            if(!self::$mysqli[$key]->set_charset("utf8")) {
                echo 'Ошибка при загрузке набора символов utf8:'.self::$mysqli[$key]->error;
                exit;
            }
        }
        return self::$mysqli[$key];
    }
    static public function close($key = 0) {
        self::$mysqli[$key]->close();
        unset(self::$mysqli[$key]);
    }
}

function mresALL($q,$key=0){
    global $link_DB;
    if(!is_array($q)){
        $q = DB::_($key)->real_escape_string($q);
    } else{
        $q = array_map('mresALL',$q);
    }
    return $q;
}
function trimALL($el){
    if(!is_array($el)){
        $el = trim($el);
    } else{
        $el = array_map('trimALL',$el);
    }
    return $el;
}
// hscALL = htmlspecialcharsALL
function hscALL($sv){
    if(!is_array($sv)){
        $sv = htmlspecialchars($sv);
    } else{
        $sv = array_map('hscALL',$sv);
    }
    return $sv;
}
function intALL($numb1){
    if(!is_array($numb1)){
        $numb1 = (int)$numb1;
    } else{
        $numb1 = array_map('intALL',$numb1);
    }
    return $numb1;
}
function floatALL($numb2){
    if(!is_array($numb2)){
        $numb2 = (float)$numb2;
    } else{
        $numb2 = array_map('floatALL',$numb2);
    }
    return $numb2;
}
spl_autoload_register(function ($class) {
    include './libs/class-' . $class.'.php';
});
function MyHash($var){
    $salt = md5('291nc8m89E21');
    $salt2 = md5('qwo1We1qe');
    $var = crypt(md5($var.$salt),$salt2);
    return mresALL($var);
}

