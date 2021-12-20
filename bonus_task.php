 <?php
error_reporting(E_ALL);
header('Content-Type: text/html; charset=utf-8');

$array = [1,2,3,4,5,6];
$result = "";

foreach ($array as $v){
    $result = $result.$v. ".";
}
$result = substr($result,0,-1);
echo $result;