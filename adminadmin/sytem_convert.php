<?php
include 'common/function.php';
include "autentifikasi.php";
include "../common/config.php";

$cek=mysql_num_rows(mysql_query("SELECT * FROM ms_poin WHERE username='".$_GET[username]."'"));
if($cek>0)
{
 $poin=mysql_fetch_array(mysql_query("SELECT * FROM ms_poin WHERE username='".$_GET[username]."'"));
	$hasil=$poin[jumlah_poin]+$_GET[jum];
	$tambah="UPDATE ms_poin SET jumlah_poin='".$hasil."', tanggal_update='".$tanggal_update."', admin='".$SES_USERNAME."' WHERE username='".$_GET[username]."'";
 $tambah2=mysql_query($tambah);
	if($tambah2)
	{
	 $uuu=mysql_query("UPDATE booking SET convert_a='1' WHERE id_booking=$_GET[id_booking]");
		if($uuu)
		{
			$masuk_log=mysql_query("INSERT INTO log (username, admin, tanggal, ket) VALUES ('".$_GET[username]."', '".$SES_USERNAME."', '".$tanggal_update."', 'CONVERT TO POIN + $_GET[jum] POIN')");
			if($masuk_log)
			{
				$tuj=mysql_fetch_array(mysql_query("SELECT username, email FROM member WHERE username='$_GET[username]'"));
				$tujuan="$tuj[email]";
				$perihal="Convert Dana to Poin $namaweb berhasil";
				$header="From: Administrator $namaweb";
				$main_content="Dengan hormat,\n\n"; 
				$main_content.="Dana yang Anda tranfer ke buntung.com telah di-convert ke poin sebesar $_GET[jum] poin. Jadi Jumlah Poin Anda sekarang adalah $hasil.\n\n ";
				$main_content.="Jumlah Dana Anda: Rp. $_GET[dana],-.\n\n ";
				$main_content.="Administrator kami telah melakukan convert dana ke poin. Nikmati bertransaksi di $namaweb serta Fantastic Shopping yang akan membuat Anda mendapat keuntungan maksimal.\n\n";
				$main_content.="Salam,\nAdministrator\n$namaweb\n\n";
				$signature="\n\n--\n\n";
				$signature.="$namaweb\n";
				$mailcontent=$main_content.$signature;
				$status=mail($tujuan, $perihal, $mailcontent, $header);
				if($status)
				{
					?>
					<script language="javascript">
						alert("Convert berhasil. Email konfirmasi telah dikirimkan kepada konsumen");
						document.location="convert_dana.php";
					</script>
					<?php
				}
			}
		}
	}
}
else
{
 $poin=mysql_fetch_array(mysql_query("SELECT * FROM ms_poin WHERE username='".$_GET[username]."'"));
	$tambah="INSERT INTO ms_poin (username, jumlah_poin, tanggal_update) VALUES ('".$_GET[username]."', '".$_GET[jum]."', '".$tanggal_update."')";
 $tambah2=mysql_query($tambah);
	if($tambah2)
	{
	 $uuu=mysql_query("UPDATE booking SET convert_a='1' WHERE id_booking=$_GET[id_booking]");
		if($uuu)
		{
			$masuk_log=mysql_query("INSERT INTO log (username, admin, tanggal, ket) VALUES ('".$_GET[username]."', '".$SES_USERNAME."', '".$tanggal_update."', 'CONVERT TO POIN + $_GET[jum] POIN')");
			if($masuk_log)
			{
				$tuj=mysql_fetch_array(mysql_query("SELECT username, email FROM member WHERE username='$_GET[username]'"));
				$tujuan="$tuj[email]";
				$perihal="Convert Dana to Poin $namaweb berhasil";
				$header="From: Administrator $namaweb";
				$main_content="Dengan hormat,\n\n"; 
				$main_content.="Dana yang Anda tranfer ke buntung.com telah di-convert ke poin sebesar $_GET[jum]. Jadi Jumlah Poin Anda sekarang adalah <b>$hasil</b>.\n\n ";
				$main_content.="Jumlah Dana Anda: $_GET[dana].\n\n ";
				$main_content.="Administrator kami telah melakukan convert dana ke poin. Nikmati bertransaksi di $namaweb serta Fantastic Shopping yang akan membuat Anda mendapat keuntungan maksimal.\n\n";
				$main_content.="Salam,\nAdministrator\n$namaweb\n\n";
				$signature="\n\n--\n\n";
				$signature.="$namaweb\n";
				$mailcontent=$main_content.$signature;
				$status=mail($tujuan, $perihal, $mailcontent, $header);
				if($status)
				{
					?>
					<script language="javascript">
						alert("Convert berhasil. Email konfirmasi telah dikirimkan kepada konsumen");
						document.location="convert_dana.php";
					</script>
					<?php
				}
			}
		}
	}
}

?>