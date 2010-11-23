<?php
include "autentifikasi.php";
include "common/config.php";
$query="UPDATE pemesanan SET status_bayar='2', admin='$SES_USERNAME' WHERE id_pesan='$_GET[id_pesan]'";
$res=mysql_query($query);
//echo $query; exit;
if($res)
{
 header("location:index.php");
}
?>