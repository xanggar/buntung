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
  <?php
		 $detail=mysql_fetch_array(mysql_query("SELECT * FROM detail_contact WHERE id_detail_contact='1'"));
		?>
  <tr bgcolor="#efefef">
	  <td align="left" valign="middle"><b><big>Form Detail Contact <?php echo $namaweb; ?></big></b></td>
	</tr>
	<tr>
	  <td align="left" valign="top" colspan="2" width="700px">
			<form name="ubah" method="post" action="detail_contact_pro.php">
				<table cellpadding="6px" cellspacing="0" border="0" width="780px">
					<tr>
						<td align="left" valign="middle" width="23%">Alamat Kantor *</td>
						<td align="left" valign="middle" width="2%">:</td>
						<td align="left" valign="middle">
							<input type="text" name="alamat" size="85" value="<?php echo $detail[alamat]; ?>" />
							</td>
					</tr>
					<tr>
						<td align="left" valign="middle" width="23%">Gmail *</td>
						<td align="left" valign="middle" width="2%">:</td>
						<td align="left" valign="middle">
							<input type="text" name="gmail" size="45" value="<?php echo $detail[gmail]; ?>" />
							</td>
					</tr>
					<tr>
						<td align="left" valign="middle" width="23%">Yahoo *</td>
						<td align="left" valign="middle" width="2%">:</td>
						<td align="left" valign="middle">
							<input type="text" name="yahoo" size="45" value="<?php echo $detail[yahoo]; ?>" />
							</td>
					</tr>
					<tr>
						<td align="left" valign="middle" width="23%">MSN *</td>
						<td align="left" valign="middle" width="2%">:</td>
						<td align="left" valign="middle">
							<input type="text" name="msn" size="45" value="<?php echo $detail[msn]; ?>" />
							</td>
					</tr>
					<tr>
						<td align="left" valign="middle" width="23%">Office *</td>
						<td align="left" valign="middle" width="2%">:</td>
						<td align="left" valign="middle">
							<input type="text" name="office" size="45" value="<?php echo $detail[telp_office]; ?>" />
							</td>
					</tr>
					<tr>
						<td align="left" valign="middle" width="23%">FAX *</td>
						<td align="left" valign="middle" width="2%">:</td>
						<td align="left" valign="middle">
							<input type="text" name="fax" size="45" value="<?php echo $detail[fax]; ?>" />
							</td>
					</tr>
					<tr>
						<td align="left" valign="middle" width="23%">Mobile *</td>
						<td align="left" valign="middle" width="2%">:</td>
						<td align="left" valign="middle">
							<input type="text" name="mobile" size="45" value="<?php echo $detail[mobile]; ?>" />
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
