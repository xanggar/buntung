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

<table width="800px">
 <tr>
	 <td height="20px" align="right" valign="middle">&nbsp;</td>
	</tr>
</table>

<table cellpadding="6px" cellspacing="0" style="border:1px solid #acbccc" width="700px">
  <tr bgcolor="#efefef">
	  <td align="left" valign="middle"><b><big>Silahkan Pilih Menu yang Akan diberikan</big></b></td>
	</tr>
	<tr>
	  <td align="left" valign="top" colspan="2" width="700px">
			<form name="ubah" method="post" action="autoro_admin.php">
				<table cellpadding="6px" cellspacing="0" border="0" width="780px">
					<tr>
						<td align="left" valign="middle" width="23%">Instant Buy</td>
						<td align="left" valign="middle" width="2%">:</td>
						<td align="left" valign="middle">
							<input type="checkbox" name="instant_buy" value="1" />
							</td>
					</tr>
					<tr>
						<td align="left" valign="middle" width="23%">Booking</td>
						<td align="left" valign="middle" width="2%">:</td>
						<td align="left" valign="middle">
							<input type="checkbox" name="booking" value="1" />
							</td>
					</tr>
					<tr>
						<td align="left" valign="middle" width="23%">Payment</td>
						<td align="left" valign="middle" width="2%">:</td>
						<td align="left" valign="middle">
							<input type="checkbox" name="payment" value="1" />
							</td>
					</tr>
					<tr>
						<td align="left" valign="middle" width="23%">Katalog Barang</td>
						<td align="left" valign="middle" width="2%">:</td>
						<td align="left" valign="middle">
							<input type="checkbox" name="katalog_barang" value="1" />
							</td>
					</tr>
					<tr>
						<td align="left" valign="middle" width="23%">Berita dan Kegiatan</td>
						<td align="left" valign="middle" width="2%">:</td>
						<td align="left" valign="middle">
							<input type="checkbox" name="berita" value="1" />
							</td>
					</tr>
					<tr>
						<td align="left" valign="middle" width="23%">Packages</td>
						<td align="left" valign="middle" width="2%">:</td>
						<td align="left" valign="middle">
							<input type="checkbox" name="packages" value="1" />
							</td>
					</tr>
					<tr>
						<td align="left" valign="middle" width="23%">More Setting</td>
						<td align="left" valign="middle" width="2%">:</td>
						<td align="left" valign="middle">
							<input type="checkbox" name="more_setting" value="1" />
							</td>
					</tr>
					<tr>
						<td height="10px" colspan="3"></td>
					</tr>
					<tr>
						<td align="left" valign="middle" width="23%">&nbsp;</td>
						<td align="left" valign="middle" width="2%">&nbsp;</td>
						<td align="left" valign="middle">
							<input type="submit" value="Submit" style="cursor:pointer">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						</td>
					</tr>
				</table>
			</form>
	  </td>
	</tr>
	<tr>
	 <td height="30px" colspan="3"></td>
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
