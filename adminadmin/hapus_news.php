<?php 
include "../common/config.php";
include "autentifikasi.php";


$gam=mysql_fetch_array(mysql_query("SELECT * FROM berita_ringan WHERE brid='$_GET[id_news]'"));

$hapus=unlink("../images_news/$gam[gambar_news]");
if($hapus)
{

$query3="DELETE FROM berita_ringan WHERE brid='$_GET[id_news]'";
$result3=mysql_query($query3);
if(result3)
  {  
?>
  <script language="JavaScript">
    document.location="lihat_news.php"; 
  </script>
<?php
 }
}
?>

</center>
</body>
</html>
