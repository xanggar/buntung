<?php
 include "common/top2.php";
?>

<!-- Sub Page Title Starts here-->
<h1>Register Buntung.com</h1>
<p>Lorem ipsum dolorsit amet, consectetur adipiscing elit Quisque rhoncus Duis rhoncus. </p>
<!-- Sub Page Title End here-->
</div>
</div>
</div>
<div class="clear">&nbsp;</div>
<div class="content cbg">
<div class="container_16 linebg">
<!--left part of text follows here-->
<div class="grid_11 para sepline">
<div class="text">
<h2>Register Now</h2>
<p><?php echo $register1; ?></p>
<p> <strong><?php echo $register2; ?></strong> </p>

<!-- Contact Form Start -->
					 <form action="register_pro.php" method="post">
							<table cellpadding="7px" cellspacing="0" width="100%" border="0">
								<tr>
									<td align="center" valign="middle" colspan="3">&nbsp;
										
									</td>
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
												<option <?php if($kota3[tujuan]=="JAKARTA") { ?> selected="selected" <?php } ?> value="<?php echo $kota3[id_tujuan]; ?>"><?php echo $kota3[tujuan]; ?></option>
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
						<br /><br /><br /><Br /><br /><br /><Br /><br /><br /><Br /><br /><br />
<!-- Contact Form end -->
</div>
</div>
            <!--End of the Left part text  -->
<!--Right part of text follows here-->
<?php
 include "common/right.php";
?>
<!--End of the Right part text  -->
      </div>
</div>

<?php
 include "common/bottom.php";
?>
