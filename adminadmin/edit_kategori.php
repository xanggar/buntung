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
$id_kategori = val_get('id_kategori','int');
$qqq="SELECT * FROM kategori WHERE id_kategori='$id_kategori'";
$rrr=mysql_query($qqq);
$data=mysql_fetch_array($rrr);
?>

<form name="ubah" method="post" action="edit_kategori_pro.php?id_kategori=<?php echo $data['id_kategori']; ?>">
  <table cellpadding="10px" cellspacing="0" border="0" width="300px" style="border:1px solid #acbccc">
	  <tr>
		  <td align="left" valign="middle"><b><big>Edit Kategori Utama</big></b></td>
		</tr>
		<tr>
		  <td align="center" valign="middle"><input name="deskripsi" value="<?php echo $data['deskripsi']; ?>"></td>
		</tr>
		<tr>
		  <td align="center" valign="middle">
			  <input type="submit" value="Ubah" style="cursor:pointer">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		    <input type="button" value="Cancel" onClick="javascript:history.back(-1)" style="cursor:pointer">
			</td>
		</tr>
	</table>
</form>
<table width="800px">
  <tr>
	  <td align="center" valign="middle" height="20px"></td>
	</tr>
</table>


<?php
include "common/footer_admin.php";
?>