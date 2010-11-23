<?php
include 'common/function.php';
include "autentifikasi.php";
include "../common/config.php";

$paket=mysql_fetch_array(mysql_query("SELECT * FROM pesan_packages WHERE id_pesan_packages='".$_GET[id_bayar]."'"));
$packages=mysql_fetch_array(mysql_query("SELECT * FROM packages WHERE id_package='".$paket[id_package]."'"));

$cek=mysql_num_rows(mysql_query("SELECT * FROM ms_poin WHERE username='".$paket[username]."'"));

$terima="UPDATE pesan_packages SET status='2', tanggal_approve='".$tanggal_update."', admin='".$SES_USERNAME."' WHERE id_pesan_packages='".$_GET[id_bayar]."'";
$terima2=mysql_query($terima);
if($terima2)
{
 if($cek>0)
	{
	 $poin=mysql_fetch_array(mysql_query("SELECT * FROM ms_poin WHERE username='".$paket[username]."'"));
	 $hasil=$poin[jumlah_poin]+$packages[jumlah_bid];
	 $tambah="UPDATE ms_poin SET jumlah_poin='".$hasil."', tanggal_update='".$tanggal_update."' WHERE username='".$paket[username]."'";
		$tambah2=mysql_query($tambah);
		if(tambah2)
		{
		 $masuk_log=mysql_query("INSERT INTO log (username, admin, tanggal, ket) VALUES ('".$paket[username]."', '".$SES_USERNAME."', '".$tanggal_update."', 'APPROVE PEMBELIAN POIN')");
		 if($masuk_log)
			{
				$tuj=mysql_fetch_array(mysql_query("SELECT username, email FROM member WHERE username='$paket[username]'"));
				$tujuan="$tuj[email]";
				$perihal="Pembelian Poin $namaweb berhasil";
				$header="From: Administrator $namaweb";
				$main_content="Dengan hormat,\n\n"; 
				$main_content.="Pembelian Poin Anda di $namaweb telah diverifikasi administrator kami.\n\n ";
				$main_content.="Nama Paket Poin: $packages[nama_package].\n\n ";
				$main_content.="Jumlah Poin: $packages[jumlah_bid].\n\n ";
				$main_content.="Harga: $packages[harga_package].\n\n ";
				$main_content.="Poin Account Anda di $namaweb bertambah sebesar <b>$packages[jumlah_bid]</b>.\n\n ";
				$main_content.="Terima kasih telah melakukan pembelian poin di $namaweb. Nikmati bertransaksi di $namaweb serta Fantastic Shopping yang akan membuat Anda mendapat keuntungan maksimal.\n\n";
				$main_content.="Salam,\nAdministrator\n$namaweb\n\n";
				$signature="\n\n--\n\n";
				$signature.="$namaweb\n";
				$mailcontent=$main_content.$signature;
				$status=mail($tujuan, $perihal, $mailcontent, $header);
				if($status)
				{
					?>
					<script language="javascript">
						alert("Approve berhasil. Email konfirmasi telah dikirimkan kepada konsumen");
						document.location="payment_tranfer.php";
					</script>
					<?php
				}
			}
		}
	}
	else
	{
	 $tambah2="INSERT INTO ms_poin (username, jumlah_poin, tanggal_update) VALUES ('".$paket[username]."', '".$packages[jumlah_bid]."', '".$tanggal_update."')";
		$tambah22=mysql_query($tambah2);
		if($tambah22)
		{
		 $masuk_log=mysql_query("INSERT INTO log (username, admin, tanggal, ket) VALUES ('".$paket[username]."', '".$SES_USERNAME."', '".$tanggal_update."', 'APPROVE PEMBELIAN POIN')");
		 if($masuk_log)
			{
				$tuj=mysql_fetch_array(mysql_query("SELECT username, email FROM member WHERE username='$paket[username]'"));
				$tujuan="$tuj[email]";
				$perihal="Pembelian Poin $namaweb berhasil";
				$header="From: Administrator $namaweb";
				$main_content="Dengan hormat,\n\n"; 
				$main_content.="Pembelian Poin Anda di $namaweb telah diverifikasi administrator kami.\n\n ";
				$main_content.="Nama Paket Poin: $packages[nama_package].\n\n ";
				$main_content.="Jumlah Poin: $packages[jumlah_bid].\n\n ";
				$main_content.="Harga: $packages[harga_package].\n\n ";
				$main_content.="Poin Account Anda di $namaweb bertambah sebesar <b>$packages[jumlah_bid]</b>.\n\n ";
				$main_content.="Terima kasih telah melakukan pembelian poin di $namaweb. Nikmati bertransaksi di $namaweb serta Fantastic Shopping yang akan membuat Anda mendapat keuntungan maksimal.\n\n";
				$main_content.="Salam,\nAdministrator\n$namaweb\n\n";
				$signature="\n\n--\n\n";
				$signature.="$namaweb\n";
				$mailcontent=$main_content.$signature;
				$status=mail($tujuan, $perihal, $mailcontent, $header);
				if($status)
				{
					?>
					<script language="javascript">
						alert("Approve berhasil. Email konfirmasi telah dikirimkan kepada konsumen");
						document.location="payment_tranfer.php";
					</script>
					<?php
				}
			}
		}
	}
}


?>