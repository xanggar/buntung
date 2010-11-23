<?php
date_default_timezone_set('Asia/Jakarta');
ini_set("SMTP","mail.buntung.com");
ini_set("smtp_port",25);
ini_set("sendmail_from","noreply@buntung.com");

$dbhost = 'buntung.com';
$dbname = 'bunta_db';
$dbuser = 'bunta';
$dbpass = 'buntung~!@#456';

$date = date('Y-m-d H:i:s');
$tanggal_update = date('Y-m-d H:i:s');
$tanggaltanggal = date('Y-m-d');
$token = date('mdYhis');

$namaweb="www.buntung.com";
$slogan="Entertainment and Fantastic Shopping";
$defa="214";

$register0="Lorem ipsum dolorsit amet, consectetur adipiscing elit Quisque rhoncus Duis rhoncus. ";
$register1="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rhoncus. Duis rhoncus. Nulla facilisi. Fusce et libero. Mauris mattis. Duis vulputate. Vivamus ligula metus, molestie ut, feugiat eget, facilisis nec, felis. Duis fermentum felis eu risus tincidunt viverra. Duis dolor dolor, pretium ac, feugiat vitae, tincidunt interdum";
$register2="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque rhoncus. Duis rhoncus. Nulla facilisi.";

$blog="Some dummy content goes here for the blog page";

$account="Lorem ipsum dolorsit amet, consectetur adipiscing elit Quisque rhoncus Duis rhoncus.";



//MEMBUKA KONEKSI KE DATABASE
$db_connection = mysql_connect($dbhost, $dbuser, $dbpass) or die('Koneksi ke Sql gagal!');
$db_select = mysql_select_db($dbname, $db_connection);
?>