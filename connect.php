<?php
$sdb_name      = "127.0.0.1";
$user_name     = "root";
$user_password = "123";
$db_name       = "listAndCommnets";

$link = mysqli_connect($sdb_name, $user_name, $user_password, $db_name);
if(!$link){
    die('Ошибка соединения: '.mysqli_error($link));
}