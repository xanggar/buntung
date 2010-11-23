<?php
 include "common/top2.php";
?>


<table width="851px" cellpadding="0" cellspacing="0" style="background-color:#ffffff" border="0"> 
 <tr><td colspan="2" height="10px"></td></tr>
 <tr>
	 <td width="2%">&nbsp;</td>
	 <td width="98%" align="left" valign="middle">

		 <form style="margin:0 0 0 0" name="kuiz" action="register1_ref_pro.php?_page=<?php echo $_GET[_page]; ?>&_hal=regis" method="post">
				<table cellpadding="5px" cellspacing="0" width="100%" border="0">
					<tr>
						<td align="center" valign="top" class="judul">Kuisioner</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td align="left" valign="top" class="isi">
							1. Apakah Anda pengguna internet yang aktif?
						</td>
					</tr>
					<tr>
					 <td align="left" valign="top">
						 &nbsp; &nbsp; &nbsp; <input name="pert1" type="radio" value="1" /> <font class="isi">0-2 jam per hari</font>&nbsp; &nbsp; &nbsp; 
						 &nbsp; &nbsp; &nbsp; <input name="pert1" type="radio" value="2" /> <font class="isi">3-6 jam per hari</font>&nbsp; &nbsp; &nbsp; 
						 &nbsp; &nbsp; &nbsp; <input name="pert1" type="radio" value="3" /> <font class="isi">6-12 jam per hari</font>&nbsp; &nbsp; &nbsp; 
						 &nbsp; &nbsp; &nbsp; <input name="pert1" type="radio" value="4" /> <font class="isi">Lebih dari 12 jam jam per hari</font>
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td align="left" valign="top" class="isi">
							2. Apakah Anda pernah berbelanja melalui Internet?
						</td>
					</tr>
					<tr>
					 <td align="left" valign="top">
						 &nbsp; &nbsp; &nbsp; <input name="pert2" type="radio" value="1" /> <font class="isi">Pernah (Lewati Pertanyaan Nomor 4)</font>&nbsp; &nbsp; &nbsp; 
						 &nbsp; &nbsp; &nbsp; <input name="pert2" type="radio" value="2" /> <font class="isi">Tidak Pernah (Lewati Pertanyaan Nomor 3)</font>
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td align="left" valign="top" class="isi">
							3. Media atau alat transaksi apa yang Anda gunakan untuk bertransaksi melalui internet?
						</td>
					</tr>
					<tr>
					 <td align="left" valign="top">
						 &nbsp; &nbsp; &nbsp; <input name="pert3" type="radio" value="1" /> <font class="isi">Credit Card</font>&nbsp; &nbsp; &nbsp; 
						 &nbsp; &nbsp; &nbsp; <input name="pert3" type="radio" value="2" /> <font class="isi">Tranfer Bank</font>&nbsp; &nbsp; &nbsp; 
						 &nbsp; &nbsp; &nbsp; <input name="pert3" type="radio" value="3" /> <font class="isi">Paypal</font>&nbsp; &nbsp; &nbsp; 
						 &nbsp; &nbsp; &nbsp; <input name="pert3" type="radio" value="4" /> <font class="isi">Cash on Delevery</font> 
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td align="left" valign="top" class="isi">
							4. Mengapa Anda tidak pernah berbelanja melalui internet?
						</td>
					</tr>
					<tr>
					 <td align="left" valign="top">
						 &nbsp; &nbsp; &nbsp; <input name="pert4" type="radio" value="1" /> <font class="isi">Takut</font>&nbsp; &nbsp; &nbsp; 
						 &nbsp; &nbsp; &nbsp; <input name="pert4" type="radio" value="2" /> <font class="isi">Bingung</font>&nbsp; &nbsp; &nbsp; 
						 &nbsp; &nbsp; &nbsp; <input name="pert4" type="radio" value="3" /> <font class="isi">Lama</font>&nbsp; &nbsp; &nbsp; 
						 &nbsp; &nbsp; &nbsp; <input name="pert4" type="radio" value="4" /> <input class="isi" value="(Lainnya)" onFocus="kuiz.lainnya.value=''" name="lainnya" type="text" size="35" />
						</td>
					</tr>
					<tr>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td align="left" valign="top" class="isi">
							5. Barang apa yang Anda cari di internet? (Bisa pilih lebih dari 1)
						</td>
					</tr>
					<tr>
					 <td align="left" valign="top">
						 <table cellpadding="0" cellspacing="0" width="100%" border="0">
							 <tr>
								 <td align="left" valign="top" width="30%">
									&nbsp; &nbsp; &nbsp; <input name="computer" type="checkbox" value="1" /> <font class="isi">Computer</font>&nbsp; &nbsp; &nbsp; <br />
									&nbsp; &nbsp; &nbsp; <input name="handphone" type="checkbox" value="1" /> <font class="isi">Handphone</font>&nbsp; &nbsp; &nbsp; <br />
									&nbsp; &nbsp; &nbsp; <input name="gadget" type="checkbox" value="1" /> <font class="isi">Gadget</font>&nbsp; &nbsp; &nbsp; <br />
									&nbsp; &nbsp; &nbsp; <input name="game" type="checkbox" value="1" /> <font class="isi">Game Console</font>&nbsp; &nbsp; &nbsp; <br />
									&nbsp; &nbsp; &nbsp; <input name="lcd" type="checkbox" value="1" /> <font class="isi">LCD TV, Home Theater</font><br />
									</td>
								 <td align="left" valign="top" width="30%">
									&nbsp; &nbsp; &nbsp; <input name="camera" type="checkbox" value="1" /> <font class="isi">Camera & Digicam</font>&nbsp; &nbsp; &nbsp; <br />
									&nbsp; &nbsp; &nbsp; <input name="fashion" type="checkbox" value="1" /> <font class="isi">Fashion & ACC</font>&nbsp; &nbsp; &nbsp; <br />
									&nbsp; &nbsp; &nbsp; <input name="kendaraan" type="checkbox" value="1" /> <font class="isi">Kendaraan</font>&nbsp; &nbsp; &nbsp; <br />
									&nbsp; &nbsp; &nbsp; <input name="ebook" type="checkbox" value="1" /> <font class="isi">Ebook or Book</font>&nbsp; &nbsp; &nbsp; <br />
									&nbsp; &nbsp; &nbsp; <input name="furniture" type="checkbox" value="1" /> <font class="isi">Furniture</font><br />
									</td>
								 <td align="left" valign="top" width="40%">
									&nbsp; &nbsp; &nbsp; <input name="property" type="checkbox" value="1" /> <font class="isi">Property</font>&nbsp; &nbsp; &nbsp; <br />
									&nbsp; &nbsp; &nbsp; <input name="home" type="checkbox" value="1" /> <font class="isi">Home & Office</font>&nbsp; &nbsp; &nbsp; <br />
									&nbsp; &nbsp; &nbsp; <input name="handmade" type="checkbox" value="1" /> <font class="isi">Handmade & Art</font>&nbsp; &nbsp; &nbsp; <br />
									&nbsp; &nbsp; &nbsp; <input name="pulsa" type="checkbox" value="1" /> <font class="isi">Pulsa</font>&nbsp; &nbsp; &nbsp; <br />
									&nbsp; &nbsp; &nbsp; <input name="lainlagi" type="checkbox" value="1" /> <font class="isi">Lainnya</font> <textarea cols="31" rows="3" name="lainlagi2"></textarea>
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
					 <td>&nbsp;</td>
					</tr>
					<tr>
					 <td>&nbsp;</td>
					</tr>
					<tr>
						<td align="center" valign="top" class="judul">
						 <input type="submit" value="Next Step" style="cursor:pointer" class="isi" />
						</td>
					</tr>
				</table>
			</form>

		</td>
	</tr>
	<tr><td colspan="2" height="30px"></td></tr>
</table>

<?php
 include "common/bottom.php";
?>