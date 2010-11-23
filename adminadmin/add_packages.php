<?php
include "common/top_admin.php";
?>

<script type="text/javascript" src="script/formatangka.js"></script>

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

<table width="800px">
 <tr>
	 <td height="20px" align="right" valign="middle">&nbsp;</td>
	</tr>
</table>

<table cellpadding="6px" cellspacing="0" style="border:1px solid #acbccc" width="700px">
  <tr bgcolor="#efefef">
	  <td align="left" valign="middle"><b><big>Form Tambah Packages Bidding</big></b></td>
	</tr>
	<tr>
	  <td align="left" valign="top" colspan="2" width="700px">
			<form name="ubah" method="post" action="add_packages_pro.php">
				<table cellpadding="6px" cellspacing="0" border="0" width="780px">
					<tr>
						<td align="left" valign="middle" width="23%">Nama Packages *</td>
						<td align="left" valign="middle" width="2%">:</td>
						<td align="left" valign="middle" width="75%">
							<input type="text" name="nama" size="35" />
							</td>
					</tr>
					<tr>
						<td align="left" valign="middle" width="23%">Jumlah Bids *</td>
						<td align="left" valign="middle" width="2%">:</td>
						<td align="left" valign="middle" width="75%">
							<input type="text" name="jumlah" size="15" />
							</td>
					</tr>
					<tr>
						<td align="left" valign="middle" width="23%">Harga *</td>
						<td align="left" valign="middle" width="2%">:</td>
						<td align="left" valign="middle" width="75%">
						 Rp. <input type="text" name="harga" size="15" onKeyUp="this.value = numFormat(this.value)" />															
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
	  </td>
	</tr>
</table>

<table>
 <tr>
	 <td height="20px"></td>
	</tr>
</table>
<?php
 include "common/footer_admin.php";
?>
