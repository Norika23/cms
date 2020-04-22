<?php
ob_start();

require $_SERVER['DOCUMENT_ROOT'].'/cms/vendor/autoload.php';

$dotenv = new \Dotenv\Dotenv(__DIR__);
$dotenv->load();

$url = $_SERVER['HTTP_HOST'];
if(strstr($url,'localhost')==true) {


    $db['db_host'] = getenv('DB_HOST_L');
    $db['db_user'] = getenv('DB_USER_L');
    $db['db_pass'] = getenv('DB_PASS_L');
    $db['db_name'] = getenv('DB_NAME_L');


} elseif(strstr($url,'punipuni.space')==true) {

    $db['db_host'] = getenv('DB_HOST');;
    $db['db_user'] = getenv('DB_USER');;
    $db['db_pass'] = getenv('DB_PASS');;
    $db['db_name'] = getenv('DB_NAME');;

}


foreach($db as $key => $value) {

    define(strtoupper($key), $value);

}


$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
mysqli_set_charset($connection,"utf8");


?>