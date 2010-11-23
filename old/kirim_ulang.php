<?php
 include "common/config.php";
	
	$cek=mysql_fetch_array(mysql_query("SELECT * FROM member WHERE page='".$_GET[_page]."'"));
	
	
	$tujuan="$cek[email]";
	$perihal="Kode Aktivasi Account $namaweb";
	$header="From: Administrator $namaweb";
	$main_content="Dengan hormat,\n\n"; 
	$main_content.="Bersama ini kami sampaikan LINK AKTIVASI KEANGGOTAAN anda di $namaweb.\n\n ";
	$main_content.="Silahkan membuka link dibawah ini untuk mengaktifkan Account Anda di $namaweb.\n\n";
	$main_content.="http://$namaweb/aktif.php?username=".urlencode($cek[username])."&token=".urlencode($cek[token])."&page=".urlencode($cek[page])."\n\n ";
	$main_content.="Link aktivasi ini dikirimkan dengan tujuan mencegah orang lain menggunakan e-mail anda untuk mendaftar di $namaweb.\n\n ";
	$main_content.="Terima kasih telah mendaftar di $namaweb dan selamat menikmati semua kemudahan serta keuntungan bertransaksi di website kami.\n\n";
	$main_content.="Salam,\nAdministrator\n$namaweb\n\n";
	$signature="\n\n--\n\n";
	$signature.="$namaweb\n";
	$mailcontent=$main_content.$signature;
	$status=mail($tujuan, $perihal, $mailcontent, $header);
	if($status)
	{
		?>
		<script language="javascript">
		 alert("Email Berhasil dikirim ke <?php echo $cek[email]; ?>");
			document.location="register2_conf.php?_page=<?php echo $_GET[_page]; ?>&_hal=regis";
		</script>
		<?php
	} 
	
	
?>