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
	  <td align="left" valign="middle"><b><big>Form Tambah Berita</big></b></td>
	</tr>
	<tr>
	  <td align="left" valign="top" colspan="2" width="700px">
			<form name="ubah" method="post" action="add_news_pro.php" enctype="multipart/form-data">
				<table cellpadding="6px" cellspacing="0" border="0" width="780px">
					<tr>
						<td align="left" valign="middle" width="23%">Judul Berita *</td>
						<td align="left" valign="middle" width="2%">:</td>
						<td align="left" valign="middle">
							<input type="text" name="judul" size="85" />
							</td>
					</tr>
					<tr>
						<td align="left" valign="middle" width="23%">Isi Berita *</td>
						<td align="left" valign="middle" width="2%">:</td>
						<td align="left" valign="middle">
							<textarea rows="5" cols="85" name="isi"></textarea>
							</td>
					</tr>
					<tr>
						<td align="left" valign="middle" width="23%">Tanggal Berita *</td>
						<td align="left" valign="middle" width="2%">:</td>
						<td align="left" valign="middle">
						<input type="text" name="tanggal_berita" id="sel3" size="15"
						><input type="reset" value=" ... "
						onclick="return showCalendar('sel3', '%Y-%m-%d');">																		
						</td>
					</tr>
				  <tr>
					  <td align="left" valign="middle" width="33%">Gambar</td>
					  <td align="left" valign="middle" width="2%">:</td>
					  <td align="left" valign="middle" width="65%">
						  <input name="gambar" type="file" size="37">
						</td>
					</tr>
					<tr>
						<td height="10px" colspan="3"></td>
					</tr>
					<tr>
						<td align="center" valign="middle" colspan="3">
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
