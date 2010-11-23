<?php
 include "common/top_reg2.php";
?>


<table width="851px" cellpadding="0" cellspacing="0" style="background-color:#ffffff" border="0"> 
 <tr><td colspan="2" height="10px"></td></tr>
 <tr>
	 <td align="left" valign="middle">

		 <table cellpadding="0" cellspacing="0" width="100%" border="0">
			 <tr>
				 <td width="580px" align="center" valign="middle"> <!-- Untuk Utama --> 
					 <form action="register2_pro.php" method="post">
							<table cellpadding="7px" cellspacing="0" width="100%" border="0">
								<tr>
									<td align="center" valign="middle" class="judul" colspan="3">
										Data Diri
									</td>
								</tr>
								<tr>
									<td align="center" valign="middle" colspan="3">&nbsp;
										
									</td>
								</tr>
								<tr>
									<td width="28%" align="left" valign="middle" class="isi">Referal</td>
									<td width="2%" align="left" valign="middle" class="isi">:</td>
									<td width="70%" align="left" valign="middle" class="isi"><input value="buntung.com" disabled="disabled" class="isi" name="referal" type="text" size="25" /></td>
								</tr>
								<tr>
									<td width="28%" align="left" valign="middle" class="isi">Username *</td>
									<td width="2%" align="left" valign="middle" class="isi">:</td>
									<td width="70%" align="left" valign="middle" class="isi">
									 <input value="<?php echo $_POST[username]; ?>" class="isi" name="username" type="text" size="25" />
									 &nbsp; 4-10 char
									</td>
								</tr>
								<tr>
									<td width="28%" align="left" valign="middle" class="isi">Password *</td>
									<td width="2%" align="left" valign="middle" class="isi">:</td>
									<td width="70%" align="left" valign="middle" class="isi">
									 <input class="isi" name="password" type="password" size="25" />
									 &nbsp; 5-20 char
									</td>
								</tr>
								<tr>
									<td width="28%" align="left" valign="middle" class="isi">Confirm Password *</td>
									<td width="2%" align="left" valign="middle" class="isi">:</td>
									<td width="70%" align="left" valign="middle" class="isi"><input class="isi" name="password2" type="password" size="25" /></td>
								</tr>
								<tr>
									<td width="28%" align="left" valign="middle" class="isi">Email *</td>
									<td width="2%" align="left" valign="middle" class="isi">:</td>
									<td width="70%" align="left" valign="middle" class="isi"><input value="<?php echo $_POST[email]; ?>" class="isi" name="email" type="text" size="35" /></td>
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
									 <input <?php if($_POST[gender]==1) { ?> checked="checked" <?php } ?> class="isi" type="radio" name="gender" value="1" /> Pria &nbsp; &nbsp; &nbsp; <input class="isi" <?php if($_POST[gender]==2) { ?> checked="checked" <?php } ?> type="radio" name="gender" value="2" /> Wanita
									</td>
								</tr>
								<tr>
									<td width="28%" align="left" valign="middle" class="isi">Nama *</td>
									<td width="2%" align="left" valign="middle" class="isi">:</td>
									<td width="70%" align="left" valign="middle" class="isi"><input value="<?php echo $_POST[nama]; ?>" class="isi" name="nama" type="text" size="35" /></td>
								</tr>
								<tr>
									<td width="28%" align="left" valign="middle" class="isi">Nomor HP *</td>
									<td width="2%" align="left" valign="middle" class="isi">:</td>
									<td width="70%" align="left" valign="middle" class="isi"><input value="<?php echo $_POST[hp]; ?>" class="isi" name="hp" type="text" size="15" /></td>
								</tr>
								<tr>
									<td width="28%" align="left" valign="middle" class="isi">Nomor Telp Rumah</td>
									<td width="2%" align="left" valign="middle" class="isi">:</td>
									<td width="70%" align="left" valign="middle" class="isi">
									 <input value="<?php echo $_POST[kode_area]; ?>" class="isi" name="kode_area" type="text" size="4" /> - <input value="<?php echo $_POST[telp]; ?>" class="isi" name="telp" type="text" size="15" />
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
												<option value="<?php echo $kota3[id_tujuan]; ?>"><?php echo $kota3[tujuan]; ?></option>
												<?php
												}
											?>
										</select>
									</td>
								</tr>
								<tr>
									<td width="28%" align="left" valign="middle" class="isi">Alamat</td>
									<td width="2%" align="left" valign="middle" class="isi">:</td>
									<td width="70%" align="left" valign="middle" class="isi">
									 <textarea name="alamat" class="isi" cols="35" rows="3"><?php echo $_POST[alamat]; ?></textarea>
									</td>
								</tr>
								<tr>
								 <td colspan="3">&nbsp;</td>
								</tr>
								<tr>
									<td width="28%" align="left" valign="middle" class="isi">&nbsp;</td>
									<td width="2%" align="left" valign="middle" class="isi">&nbsp;</td>
									<td width="70%" align="left" valign="middle" class="isi">
									 <input type="submit" value="Next Step" class="isi" style="cursor:pointer" />
									</td>
								</tr>
							</table>
						</form>
					</td>
				 <td width="200px" align="left" valign="top"> <!-- Untuk Kolom Ket Kanan --> 
					 <table cellpadding="0" cellspacing="0" width="100%" border="0">
						 <tr>
							 <td>&nbsp;</td>
							</tr>
						 <tr>
							 <td align="center" valign="top" class="kotak_kategori">
								 <table cellpadding="7px" cellspacing="0" width="100%" border="0">
									 <tr>
										 <td align="center" valign="middle" class="judul_info">Information</td>
										</tr>
										<tr>
										 <td>&nbsp;</td>
										</tr>
									 <tr>
											<td align="left" valign="top" class="informasi2"><font class="informasi">Username >> </font>akan digunakan untuk fasilitas login</td>
										</tr>
									 <tr>
											<td align="left" valign="top" class="informasi2"><font class="informasi">Password >> </font>akan digunakan untuk fasilitas login</td>
										</tr>
									 <tr>
											<td align="left" valign="top" class="informasi2"><font class="informasi">Email >> </font>alamat Email Anda untuk menerima kode aktivasi Account Anda.</td>
										</tr>
									 <tr>
											<td align="left" valign="top" class="informasi2"><font class="informasi">Nama >> </font>sesuai dengan nama Anda di KTP</td>
										</tr>
									 <tr>
											<td align="left" valign="top" class="informasi2"><font class="informasi">Nomor Telepon >> </font>untuk menerima konfirmasi hadiah</td>
										</tr>
									 <tr>
											<td align="left" valign="top" class="informasi2"><font class="informasi">Alamat >> </font>sebagai alamat pengiriman hadiah</td>
										</tr>
										<tr>
										 <td>&nbsp;</td>
										</tr>
									 <tr>
											<td align="center" valign="top" class="informasi2"><font class="informasi">* Mohon data diisi dengan benar </font></td>
										</tr>
									</table> 
								</td>
							</tr>
						</table>
					</td>
				 <td width="20px" align="left" valign="top"> <!-- Untuk Kolom Ket Kanan --> 
					 &nbsp;
					</td>
				</tr>
			</table>

		</td>
	</tr>
	<tr><td colspan="2" height="30px"></td></tr>
</table>

<?php
 include "common/bottom.php";
?>