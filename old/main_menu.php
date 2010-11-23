<?php
 include "common/session.php";
 include "common/top.php";
?>


<table width="851px" cellpadding="0" cellspacing="0" style="background-color:#ffffff" border="0"> 
 <tr><td height="20px"></td></tr>
 <tr>
	 <td align="center" valign="middle">

		 <table cellpadding="0" cellspacing="0" width="100%" border="0">
			 <tr>
				 <td width="600px" align="center" valign="middle"> <!-- Untuk Utama --> 
						<table cellpadding="7px" cellspacing="0" width="100%" border="0">
							<?php
							$user=mysql_fetch_array(mysql_query("SELECT * FROM member WHERE username='$username'"));
							$jumlah_referal=mysql_num_rows(mysql_query("SELECT * FROM member WHERE referal='$username'"));
							?>
							<tr>
								<td align="center" valign="middle" class="judul" height="30px" colspan="3">
									My Account
								</td>
							</tr>
							<tr>
								<td align="center" valign="middle" class="judul" height="30px" colspan="3">&nbsp;
									
								</td>
							</tr>
							<tr>
								<td class="isi" align="left" valign="middle" colspan="3">
									Selamat datang, <?php echo $user[nama]; ?>
								</td>
							</tr>
							<tr>
								<td align="center" valign="middle" colspan="3">
									
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
									Jumlah Teman: <b><?php echo $jumlah_referal; ?></b>
								</td>
							</tr>
							<tr>
							 <td>&nbsp;</td>
							</tr>
							<tr>
								<td align="left" valign="middle" class="isi">
									Ajak teman-teman Anda dengan menyebarkan link dibawah ini. 
								</td>
							</tr>
							<tr>
								<td align="left" valign="middle" class="isi">
									<input class="isi" size="95" value="http://<?php echo $namaweb; ?>/register1_ref.php?_page=<?php echo $user[page]; ?>&_hal=regis">
								</td>
							</tr>
							<tr>
								<td height="50px" align="left" valign="middle" class="isi">&nbsp;
									
								</td>
							</tr>
							<tr>
								<td align="left" valign="middle" class="isi">
									<input class="isi" type="button" onclick="document.location='edit_profile.php?_page=<?php echo $user[page]; ?>&hal=account'" value="Edit Profile">
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>

		</td>
	</tr>
	<tr><td height="50px"></td></tr>
</table>

<?php
 include "common/bottom.php";
?>