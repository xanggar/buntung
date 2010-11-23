<?php
 include "common/top3.php";
?>

<!-- Sub Page Title Starts here-->
<h1><?php echo $NAMA; ?> Account</h1>
<p><?php echo $account; ?></p>
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

<!-- Contact Form Start -->

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
							<table cellpadding="7px" cellspacing="1px" width="100%">
							 <tr>
							  <td align="left" valign="middle"><h2>Edit Profile Error</h2></td>
							 </tr>
							 <tr>
							  <td class="isi2">Tolong masukan Email Anda.<br></td>
							 </tr>
							 <tr>
							  <td align="left" valign="middle"><a href='javascript:history.back(-1)'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table>
							<?php
						}
						else if (!eregi($valid_mail, $_POST[email]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px" width="100%">
							 <tr>
							  <td align="left" valign="middle"><h2>Edit Profile Error</h2></td>
							 </tr>
							 <tr>
							  <td class="isi2">Email yang Anda masukkan tidak valid.<br></td>
							 </tr>
							 <tr>
							  <td align="left" valign="middle"><a href='javascript:history.back(-1)'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table>
							<?php
						}
						else if(empty($_POST[gender]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px" width="100%">
							 <tr>
							  <td align="left" valign="middle"><h2>Edit Profile Error</h2></td>
							 </tr>
							 <tr>
							  <td class="isi2">Tolong masukan Gender Anda.<br></td>
							 </tr>
							 <tr>
							  <td align="left" valign="middle"><a href='javascript:history.back(-1)'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table>
							<?php
						}
						else if(empty($_POST[nama]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px" width="100%">
							 <tr>
							  <td align="left" valign="middle"><h2>Edit Profile Error</h2></td>
							 </tr>
							 <tr>
							  <td class="isi2">Tolong masukan Nama Anda.<br></td>
							 </tr>
							 <tr>
							  <td align="left" valign="middle"><a href='javascript:history.back(-1)'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table>
							<?php
						}
						else if (!eregi($valid_name, $_POST[nama]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px" width="100%">
							 <tr>
							  <td align="left" valign="middle"><h2>Edit Profile Error</h2></td>
							 </tr>
							 <tr>
							  <td class="isi2">Nama Anda tidak valid.<br></td>
							 </tr>
							 <tr>
							  <td align="left" valign="middle"><a href='javascript:history.back(-1)'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table>
							<?php
						}
						else if(empty($_POST[hp]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px" width="100%">
							 <tr>
							  <td align="left" valign="middle"><h2>Edit Profile Error</h2></td>
							 </tr>
							 <tr>
							  <td class="isi2">Tolong masukan Nomor HP Anda.<br></td>
							 </tr>
							 <tr>
							  <td align="left" valign="middle"><a href='javascript:history.back(-1)'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table>
							<?php
						}
						else if (!eregi($valid_ponsel, $_POST[hp]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px" width="100%">
							 <tr>
							  <td align="left" valign="middle"><h2>Edit Profile Error</h2></td>
							 </tr>
							 <tr>
							  <td class="isi2">Nomor HP yang Anda masukkan tidak valid.<br></td>
							 </tr>
							 <tr>
							  <td align="left" valign="middle"><a href='javascript:history.back(-1)'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table>
							<?php
						}
						else if ((!empty($_POST[kode_area]))&&(!eregi($valid_zip, $_POST[kode_area])))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px" width="100%">
							 <tr>
							  <td align="left" valign="middle"><h2>Edit Profile Error</h2></td>
							 </tr>
							 <tr>
							  <td class="isi2">Kode Area Telepon yang Anda masukkan tidak valid.<br></td>
							 </tr>
							 <tr>
							  <td align="left" valign="middle"><a href='javascript:history.back(-1)'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table>
							<?php
						}
						else if ((!empty($_POST[telp]))&&(!eregi($valid_telp, $_POST[telp])))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px" width="100%">
							 <tr>
							  <td align="left" valign="middle"><h2>Edit Profile Error</h2></td>
							 </tr>
							 <tr>
							  <td class="isi2">Nomor Telepon yang Anda masukkan tidak valid.<br></td>
							 </tr>
							 <tr>
							  <td align="left" valign="middle"><a href='javascript:history.back(-1)'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table>
							<?php
						}
						else if(empty($_POST[alamat]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px" width="100%">
							 <tr>
							  <td align="left" valign="middle"><h2>Edit Profile Error</h2></td>
							 </tr>
							 <tr>
							  <td class="isi2">Tolong masukan Alamat Anda.<br></td>
							 </tr>
							 <tr>
							  <td align="left" valign="middle"><a href='javascript:history.back(-1)'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table>
							<?php
						}
						else if((empty($password))||(empty($password2)))
						{
							
						 $regis="UPDATE member SET email='".$email."', gender='".$gender."', nama='".$nama."', hp='".$hp."', kode_area='".$kode_area."', 
							        telp='".$telp."', id_tujuan='".$kota."', alamat='".$alamat."' WHERE username='".$USERNAME."'";
						 //echo $regis; exit;
							$regis2=mysql_query($regis);
							if($regis2)
							{
							 ?>
								<script language="javascript">
								 alert("Profile Anda berhasil diubah.");
									document.location="myaccount.php?_page=myaccount";
								</script>
								<?php
							}
							else
							{
						 ?>
							<table cellpadding="7px" cellspacing="1px" width="100%">
							 <tr>
							  <td align="left" valign="middle"><h2>Edit Profile Error</h2></td>
							 </tr>
							 <tr>
							  <td class="isi2">FATAL ERROR.<br></td>
							 </tr>
							 <tr>
							  <td align="left" valign="middle"><a href='javascript:history.back(-1)'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table>
							<?php
							}
						}
						else if((!empty($password))||(!empty($password2)))
						{
						 if((strlen($password)<5) or (strlen($password)>10))
							{
								?>
								<table cellpadding="7px" cellspacing="1px" width="100%">
									<tr>
										<td align="left" valign="middle"><h2>Edit Profile Error</h2></td>
									</tr>
									<tr>
										<td class="isi2">Password Anda harus 5-20 Char.<br></td>
									</tr>
									<tr>
										<td align="left" valign="middle"><a href='javascript:history.back(-1)'>Kembali ke halaman sebelumnya</a></td>
									</tr>
								</table>
								<?php
							}
							else if($password <> $password2)
							{
								?>
								<table cellpadding="7px" cellspacing="1px" width="100%">
									<tr>
										<td align="left" valign="middle"><h2>Edit Profile Error</h2></td>
									</tr>
									<tr>
										<td class="isi2">Password dan Konfirmasi Password Anda tidak sama.<br></td>
									</tr>
									<tr>
										<td align="left" valign="middle"><a href='javascript:history.back(-1)'>Kembali ke halaman sebelumnya</a></td>
									</tr>
								</table>
								<?php
							}
							else
							{
							 $pass=md5($_POST[password]);
								
								$regis="UPDATE member SET email='".$email."', gender='".$gender."', nama='".$nama."', hp='".$hp."', kode_area='".$kode_area."', 
																telp='".$telp."', id_tujuan='".$kota."', alamat='".$alamat."', password='".$pass."' WHERE username='".$USERNAME."'";
								//echo $regis; exit;
								$regis2=mysql_query($regis);
								if($regis2)
								{
								 session_destroy();
									?>
									<script language="javascript">
									 alert("Profile Anda berhasil diubah. Silahkan login kembali.");
										document.location="login.php?_page=login";
									</script>
									<?php
								}
								else
								{
								?>
								<table cellpadding="7px" cellspacing="1px" width="100%">
									<tr>
										<td align="left" valign="middle"><h2>Edit Profile Error</h2></td>
									</tr>
									<tr>
										<td class="isi2">FATAL ERROR.<br></td>
									</tr>
									<tr>
										<td align="left" valign="middle"><a href='javascript:history.back(-1)'>Kembali ke halaman sebelumnya</a></td>
									</tr>
								</table>
								<?php
								}
							}
						}
						?>


<br /><br /><br />
<!-- Contact Form end -->
</div>
</div>
            <!--End of the Left part text  -->
<!--Right part of text follows here-->
<?php
 include "common/right_account.php";
?>
<!--End of the Right part text  -->
      </div>
</div>

<?php
 include "common/bottom.php";
?>
