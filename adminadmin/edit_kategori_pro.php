<?php
include "common/top_admin.php";
?>
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

<table width="800px" cellpadding="6px" cellspacing="0" border="0">
  <tr>
	  <td align="right" valign="middle">&nbsp;</td>
	</tr>
</table>

<?php
$id_kategori = val_get('id_kategori', 'int');
$deskripsi = val_post('deskripsi', 'text');
$abc="SELECT * FROM kategori WHERE deskripsi='$deskripsi'";
$ccc=mysql_query($abc);
$fff=mysql_fetch_array($ccc);

if (empty($deskripsi))
{
?>
   <table cellpadding="10px" cellspacing="1px" border="0" width="400px">
     <tr>
      <td align="center" valign="middle" class="header_error">Tambah Kategori Utama Error</td>
     </tr>
	   <tr align="center" valign="middle">
		   <td>Tolong masukkan Kategori Utama.<br></td>
		 </tr>
		 <tr>
		   <td align="center" valign="middle"><a href='javascript:history.back(-1)' class="link_kecil">Kembali ke halaman sebelumnya</a></td>
		 </tr>
	</table>
  <?php
  }
else if (mysql_num_rows($ccc)>0)
{
?>
   <table cellpadding="10px" cellspacing="1px" border="0" width="400px">
     <tr>
      <td align="center" valign="middle" class="header_error">Tambah Kategori Utama Error</td>
     </tr>
	   <tr align="center" valign="middle">
		   <td>Kategori Utama, <font color="#ff0000"><big><?php echo $fff['deskripsi']; ?></big></font>, sudah digunakan.<br></td>
		 </tr>
		 <tr>
		   <td align="center" valign="middle"><a href='javascript:history.back(-1)' class="link_kecil">Kembali ke halaman sebelumnya</a></td>
		 </tr>
	</table>
  <?php
  }
else
{
$query3="UPDATE kategori SET deskripsi='$deskripsi' WHERE id_kategori='$id_kategori'";
$result3=mysql_query($query3);
if($result3)
  {
  ?>
    <script language="JavaScript">
      document.location="lihat_kategori_utama.php";
    </script>
  <?php
  }
}
?>

<table width="800px">
  <tr>
	  <td align="center" valign="middle" height="20px"></td>
	</tr>
</table>


<?php
include "common/footer_admin.php";
?>