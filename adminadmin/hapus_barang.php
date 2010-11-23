<?php 
include "../common/config.php";
include "autentifikasi.php";
?>

<html>
<head>
<title>Toko Komputer - Website</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link href="common/style.css" rel="stylesheet" type="text/css">
</head>
<body>
<br><br>
<center>
<table width="800px" cellpadding="10px" cellspacing="1px" border="0">
  <tr>
    <td align="center" valign="middle">
    <?php
      if (!authen())
      { 
      ?>
      <table cellpadding="5px" width="300px">
        <tr>
          <td align="center" valign="middle"><font color="#ff0000"><b><big><br># Halaman Error #</big></b></font><br></td>
        </tr>
	      <tr align="left" valign="middle">
	        <td align="center">Anda harus login untuk mengakses halaman ini.<br></td>
	      </tr>
	      <tr>
	        <td align="center" valign="middle"><a href="login.php" class="link_biru">Klik untuk login</a></td>
	      </tr>
	    </table>
	  <?php
		  exit;
      }
      ?>
	</td>
  </tr>
</table>

<?php


$ee=mysql_fetch_array(mysql_query("SELECT id_product, gambar_barang FROM product WHERE id_product='$_GET[id_product]'"));

$query3="DELETE FROM product WHERE id_product='$_GET[id_product]'";
$result3=mysql_query($query3);
if(result3)
  {  
?>
  <script language="JavaScript">
    document.location="lihat_barang.php"; 
  </script>
<?php
}
?>

</center>
</body>
</html>
