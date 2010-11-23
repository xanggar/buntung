<?php
include 'common/function.php';
include "autentifikasi.php";
include "../common/config.php";

$paket=mysql_fetch_array(mysql_query("SELECT * FROM pesan_packages WHERE id_pesan_packages='".$_GET[id_bayar]."'"));
$packages=mysql_fetch_array(mysql_query("SELECT * FROM packages WHERE id_package='".$paket[id_package]."'"));

$ubah="UPDATE pesan_packages SET status='3', tanggal_tolak='".$tanggal_update."', admin='".$SES_USERNAME."' WHERE id_pesan_packages='".$_GET[id_bayar]."'";
$ubah2=mysql_query($ubah);
if($ubah2)
{
	$masuk_log=mysql_query("INSERT INTO log (username, admin, tanggal, ket) VALUES ('".$paket[username]."', '".$SES_USERNAME."', '".$tanggal_update."', 'PEMBAYARAN POIN TIDAK VALID')");
	if($masuk_log)
	{
		$tuj=mysql_fetch_array(mysql_query("SELECT username, email FROM member WHERE username='$paket[username]'"));
		$tujuan="$tuj[email]";
		$perihal="Pembelian Poin $namaweb gagal";
		$header="From: Administrator $namaweb";
		$main_content="Dengan hormat,\n\n"; 
		$main_content.="Pembelian Poin Anda di $namaweb telah diverifikasi administrator kami dan terdapat beberapa kesalahan pembayaran oleh Anda.\n\n ";
		$main_content.="Nama Paket Poin: $packages[nama_package].\n\n ";
		$main_content.="Jumlah Poin: $packages[jumlah_bid].\n\n ";
		$main_content.="Harga: $packages[harga_package].\n\n ";
		$main_content.="Mohon anda melakukan order paket poin lagi dan melakukan tranfer ke rekening $namaweb yang telah ditetapkan, kemudian melakukan konfimasi pembayaran pada Payment Confirmation.\n\n ";
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
				alert("Tolak berhasil. Email konfirmasi telah dikirimkan kepada konsumen");
				document.location="payment_tranfer.php";
			</script>
			<?php
		}
	}
}
else
{
 ?>
	<script language="javascript">
	 alert("ERROR");
	 document.location="payment_tranfer.php";
	</script>
	<?php
}

?>