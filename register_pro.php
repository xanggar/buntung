<?php
 include "common/top2.php";
?>

<!-- Sub Page Title Starts here-->
<h1>Register Buntung.com</h1>
<p><?php echo $register0; ?></p>
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


					 <?php
							$referal=trim($_POST[referal]);
							$referal2=strtolower($referal);
							$username=trim($_POST[username]);
							$password=$_POST[password];
							$password2=$_POST[password2];
							$email=trim($_POST[email]);
							$email2=trim($_POST[email2]);
							$email3=strtolower($email);
							$gender=$_POST[gender];
							$nama=trim($_POST[nama]);
							$hp=trim($_POST[hp]);
							$kode_area=trim($_POST[kode_area]);
							$telp=trim($_POST[telp]);
							$kota=$_POST[kota];
							$alamat=trim($_POST[alamat]);
							
							
							$cek_en=mysql_num_rows(mysql_query("SELECT * FROM member WHERE email='".$email3."' AND referal='".$referal2."'"));
							$cek_em=mysql_num_rows(mysql_query("SELECT * FROM member WHERE email='".$email3."'"));
							
							
							$username2=strtolower($username);
							$user=mysql_num_rows(mysql_query("SELECT * FROM member WHERE username='$username2'"));
							$ref=mysql_num_rows(mysql_query("SELECT * FROM member WHERE username='$referal2'"));
							
							$valid_name="^[a-z]+[., a-z]+$";
							$valid_mail="^([._a-z0-9-]+[._a-z0-9-]*)@(([a-z0-9-]+\.)*([a-z0-9-]+)(\.[a-z]{2,3}))$";
							$valid_telp="^[\+ 0-9\-]{5,}$";
							$valid_ponsel="^[\+ 0-9\-]{5,}$";
							$valid_zip="^[0-9]{1,}$";

						?>
						<form name="simpan" action="register.php?_page=regis" method="post">
							<input type="hidden" name="referal" size="35" value="<?php echo $_POST[referal]; ?>">
							<input type="hidden" name="username" size="35" value="<?php echo $_POST[username]; ?>">
							<input type="hidden" name="email" size="35" value="<?php echo $_POST[email]; ?>">
							<input type="hidden" name="email2" size="35" value="<?php echo $_POST[email2]; ?>">
							<input type="hidden" name="gender" size="35" value="<?php echo $_POST[gender]; ?>">
							<input type="hidden" name="nama" size="35" value="<?php echo $_POST[nama]; ?>">
							<input type="hidden" name="hp" size="35" value="<?php echo $_POST[hp]; ?>">
							<input type="hidden" name="kode_area" size="35" value="<?php echo $_POST[kode_area]; ?>">
							<input type="hidden" name="telp" size="35" value="<?php echo $_POST[telp]; ?>">
							<input type="hidden" name="kota" size="20" value="<?php echo $kota; ?>">
							<input type="hidden" name="alamat" size="5" value="<?php echo $_POST[alamat]; ?>">
						</form>
						
						<?php
						if(empty($_POST[username]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px">
							 <tr align="center" valign="middle">
							  <td class="isi">Tolong masukan Username Anda.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:simpan.submit()'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table><br><br><br><br><br><br><br><br>
							<?php
						}
						else if($user>0)
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px"><tr align="center" valign="middle">
							  <td class="isi">Username sudah pernah digunakan.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:simpan.submit()'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table><br><br><br><br><br><br><br><br>
							<?php
						}
						else if((strlen($_POST[username])<4) or (strlen($_POST[username])>10))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px"><tr align="center" valign="middle">
							  <td class="isi">Username Anda harus 4-10 Char.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:simpan.submit()'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table><br><br><br><br><br><br><br><br>
							<?php
						}
						else if(empty($_POST[password]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px"><tr align="center" valign="middle">
							  <td class="isi">Tolong masukan Password Anda.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:simpan.submit()'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table><br><br><br><br><br><br><br><br>
							<?php
						}
						else if((strlen($_POST[password])<5) or (strlen($_POST[password])>20))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px"><tr align="center" valign="middle">
							  <td class="isi">Password Anda harus 5-20 Char.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:simpan.submit()'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table><br><br><br><br><br><br><br><br>
							<?php
						}
						else if(empty($_POST[password2]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px"><tr align="center" valign="middle">
							  <td class="isi">Tolong masukan Konfirmasi Password Anda.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:simpan.submit()'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table><br><br><br><br><br><br><br><br>
							<?php
						}
						else if($_POST[password] <> $_POST[password2])
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px"><tr align="center" valign="middle">
							  <td class="isi">Password dan Konfirmasi Password Anda tidak sama.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:simpan.submit()'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table><br><br><br><br><br><br><br><br>
							<?php
						}
						else if(empty($_POST[email]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px"><tr align="center" valign="middle">
							  <td class="isi">Tolong masukan Email Anda.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:simpan.submit()'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table><br><br><br><br><br><br><br><br>
							<?php
						}
						else if(empty($_POST[email2]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px"><tr align="center" valign="middle">
							  <td class="isi">Tolong masukan Konfirmasi Email Anda.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:simpan.submit()'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table><br><br><br><br><br><br><br><br>
							<?php
						}
						else if (!eregi($valid_mail, $_POST[email]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px"><tr align="center" valign="middle">
							  <td class="isi">Email yang Anda masukkan tidak valid.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:simpan.submit()'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table><br><br><br><br><br><br><br><br>
							<?php
						}
						else if($_POST[email] <> $_POST[email2])
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px"><tr align="center" valign="middle">
							  <td class="isi">Email dan Konfirmasi Email Anda tidak sama.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:simpan.submit()'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table><br><br><br><br><br><br><br><br>
							<?php
						}
						else if($cek_em>0)
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px"><tr align="center" valign="middle">
							  <td class="isi">Alamat Email Anda sudah pernah digunakan.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:simpan.submit()'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table><br><br><br><br><br><br><br><br>
							<?php
						}
						else if(empty($_POST[gender]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px"><tr align="center" valign="middle">
							  <td class="isi">Tolong masukan Gender Anda.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:simpan.submit()'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table><br><br><br><br><br><br><br><br>
							<?php
						}
						else if(empty($_POST[nama]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px"><tr align="center" valign="middle">
							  <td class="isi">Tolong masukan Nama Anda.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:simpan.submit()'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table><br><br><br><br><br><br><br><br>
							<?php
						}
						else if (!eregi($valid_name, $_POST[nama]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px"><tr align="center" valign="middle">
							  <td class="isi">Nama Anda tidak valid.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:simpan.submit()'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table><br><br><br><br><br><br><br><br>
							<?php
						}
						else if ((!eregi($valid_ponsel, $_POST[hp]))&&!empty($_POST[hp]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px"><tr align="center" valign="middle">
							  <td class="isi">Nomor HP yang Anda masukkan tidak valid.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:simpan.submit()'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table><br><br><br><br><br><br><br><br>
							<?php
						}
						else if ((!eregi($valid_zip, $_POST[kode_area]))&&!empty($_POST[kode_area]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px"><tr align="center" valign="middle">
							  <td class="isi">Kode Area Telepon yang Anda masukkan tidak valid.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:simpan.submit()'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table><br><br><br><br><br><br><br><br>
							<?php
						}
						else if ((!eregi($valid_telp, $_POST[telp]))&&!empty($_POST[telp]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px"><tr align="center" valign="middle">
							  <td class="isi">Nomor Telepon yang Anda masukkan tidak valid.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:simpan.submit()'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table><br><br><br><br><br><br><br><br>
							<?php
						}
						else if (empty($_POST[hp]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px"><tr align="center" valign="middle">
							  <td class="isi">Anda harus mengisi Nomor HP.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:simpan.submit()'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table><br><br><br><br><br><br><br><br>
							<?php
						}
						else if($referal2==$username2)
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px"><tr align="center" valign="middle">
							  <td class="isi">Referal tidak boleh sama dengan Username yang Anda masukkan.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:simpan.submit()'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table><br><br><br><br><br><br><br><br>
							<?php
						}
						else if($cek_en>0)
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px"><tr align="center" valign="middle">
							  <td class="isi">Alamat Email Anda sudah pernah digunakan.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:simpan.submit()'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table><br><br><br><br><br><br><br><br>
							<?php
						}
						else
						{
						 $masuk_pass=md5($password);
							$useruser=strtolower($username);
							$tokenreg=$token."".$useruser."@reg-buntung.com";
							$tokenreg2=md5($tokenreg);
							
						 $regis="INSERT INTO member (username, password, email, gender, nama, hp, kode_area, telp, id_tujuan, alamat, referal, token, page) 
							        VALUES ('".$username2."', '".$masuk_pass."', '".$email3."', '".$gender."', '".$nama."', '".$hp."', '".$kode_area."', '".$telp."', '".$kota."', '".$alamat."', 'buntung.com', '".$tokenreg."', '".$tokenreg2."')";
						 //echo $regis; exit;
							$regis2=mysql_query($regis);
							if($regis2)
							{
							 $ambil_token=mysql_fetch_array(mysql_query("SELECT username, token, page FROM member WHERE username='".$username."'"));
							 $tujuanemail=strtolower($email);
								
								$tujuan="$tujuanemail";
								$perihal="Kode Aktivasi Account $namaweb";
								// $header="From: Administrator $namaweb";
								$main_content="Dengan hormat,\n\n"; 
								$main_content.="Bersama ini kami sampaikan LINK AKTIVASI KEANGGOTAAN anda di $namaweb.\n\n ";
								$main_content.="Silahkan membuka link dibawah ini untuk mengaktifkan Account Anda di $namaweb.\n\n";
								$main_content.="http://$namaweb/aktif.php?username=".urlencode($username2)."&token=".urlencode($tokenreg)."&page=".urlencode($tokenreg2)."\n\n ";
								$main_content.="Link aktivasi ini dikirimkan dengan tujuan mencegah orang lain menggunakan e-mail anda untuk mendaftar di $namaweb.\n\n ";
								$main_content.="Terima kasih telah mendaftar di $namaweb dan selamat menikmati semua kemudahan serta keuntungan bertransaksi di website kami.\n\n";
								$main_content.="Salam,\nAdministrator\n$namaweb\n\n";
								$signature="\n\n--\n\n";
								$signature.="$namaweb\n";
								$mailcontent=$main_content.$signature;
								// $status=mail($tujuan, $perihal, $mailcontent, $header);
								$status=mail($tujuan, $perihal, $mailcontent, '');
								if($status)
								{
								 ?>
									<script language="javascript">
									 document.location="register2.php?_page=regis";
									</script>
									<?php
								} 
							}
							else
							{
						 ?>
							<table cellpadding="7px" cellspacing="1px"><tr align="center" valign="middle">
							  <td class="isi">FATAL ERROR.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:simpan.submit()'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table><br><br><br><br><br><br><br><br>
							<?php
							}
						}
						?>


</div>
</div>
            <!--End of the Left part text  -->
<!--Right part of text follows here-->
<?php
 include "common/right2.php";
?>
<!--End of the Right part text  -->
      </div>
</div>

<?php
 include "common/bottom.php";
?>
