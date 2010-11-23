<?php
 include "common/session.php";
 include "common/top.php";
?>


<table width="851px" cellpadding="0" cellspacing="0" style="background-color:#ffffff" border="0"> 
 <tr><td height="20px"></td></tr>
 <tr>
	 <td align="center" valign="middle">

					 <?php
							$referal=trim($_POST[referal]);
							$username=trim($_POST[username]);
							$password=$_POST[password];
							$password2=$_POST[password2];
							$email=trim($_POST[email]);
							$email2=trim($_POST[email2]);
							$gender=$_POST[gender];
							$nama=trim($_POST[nama]);
							$hp=trim($_POST[hp]);
							$kode_area=trim($_POST[kode_area]);
							$telp=trim($_POST[telp]);
							$kota=$_POST[kota];
							$alamat=trim($_POST[alamat]);
							
							
							$referal2=strtolower($referal);
							$username2=strtolower($username);
							$user=mysql_num_rows(mysql_query("SELECT * FROM member WHERE username='$username2'"));
							$ref=mysql_num_rows(mysql_query("SELECT * FROM member WHERE username='$referal2'"));
							
							$valid_name="^[a-z]+[., a-z]+$";
							$valid_mail="^([._a-z0-9-]+[._a-z0-9-]*)@(([a-z0-9-]+\.)*([a-z0-9-]+)(\.[a-z]{2,3}))$";
							$valid_telp="^[\+ 0-9\-]{5,}$";
							$valid_ponsel="^[\+ 0-9\-]{5,}$";
							$valid_zip="^[0-9]{1,}$";


						if(empty($_POST[email]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px" style="border:1px solid #acbccc" width="100%">
							 <tr>
							  <td align="center" valign="middle" class="header_error">Edit Profile Error</td>
							 </tr>
							 <tr align="center" valign="middle">
							  <td class="isi2">Tolong masukan Email Anda.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:history.back(-1)'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table>
							<?php
						}
						else if(empty($_POST[email2]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px" style="border:1px solid #acbccc" width="100%">
							 <tr>
							  <td align="center" valign="middle" class="header_error">Edit Profile Error</td>
							 </tr>
							 <tr align="center" valign="middle">
							  <td class="isi2">Tolong masukan Konfirmasi Email Anda.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:history.back(-1)'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table>
							<?php
						}
						else if (!eregi($valid_mail, $_POST[email]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px" style="border:1px solid #acbccc" width="100%">
							 <tr>
							  <td align="center" valign="middle" class="header_error">Edit Profile Error</td>
							 </tr>
							 <tr align="center" valign="middle">
							  <td class="isi2">Email yang Anda masukkan tidak valid.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:history.back(-1)'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table>
							<?php
						}
						else if($_POST[email] <> $_POST[email2])
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px" style="border:1px solid #acbccc" width="100%">
							 <tr>
							  <td align="center" valign="middle" class="header_error">Edit Profile Error</td>
							 </tr>
							 <tr align="center" valign="middle">
							  <td class="isi2">Email dan Konfirmasi Email Anda tidak sama.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:history.back(-1)'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table>
							<?php
						}
						else if(empty($_POST[gender]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px" style="border:1px solid #acbccc" width="100%">
							 <tr>
							  <td align="center" valign="middle" class="header_error">Edit Profile Error</td>
							 </tr>
							 <tr align="center" valign="middle">
							  <td class="isi2">Tolong masukan Gender Anda.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:history.back(-1)'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table>
							<?php
						}
						else if(empty($_POST[nama]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px" style="border:1px solid #acbccc" width="100%">
							 <tr>
							  <td align="center" valign="middle" class="header_error">Edit Profile Error</td>
							 </tr>
							 <tr align="center" valign="middle">
							  <td class="isi2">Tolong masukan Nama Anda.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:history.back(-1)'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table>
							<?php
						}
						else if (!eregi($valid_name, $_POST[nama]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px" style="border:1px solid #acbccc" width="100%">
							 <tr>
							  <td align="center" valign="middle" class="header_error">Edit Profile Error</td>
							 </tr>
							 <tr align="center" valign="middle">
							  <td class="isi2">Nama Anda tidak valid.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:history.back(-1)'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table>
							<?php
						}
						else if(empty($_POST[hp]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px" style="border:1px solid #acbccc" width="100%">
							 <tr>
							  <td align="center" valign="middle" class="header_error">Edit Profile Error</td>
							 </tr>
							 <tr align="center" valign="middle">
							  <td class="isi2">Tolong masukan Nomor HP Anda.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:history.back(-1)'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table>
							<?php
						}
						else if (!eregi($valid_ponsel, $_POST[hp]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px" style="border:1px solid #acbccc" width="100%">
							 <tr>
							  <td align="center" valign="middle" class="header_error">Edit Profile Error</td>
							 </tr>
							 <tr align="center" valign="middle">
							  <td class="isi2">Nomor HP yang Anda masukkan tidak valid.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:history.back(-1)'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table>
							<?php
						}
						else if(empty($_POST[kode_area]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px" style="border:1px solid #acbccc" width="100%">
							 <tr>
							  <td align="center" valign="middle" class="header_error">Edit Profile Error</td>
							 </tr>
							 <tr align="center" valign="middle">
							  <td class="isi2">Tolong masukan Kode Area Telepon Anda.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:history.back(-1)'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table>
							<?php
						}
						else if (!eregi($valid_zip, $_POST[kode_area]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px" style="border:1px solid #acbccc" width="100%">
							 <tr>
							  <td align="center" valign="middle" class="header_error">Edit Profile Error</td>
							 </tr>
							 <tr align="center" valign="middle">
							  <td class="isi2">Kode Area Telepon yang Anda masukkan tidak valid.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:history.back(-1)'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table>
							<?php
						}
						else if(empty($_POST[telp]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px" style="border:1px solid #acbccc" width="100%">
							 <tr>
							  <td align="center" valign="middle" class="header_error">Edit Profile Error</td>
							 </tr>
							 <tr align="center" valign="middle">
							  <td class="isi2">Tolong masukan Nomor Telepon Anda.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:history.back(-1)'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table>
							<?php
						}
						else if (!eregi($valid_telp, $_POST[telp]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px" style="border:1px solid #acbccc" width="100%">
							 <tr>
							  <td align="center" valign="middle" class="header_error">Edit Profile Error</td>
							 </tr>
							 <tr align="center" valign="middle">
							  <td class="isi2">Nomor Telepon yang Anda masukkan tidak valid.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:history.back(-1)'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table>
							<?php
						}
						else if(empty($_POST[alamat]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px" style="border:1px solid #acbccc" width="100%">
							 <tr>
							  <td align="center" valign="middle" class="header_error">Edit Profile Error</td>
							 </tr>
							 <tr align="center" valign="middle">
							  <td class="isi2">Tolong masukan Alamat Anda.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:history.back(-1)'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table>
							<?php
						}
						else
						{
						 $masuk_pass=md5($password);
							$useruser=strtolower($username);
							$tokenreg=$token."".$useruser."@reg-buntung.com";
							$tokenreg2=md5($tokenreg);
							
						 $regis="UPDATE member SET email='".$email."', gender='".$gender."', nama='".$nama."', hp='".$hp."', kode_area='".$kode_area."', 
							        telp='".$telp."', id_tujuan='".$kota."', alamat='".$alamat."' WHERE page='".$_GET[_page]."'";
						 //echo $regis; exit;
							$regis2=mysql_query($regis);
							if($regis2)
							{
							 ?>
								<script language="javascript">
								 alert("Edit Profile Berhasil");
									document.location="main_menu.php";
								</script>
								<?php
							}
							else
							{
						 ?>
							<table cellpadding="7px" cellspacing="1px" style="border:1px solid #acbccc" width="100%">
							 <tr>
							  <td align="center" valign="middle" class="header_error">Edit Profile Error</td>
							 </tr>
							 <tr align="center" valign="middle">
							  <td class="isi2">FATAL ERROR.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:history.back(-1)'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table>
							<?php
							}
						}
						?>

		</td>
	</tr>
	<tr><td height="50px"></td></tr>
</table>

<?php
 include "common/bottom.php";
?>