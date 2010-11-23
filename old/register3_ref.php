<?php
 include "common/top_reg3.php";
?>


<table width="851px" cellpadding="0" cellspacing="0" style="background-color:#ffffff" border="0"> 
 <tr><td height="10px"></td></tr>
 <tr>
	 <td align="center" valign="middle">
						<table cellpadding="7px" cellspacing="0" width="100%" border="0">
							<tr>
								<td align="center" valign="middle" class="judul" colspan="3">
									Invite Friends
								</td>
							</tr>
							<tr>
								<td align="center" valign="middle" colspan="3">&nbsp;
									
								</td>
							</tr>
							<tr>
								<td align="left" valign="middle" class="isi">
									Account Anda Telah Aktif.
								</td>
							</tr>
							<tr>
								<td align="left" valign="middle" class="isi">
									Ajak teman-teman Anda dengan menyebarkan link dibawah ini. 
								</td>
							</tr>
							<tr>
								<td align="left" valign="middle" class="isi">
									<input class="isi" size="100" value="http://<?php echo $namaweb; ?>/register1_ref.php?_page=<?php echo $_GET[_page]; ?>&_hal=regis">
								</td>
							</tr>
							<tr>
								<td height="50px" align="left" valign="middle" class="isi">&nbsp;
									
								</td>
							</tr>
							<tr>
								<td align="left" valign="middle" class="isi">
									<input class="isi" type="button" onclick="document.location='index.php'" value="Finish">
								</td>
							</tr>
						</table>
		</td>
	</tr>
	<tr><td height="30px"></td></tr>
</table>

<?php
 include "common/bottom.php";
?>