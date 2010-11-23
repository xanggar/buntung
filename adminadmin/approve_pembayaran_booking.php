<?php
include 'common/function.php';
include "autentifikasi.php";
include "../common/config.php";

$paket=mysql_fetch_array(mysql_query("SELECT * FROM booking WHERE id_booking='".$_GET[id_bayar]."'"));
$barang=mysql_fetch_array(mysql_query("SELECT * FROM product WHERE id_product='".$paket[id_product]."'"));


$terima="UPDATE booking SET menang='1', status='2', tanggal_approve='".$tanggal_update."', admin='".$SES_USERNAME."' WHERE id_booking='".$_GET[id_bayar]."'";
$terima2=mysql_query($terima);
if($terima2)
{
	 $poin=mysql_fetch_array(mysql_query("SELECT * FROM ms_poin WHERE username='".$paket[username]."'"));
	 $hasil=$poin[jumlah_poin]+$packages[jumlah_bid];
	 $tambah="UPDATE ms_poin SET jumlah_poin='".$hasil."', tanggal_update='".$tanggal_update."' WHERE username='".$paket[username]."'";
		$tambah2=mysql_query($tambah);
		if(tambah2)
		{
		 $masuk_log=mysql_query("INSERT INTO log (username, admin, tanggal, ket) VALUES ('".$paket[username]."', '".$SES_USERNAME."', '".$tanggal_update."', 'APPROVE BOOKING $barang[nama_barang]')");
		 if($masuk_log)
			{
			 $up2=mysql_query("UPDATE product SET status='5' WHERE id_product='$paket[id_product]'");
				if($up2)
				{
				$tuj=mysql_fetch_array(mysql_query("SELECT * FROM member WHERE username='$paket[username]'"));
				$tujuan=mysql_fetch_array(mysql_query("SELECT * FROM tujuan WHERE id_tujuan='$tuj[id_tujuan]'"));
				$tujuan="$tuj[email]";
				$perihal="Pembelian Booking $namaweb berhasil";
				$header="From: Administrator $namaweb";
				$main_content="Dengan hormat,\n\n"; 
				$main_content.="Konfirmasi Pembayaran Anda di $namaweb telah diverifikasi administrator kami.\n\n ";
				$main_content.="Nama Barang: $barang[nama_barang].\n\n ";
				$main_content.="Harga: $booking[harga_booking].\n\n ";
				$main_content.="Barang ini akan dikirimkan ke alamat Anda di: $tuj[alamat] $tujuan[tujuan] .\n\n ";
				$main_content.="Terima kasih telah melakukan pembelian barang di $namaweb. Nikmati bertransaksi di $namaweb serta Fantastic Shopping yang akan membuat Anda mendapat keuntungan maksimal.\n\n";
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
						document.location="list_booking.php";
					</script>
					<?php
				}
			}
		}
	}
}


?>