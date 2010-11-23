<?php
 include "common/session.php";
 include "common/top.php";
?>


<table width="851px" cellpadding="0" cellspacing="0" style="background-color:#ffffff" border="0"> 
 <tr><td height="20px"></td></tr>
 <tr>
	 <td align="center" valign="middle">

		    <?php
							$user=mysql_fetch_array(mysql_query("SELECT * FROM member WHERE page='$_GET[_page]'"));
						?>
					 <form action="edit_profile_pro.php?_page=<?php echo $_GET[_page]; ?>" method="post">
							<table cellpadding="7px" cellspacing="0" width="100%" border="0">
								<tr>
									<td align="center" valign="middle" class="judul" colspan="3">
										Edit Profile
									</td>
								</tr>
								<tr>
									<td align="center" valign="middle" colspan="3">&nbsp;
										
									</td>
								</tr>
								<tr>
									<td width="28%" align="left" valign="middle" class="isi">Username *</td>
									<td width="2%" align="left" valign="middle" class="isi">:</td>
									<td width="70%" align="left" valign="middle" class="isi">
									 <input disabled="disabled" value="<?php echo $user[username]; ?>" class="isi" name="username" type="text" size="25" />
									 &nbsp; 4-10 char
									</td>
								</tr>
								<tr>
									<td width="28%" align="left" valign="middle" class="isi">Email *</td>
									<td width="2%" align="left" valign="middle" class="isi">:</td>
									<td width="70%" align="left" valign="middle" class="isi"><input value="<?php echo $user[email]; ?>" class="isi" name="email" type="text" size="35" /></td>
								</tr>
								<tr>
									<td width="28%" align="left" valign="middle" class="isi">Confirm Email *</td>
									<td width="2%" align="left" valign="middle" class="isi">:</td>
									<td width="70%" align="left" valign="middle" class="isi"><input class="isi" name="email2" type="text" size="35" /></td>
								</tr>
								<tr>
									<td width="28%" align="left" valign="middle" class="isi">Gender *</td>
									<td width="2%" align="left" valign="middle" class="isi">:</td>
									<td width="70%" align="left" valign="middle" class="isi">
									 <input <?php if($user[gender]==1) { ?> checked="checked" <?php } ?> class="isi" type="radio" name="gender" value="1" /> Pria &nbsp; &nbsp; &nbsp; <input class="isi" <?php if($user[gender]==2) { ?> checked="checked" <?php } ?> type="radio" name="gender" value="2" /> Wanita
									</td>
								</tr>
								<tr>
									<td width="28%" align="left" valign="middle" class="isi">Nama *</td>
									<td width="2%" align="left" valign="middle" class="isi">:</td>
									<td width="70%" align="left" valign="middle" class="isi"><input value="<?php echo $user[nama]; ?>" class="isi" name="nama" type="text" size="35" /></td>
								</tr>
								<tr>
									<td width="28%" align="left" valign="middle" class="isi">Nomor HP</td>
									<td width="2%" align="left" valign="middle" class="isi">:</td>
									<td width="70%" align="left" valign="middle" class="isi"><input value="<?php echo $user[hp]; ?>" class="isi" name="hp" type="text" size="15" /></td>
								</tr>
								<tr>
									<td width="28%" align="left" valign="middle" class="isi">Nomor Telp Rumah</td>
									<td width="2%" align="left" valign="middle" class="isi">:</td>
									<td width="70%" align="left" valign="middle" class="isi">
									 <input value="<?php echo $user[kode_area]; ?>" class="isi" name="kode_area" type="text" size="4" /> - <input value="<?php echo $user[telp]; ?>" class="isi" name="telp" type="text" size="15" />
									</td>
								</tr>
								<tr>
									<td width="28%" align="left" valign="middle" class="isi">Kota *</td>
									<td width="2%" align="left" valign="middle" class="isi">:</td>
									<td width="70%" align="left" valign="middle" class="isi">
									 <select name="kota" class="isi">
										 <?php
											 $kota="SELECT * FROM tujuan ORDER BY tujuan ASC";
												$kota2=mysql_query($kota);
												while($kota3=mysql_fetch_array($kota2))
												{
												?>
												<option <?php if($user[id_tujuan]==$kota3[id_tujuan]) { ?> selected="selected" <?php } ?> value="<?php echo $kota3[id_tujuan]; ?>"><?php echo $kota3[tujuan]; ?></option>
												<?php
												}
											?>
										</select>
									</td>
								</tr>
								<tr>
									<td width="28%" align="left" valign="middle" class="isi">Alamat *</td>
									<td width="2%" align="left" valign="middle" class="isi">:</td>
									<td width="70%" align="left" valign="middle" class="isi">
									 <textarea name="alamat" class="isi" cols="35" rows="3"><?php echo $user[alamat]; ?></textarea>
									</td>
								</tr>
								<tr>
								 <td colspan="3">&nbsp;</td>
								</tr>
								<tr>
									<td width="28%" align="left" valign="middle" class="isi">&nbsp;</td>
									<td width="2%" align="left" valign="middle" class="isi">&nbsp;</td>
									<td width="70%" align="left" valign="middle" class="isi">
									 <input type="submit" value="Edit Profile" class="isi" style="cursor:pointer" />
										&nbsp; &nbsp;
									 <input type="button" onClick="document.location='main_menu.php?_hal=account'" value=" Cancel " class="isi" style="cursor:pointer" />
									</td>
								</tr>
							</table>
						</form>

		</td>
	</tr>
	<tr><td height="50px"></td></tr>
</table>

<?php
 include "common/bottom.php";
?>