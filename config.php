<?php
$host = "localhost";

$user = "root"; //db user

$pass = ""; //db pass

$db = "betfun"; //db 



$path='http://localhost/'.$_SERVER['SERVER_NAME']."/";

echo $path;

$server = mysqli_connect($host,$user,$pass,$db);

if(!$server){

	die("เชื่อมต่อฐานข้อมูลไม่สำเร็จ!" .mysqli_error());

}

mysqli_set_charset($server,"utf8mb4");



?>