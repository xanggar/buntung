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
					 <form action="register2_ref_conf_pro.php?_page=<?php echo $_GET[_page]; ?>&_hal=regis" method="post">
							<table cellpadding="7px" cellspacing="0" width="100%" border="0">
								<tr>
									<td align="center" valign="middle" class="judul" colspan="3">
										Konfirmasi Pendaftaran
									</td>
								</tr>
								<tr>
									<td align="center" valign="middle" colspan="3">&nbsp;
										
									</td>
								</tr>
								<tr>
									<td align="left" valign="middle" class="isi">
									 Link Aktivasi telah dikirimkan ke alamat Email Anda. Masuk ke Link aktivasi tersebut untuk mengaktifkan account Anda.
									</td>
								</tr>
								<tr>
									<td align="center" valign="middle" colspan="3">&nbsp;
										
									</td>
								</tr>
								<tr>
									<td align="left" valign="middle" class="isi">
									 Periksa Inbox Email Anda untuk Email Aktivasi dari www.buntung.com. <br />
										* Periksa juga Folder Spam atau Bulk Anda, ada kemungkinan Email dari kami masuk ke folder tersebut.
									</td>
								</tr>
								<tr>
									<td align="center" valign="middle" colspan="3" height="50px">&nbsp;
										
									</td>
								</tr>
								<tr>
									<td align="left" valign="middle" class="isi">
										Belum menerima Link Aktivasi?
									</td>
								</tr>
								<tr>
									<td align="left" valign="middle" class="isi">
									 <?php 
										 $cek=mysql_fetch_array(mysql_query("SELECT * FROM member WHERE page='".$_GET[_page]."'"));
										?>
										&nbsp; &nbsp; &nbsp;Alamat Email Anda( <?php echo $cek[email]; ?> )
									</td>
								</tr>
								<tr>
									<td align="left" valign="middle" class="isi">
										&nbsp; &nbsp; &nbsp;<input type="button" onClick="document.location='kirim_ulang_ref.php?_page=<?php echo $_GET[_page]; ?>'" class="isi" value="Kirim Ulang">
										&nbsp; &nbsp; | &nbsp; &nbsp; <input type="button" onclick="document.location='login.php'" value="Login?" class="isi" />
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
														<td align="left" valign="top" class="informasi2">Silahkan cek Email Anda di folder inbox atau folder bulk/spam</td>
													</tr>
												</table> 
											</td>
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