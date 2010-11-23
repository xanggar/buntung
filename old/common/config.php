<?php
$dbhost = 'localhost';
$dbname = 'bunta_db';
$dbuser = 'root';
$dbpass = 'h4untb33';

$date = date('Y-m-d H:i:s');
$tanggaltanggal = date('Y-m-d');
$token = date('mdYhis');

$namaweb="www.buntung.com";
$slogan="Entertainment and Fantastic Shopping";
$defa="214";

//MEMBUKA KONEKSI KE DATABASE
$db_connection = mysql_connect($dbhost, $dbuser, $dbpass) or die('Koneksi ke Sql gagal!');
$db_select = mysql_select_db($dbname, $db_connection);
?>