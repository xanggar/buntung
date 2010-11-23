<?php
 include "common/top2.php";
?>

<!-- Sub Page Title Starts here-->
<h1>Forget Password</h1>
<p>Ini adalah mekanisme untuk melakukan reset terhadap password Anda</p>
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
							 $cek=mysql_num_rows(mysql_query("SELECT username, hp FROM member WHERE username='".$_POST[username]."' AND hp='".$_POST[hp]."'"));
							?>

						
						<?php
						if(empty($_POST[username]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px">
							 <tr align="center" valign="middle">
							  <td class="isi">Tolong masukan Username Anda.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:history.back(-1)'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table><br><br><br><br><br><br><br><br>
							<?php
						}
						else if(empty($_POST[hp]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px">
							 <tr align="center" valign="middle">
							  <td class="isi">Tolong masukan Nomor HP Anda.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:history.back(-1)'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table><br><br><br><br><br><br><br><br>
							<?php
						}
						else if($cek<1)
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px">
							 <tr align="center" valign="middle">
							  <td class="isi">Data Username dan Nomor Handphone yang Anda masukkan tidak valid.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:history.back(-1)'>Kembali untuk mencoba kembali</a></td>
							 </tr>
							</table><br><br><br><br><br><br><br><br>
							<?php
						}
						else
						{
							$ubah=mysql_fetch_array(mysql_query("SELECT username, hp, password,email FROM member WHERE username='".$_POST[username]."' AND hp='".$_POST[hp]."'"));
						
						 $password_baru=rand("12345", "56789");
						 $password_baru2="buntung";
						 $password_baru3=rand("254", "987");
							
							$pass=$password_baru."".$password_baru2."".$password_baru3;
							
						
						 $masuk_pass=md5($pass);
							
						 $regis="UPDATE member SET password='".$masuk_pass."' WHERE username='".$_POST[username]."' AND hp='".$_POST[hp]."'";
						 //echo $regis; exit;
							$regis2=mysql_query($regis);
							if($regis2)
							{
								
								$tujuan="$ubah[email]";
								$perihal="Forget Password $namaweb";
								$header="From: Administrator $namaweb";
								$main_content="Dengan hormat,\n\n"; 
								$main_content.="Bersama ini kami berikan Password Baru Anda di $namaweb.\n\n ";
								$main_content.="Perubahan ini adalah hasil dari request Anda melalui Forget Password di $namaweb.\n\n";
								$main_content.="Password Baru : $pass   \n\n ";
								$main_content.="Silahkan masuk ke Account $namaweb Anda dengan menggunakan password di atas.\n\n ";
								$main_content.="Terima kasih.\n\n";
								$main_content.="Salam,\nAdministrator\n$namaweb\n\n";
								$signature="\n\n--\n\n";
								$signature.="$namaweb\n";
								$mailcontent=$main_content.$signature;
								$status=mail($tujuan, $perihal, $mailcontent, $header);
								if($status)
								{
									?>
									<table cellpadding="7px" cellspacing="1px">
										<tr align="center" valign="middle">
											<td class="isi">Password baru Anda telah kami kirimkan ke Alamat Email Anda. Terima kasih.<br></td>
										</tr>
										<tr>
											<td align="center" valign="middle" class="link_biru"><a href='index.php'>Halaman Utama</a></td>
										</tr>
									</table><br><br><br><br><br><br><br><br>
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
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:history.back(-1)'>Kembali ke halaman sebelumnya</a></td>
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
