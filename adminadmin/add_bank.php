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
							<td align="center">Kamu harus login untuk mengakses halaman ini.<br></td>
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
$user_id=$_GET[id];

?>

<br /><br />

<form name="ubah" method="post" action="add_bank_pro.php">
  <table cellpadding="10px" cellspacing="0" border="0" width="800px" style="border:1px solid #acbccc">
	  <tr>
		  <td align="left" valign="middle" colspan="3"><b><big>Tambah Rekening</big></b></td>
		</tr>
		<tr>
		  <td align="left" valign="middle" width="23%">Nama Bank *</td>
			<td align="left" valign="middle" width="2%">:</td>
		  <td align="left" valign="middle"><input name="nama" size="45"></td>
		</tr>
		<tr>
		  <td align="left" valign="middle" width="23%">Nomor Rekening *</td>
			<td align="left" valign="middle" width="2%">:</td>
		  <td align="left" valign="middle"><input name="nomor" size="45"></td>
		</tr>
		<tr>
		  <td align="left" valign="middle" width="23%">Atas Nama *</td>
			<td align="left" valign="middle" width="2%">:</td>
		  <td align="left" valign="middle"><input name="atasnama" size="45"></td>
		</tr>
		<tr>
		  <td></td>
				<td></td>
		  <td align="left" valign="middle">
			  <input type="submit" value="Tambah" style="cursor:pointer">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		    <input type="button" value="Cancel" onClick="document.location='javascript:history.back(-1)'" style="cursor:pointer">
			</td>
		</tr>
		<tr>
		 <td height="20px" colspan="3"></td>
		</tr>
			<tr>
			 <td align="left" valign="middle" width="23%"><b>Catatan:</b> &nbsp;* harus diisi</td>
		 <td align="center" valign="middle" width="2%"></td>
		 <td align="left" valign="middle" width="75%">
		 </td>
			</tr>
	</table>
</form>

<table>
 <tr>
	 <td height="20px"></td>
	</tr>
</table>

<?php
 include "common/footer_admin.php";
?>