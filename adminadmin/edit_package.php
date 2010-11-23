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

<script type="text/javascript" src="script/formatangka.js"></script>


<?php
$id_package = val_get('id_package','int');
$qqq="SELECT * FROM packages WHERE id_package='$id_package'";
$rrr=mysql_query($qqq);
$data=mysql_fetch_array($rrr);
?>

<form name="ubah" method="post" action="edit_packages_pro.php?id_package=<?php echo $id_package; ?>">
	<table cellpadding="6px" cellspacing="0" border="0" width="780px">
		<tr>
			<td align="left" valign="middle" colspan="3"><b><big>Edit Package</big></b></td>
		</tr>
		<tr>
			<td align="left" valign="middle" colspan="3">&nbsp;</td>
		</tr>
		<tr>
			<td align="left" valign="middle" width="23%">Nama Packages *</td>
			<td align="left" valign="middle" width="2%">:</td>
			<td align="left" valign="middle" width="75%">
				<input type="text" name="nama" size="35" value="<?php echo $data[nama_package]; ?>" />
				</td>
		</tr>
		<tr>
			<td align="left" valign="middle" width="23%">Jumlah Bids *</td>
			<td align="left" valign="middle" width="2%">:</td>
			<td align="left" valign="middle" width="75%">
				<input type="text" name="jumlah" size="15" value="<?php echo $data[jumlah_bid]; ?>" />
				</td>
		</tr>
		<tr>
			<td align="left" valign="middle" width="23%">Harga *</td>
			<td align="left" valign="middle" width="2%">:</td>
			<td align="left" valign="middle" width="75%">
				Rp. <input type="text" name="harga" size="15" value="<?php echo number_format($data['harga_package'], 0, ',', ','); ?>" onKeyUp="this.value = numFormat(this.value)" />															
			</td>
		</tr>
		<tr>
			<td height="10px" colspan="3"></td>
		</tr>
		<tr>
			<td align="left" valign="middle" width="23%">&nbsp;</td>
			<td align="left" valign="middle" width="2%">&nbsp;</td>
			<td align="left" valign="middle" width="75%">
				<input type="submit" value="Submit" style="cursor:pointer">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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