<?php
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');

/**
 *	Задачник. После каждого $array мы ОБЯЗАНЫ написать прям тут нужный нам код. Прогнать массив $array через foreach и обработать по заданию из $q.
 *	$q - массивы, то есть могут содержать несколько заданий, каждый из которых будет работать с имеющимся массивом
 *	Если у нас в задаче замена, но мы производим замену и выводим: $text = preg_replace('что','на что',$text),
 *	Если у нас в задаче поиск, то производим проверку через if-else и выводим: строку
 *	echo 'В такой-то строке: '.htmlspecialchars($array[$k]).' регулярка прошла УСПЕШНО или НЕ УСПЕШНО (подставить в if-else)';
 *	и если у нас поиск, то дополнительно вывести весь массив $matches, И нужную найденную строку, если нам надо её получить echo $matches[0][1] <- пример
 *  Задачки подготовил Inpost специально для курсов. Дата: 5 января 2012 года
 *	skype: imbalance_hero , пишите :)
 */

/**
 *	Подсказки:
 *	^ - начало строки, если указали, то проверка идёт от начала!
 *	$ - конец строки
 *	\s - пробел
 *	\t - табуляция
 *	* - {0,}
 *	+ - {1,}
 *	. - любой символ!
 *	Модификаторы:
 *	u - работаем в кодировке UTF-8
 *	i - регистронезависимый текст
 *	U - отмена жадного поиска
 *	Общие данные:
 *	[] - область допустимых символов в КОНКРЕТНОМ символе. [a-z]{3} <- 3 символа любых из a-z, вплоть даже до 3-х повторяющихся
 *	{} - количество символов, если не стоит, значит 1 символ! Если записано одно число, то РОВНОЕ значение, если 2, то min,max
 *	() - логические скобки И/ИЛИ карман, куда попадают данные
 */


$array = array(
    'Ваш логин: Inpost. Добро пожаловать',
    'Ваш логин: Николай. Добро пожаловать',
    'Ваш логин: Анна Семинович. Добро пожаловать',
    'Ваш логин: Борис_Бурда-2. Добро пожаловать',
);

$q = 'Поиском достать логин. 
      Особенности: логин стоит после двухиточия, может представлять из себя рус и англ символы, пробелы, тире и подчеркивание. 
	  Для для того, чтобы достать чистый логин, воспользуемся карманом (скобками)';

echo '<h7>№1</h7><br><hr>';
foreach ($array as $v){
    $count = preg_match("#:\s([\w\s-]+)#ui",$v,$matches);
    echo $matches[1];
    echo '<br>';
}
echo '<hr>';
$array = array(
    'main',
    'READ',
    'news"&\\/files',
    '../../index',
    'news',
    'kill_crash-and-destroy',
    'loveYou',
);

$q = 'Проверить допустимые имена файлов
      Важно заметить, что мы в юникс-системе будем использовать как большие, так и маленькие символы.
	  Необходимо недопустить попадания ТОЛЬКО запрещенных файловой системой имён, а так же попытки перейти между каталогами';
echo '<h7>№2</h7><br><hr>';
foreach ($array as $v){
    if (preg_match("#^[^*?\\\<>|+]+$#u",$v,$matches)) {
        foreach ($matches as $v){
            echo $v;
            echo '<br>';
        }
    }
}
echo '<hr>';



$array = array(
    'file.jpg',
    'zzz.png',
    'afafaf.php',
    'quad.jpg.',
    'quad2.JPG',
    'quad3.jpg.vir',
    'gif.doc',
    'file.virus',
);

$q = 'Загрузка фотографий. Необходимо допустить ТОЛЬКО: jpg,png,gif расширения
	  Важной особенностью будет то, что поиск лучше осуществлять с конца строки $ .
	  Интересный момент, что можно попасться на ошибку Попова :)';
echo '<h7>№3</h7><br><hr>';
foreach ($array as $v){
    $count = preg_match_all("#\.(jp(e?)g|png|gif)$#ui",$v,$matches);

    if(isset($matches[0][0])){
        echo $matches[0][0];
        echo '<br>';
    }
}
echo '<hr>';

$array = array(
    'Длинная строка. Главное, что мы научимся с ней идеально работать.  HOW do you do? Вот так и живём.Классно!',
);

$q = array(
    'Одна строка, заданий много:', 'Получить все слова. Самая простая регулярка, поиск по всей строке, указать надо лишь допустимые символы и количество',
    'Получить все английские слова.',
    'Получить слова, которые стоят после точки. Обращаю внимание, что пробел после точки может БЫТЬ и даже не один, а может и не быть, символ пробела: \s',
    'Необходимо получить 5 символ от начала строки. Начало строки: ^ , и не забудем использовать кармашек, чтобы туда ушел нужный нам символ',
    'Получить все слова, в которых первым символ будет начинаться с большой буквы. Подсказка, необходимо использовать 2 квадратных скобки!',
);
echo '<h7>№4</h7><br><hr>';
echo '<br><h8>№4.1</h8><br><hr>';
foreach ($array as $v){
    $count = preg_match_all("#(.+)#ui",$v,$matches);
    if(isset($matches[1][0])){
        echo $matches[1][0];
        echo '<br>';
    }
}
echo '<hr>';
echo '<br><h8>№4.2</h8><br><hr>';
foreach ($array as $v){
    $count = preg_match_all("#[a-z]+#ui",$v,$matches);
    if(isset($matches[0])) {
        foreach ($matches[0] as $v) {
            echo $v;
            echo '<br>';
        }
    }
}
echo '<hr>';
echo '<br><h8>№4.3</h8><br><hr>';
foreach ($array as $v){
    $count = preg_match_all("#.\s*[a-z а-я]+#ui",$v,$matches);
    foreach ($matches[0] as $v) {
        echo $v;
        echo '<br>';
    }
}
echo '<hr>';
echo '<br><h8>№4.4</h8><br><hr>';
foreach ($array as $v){
    $count = preg_match_all("#^.{4}(.)#ui",$v,$matches);
    echo $matches[1][0];
    echo '<br>';
}
echo '<hr>';
echo '<br><h8>№4.5</h8><br><hr>';
foreach ($array as $v){
    $count = preg_match_all("#\b[-A-Z-А-ЯЁ].*?\b#u",$v,$matches);
    foreach ($matches[0] as $v) {
        echo $v;
        echo '<br>';
    }
}



echo '<hr>';
$array = array(
    '10 , 22, 2.1, 2.5, 10.10, 500.1, 77, 10.11.12.13',
);

$q = array(
    'Достать ВСЕ дробные числа. Дробные - это числа, разделенные точкой',
);
echo '<h7>№5</h7><br><hr>';
foreach ($array as $v){
    $count = preg_match_all("#(\d+\.\d+),#ui",$v,$matches);
    if(isset($matches[1])) {
        foreach ($matches[1] as $v) {
            echo $v;
            echo '<br>';
        }
    }
}
echo '<hr>';


$array = array(
    'site.ru',
    'barakuda',
    'zimbabwe_ru',
    'zimbabwe',
    'zzz-zimbabwe',
    'http://site.ru',
    'www.site.com',
    'www.zimbabwe.com',
    'zimbabwe.com.ua',
    'http://zimbabwe.ru',
);

$q = array(
    'Получить ссылки на реальные сайты (обязательно доменное имя), где имя сайта zimbabwe',
    'Немного сложная работа со строкой. Осуществить проверку каждого слова на присутствие в начале http://, и там, где его нет - дописать.
	 Для этих целей используем обход цикла foreach, и проверку preg_match. Не забываем про экранизацию при помощи preg_quote',
    'Похожее задание, но для сайтов, где не указано доменное имя - дописать .ru, это продолжение предыдущего задания, делается так же само, в одном цикле, просто 2 отдельных условия!',
);
echo '<h7>№6</h7><br><hr>';
echo '<br><h8>№6.1</h8><br><hr>';
foreach ($array as $v){
    $count = preg_match_all("#(http://zimbabwe\..+)#ui",$v,$matches);
    if(isset($matches[0][0])) {
        echo $matches[0][0];
        echo '<br>';
    }
}
echo '<hr>';
echo '<br><h8>№6.2</h8><br><hr>';

foreach ($array as $k => $v){
    if(preg_match("#^(?!http://)#ui",$v)){
        $v = preg_replace("#^(?!http://)#ui","http://",$v);
        $array[$k] = $v;
    }
}

echo '<hr>';
echo '<br><h8>№6.3</h8><br><hr>';
foreach ($array as $v){
    if(preg_match("#(?!.ru)$#ui",$v)){
        $count = preg_replace("#(?![.]ru)$#ui",".ru",$array);
    }
}
if(isset($count)) {
    foreach ($count as $v) {
        echo $v;
        echo '<br>';
    }
}
echo '<hr>';


$array = array(
    'inpost',
    'Barabulka_ru',
    'Zimbabwe.ru',
    'Max',
    'Yojik',
    'Иван Тарасов',
    'Ёжик',
    'Борис Николаевич Кощуновский',
    'Ооооооооооооооооооооочень длинное имя',
    'Я',
    'go->drink->die',
    'Don`t sleep',
    '<Пивасик',
    '1',
    '123456789',
    '77777',
    '7ф777я7',
);

$q = array(
    'Теперь идут операции по работе с логинами и паролями. Очень важно именно при РЕГИСТРАЦИИ:',
    'Проверка на preg_match, разрешить только числам. Подсказка: числа точно так же как и буквы, а именно 0-9 (а-я)',
    'Пропустить только строки, состоящие из цифр 7 и символов ф,я',
    'Пропустить только рус и англ символы, подчеркивание и тире, пробел(!) длиной от 4 до 15 символов',
    'Выбрать логин, который начинается на M и заканчивается на x , я говорю про Max',
);
echo '<h7>№7</h7><br><hr>';
echo '<br><h8>№7.1</h8><br><hr>';
foreach ($array as $v){

if (preg_match("#\d+#u",$v,$matches)) {
        foreach ($matches as $v) {
            echo $v;
            echo '<br>';
        }
    }
}


echo '<hr>';
echo '<br><h8>№7.2</h8><br><hr>';
foreach ($array as $v){
    if (preg_match("#^[7фя]+$#u",$v,$matches)) {
        echo $matches[0];
        echo '<br>';
    }
}


echo '<hr>';
echo '<br><h8>№7.3</h8><br><hr>';
foreach ($array as $v) {
    $count = preg_match_all("#^[a-zа-я_\s-]{4,15}$#ui", $v, $matches);
    foreach ($matches[0] as $v) {
        echo $v;
        echo '<br>';
    }
}


echo '<hr>';
echo '<br><h8>№7.4</h8><br><hr>';
foreach ($array as $v){
    $count = preg_match_all("#M.*x#u",$v,$matches);
    if(isset($matches[0][0])) {
        echo $matches[0][0];
        echo '<br>';
    }
}
echo '<hr>';




$array = array(
    'Я тебя ооооочеень            СИЛЬНО            ЛЮБЛЮ          МОЙ                    ДругБорис! Цёми-Цёми,    Пративный!',
);

$q = array(
    'Вчера писал для себя. Заменить подряд идущие пробелы на один. Чтобы не было их так много. preg_replace',
);

echo '<h7>№8</h7><br><hr>';
foreach ($array as $v){
    $count = preg_replace("#\s{2,}#ui",' ',$v);
echo $count;
}
echo '<hr>';

$array = array(
    'Дата публикации:27 августа 08:43. Был отличный год!',
);

$q = array(
    'Строку мы знаем, меняется лишь день,месяц,время. Необходимо достать:',
    'Время, когда опубликовали',
    'Полностью дату, а именно (27 августа 08:43), она может меняться!',
);

echo '<h7>№9</h7><br><hr>';
echo '<br><h8>№9.1</h8><br><hr>';
foreach ($array as $v){
    $count = preg_match_all("#\d{2}:\d{2}#ui",$v,$matches);
    if(isset($matches[0][0])) {
        echo $matches[0][0];
        echo '<br>';
    }
}
echo '<hr>';
echo '<br><h8>№9.2</h8><br><hr>';
foreach ($array as $v){
    $count = preg_match_all("#\d+\s\w+\s\d{2}:\d{2}#ui",$v,$matches);
    if(isset($matches[0][0])) {
        echo $matches[0][0];
        echo '<br>';
    }
}
echo '<hr>';

$array = array(
    '<a href="file.php">Это ссылка, и тут было классно</a>',
    '<a    href     =       "file.php"     >Это ссылка, и тут было классно</a>',
    '<a    href=file.php >Это ссылка, и тут было классно</a>',
    "<a    href='file.php' >Это ссылка, и тут было классно</a>",
);

$q = array(
    'Используем карманы, необходимо получить путь, куда ссылается и текст внутри тега!
	 Стоит обратить внимание на момент, где символ МОЖЕТ БЫТЬ, а может и не БЫТЬ',
);
echo '<h7>№10</h7><br><hr>';
echo '<br><h8>№10.1</h8><br><hr>';
foreach ($array as $v){
    $count = preg_match_all("#href\s*=\s*(\"|')(.*?)(\"|')#ui",$v,$matches);
    if(isset($matches[2][0])) {
        echo $matches[2][0];
        echo '<br>';
    }
}
echo '<hr>';
echo '<br><h8>№10.2</h8><br><hr>';
foreach ($array as $v){
    $count = preg_match_all("#<a(.+)>.+</a>#ui",$v,$matches);
    if(isset($matches[1][0])) {
            echo $matches[1][0];
            echo '<br>';
    }
}
echo '<hr>';
echo '<br><h8>№10.3</h8><br><hr>';
foreach ($array as $v){
    $count = preg_match_all("#<a.+>(.+)</a>#ui",$v,$matches);
    if(isset($matches[1][0])) {
        echo $matches[1][0];
        echo '<br>';
    }
}
echo '<hr>';


$array = array(
    'text@',
    'yandex@@mega.com',
    'beer@mail.com',
    "inpost.dp.ua",
    "inpostdpua@gmail.com",
);

$q = array(
    'Проверить на валидность е-мейла. Краткая информация (ВАЖНАЯ!), емеил состоит из набора символов маленьких. 
	 Присутствует в центре собака, слева имя ящика, которое может состоять из обычных символов англ И подчеркивания И тире.
	 Справа находятся домены, отделенные точками.',
);
echo '<h7>№11</h7><br><hr>';
foreach ($array as $v){
    $count = preg_match_all("#.+@(gmail|mail|@mega)[.].+#ui",$v,$matches);
    if(isset($matches[0][0])) {
        echo $matches[0][0];
        echo '<br>';
    }
}
echo '<hr>';
$count = preg_match("#^([\w-]+)$#ui",$v,$matches);