<?php
include 'common/function.php';
include "autentifikasi.php";
include "../common/config.php";

$paket=mysql_fetch_array(mysql_query("SELECT * FROM booking WHERE id_booking='".$_GET[id_bayar]."'"));
$barang=mysql_fetch_array(mysql_query("SELECT * FROM product WHERE id_product='".$_GET[id_bayar]."'"));

$ubah="UPDATE booking SET status='3', tanggal_tolak='".$tanggal_update."', admin='".$_SESSION['SES_USERNAME']."' WHERE id_booking='".$_GET[id_bayar]."'";
$ubah2=mysql_query($ubah);
if($ubah2)
{
	$masuk_log=mysql_query("INSERT INTO log (username, admin, tanggal, ket) VALUES ('".$paket[username]."', '".$_SESSION['SES_USERNAME']."', '".$tanggal_update."', 'KONFIRMASI BOOKING LATE')");
	if($masuk_log)
	{
		$tuj=mysql_fetch_array(mysql_query("SELECT username, email FROM member WHERE username='$paket[username]'"));
		$tujuan="$tuj[email]";
		$perihal="Pembelian Poin $namaweb gagal";
		$header="From: Administrator $namaweb";
		$main_content="Dengan hormat,\n\n"; 
		$main_content.="Pembelian Poin Anda di $namaweb telah diverifikasi administrator kami dan Anda terlambat dalam melakukan pembayaran. Barang telah terjual oleh User $namaweb lain.\n\n ";
		$main_content.="Nama Barang: $barang[nama_barang].\n\n ";
		$main_content.="Harga: Rp. $paket[harga_booking],-.\n\n ";
		$main_content.="Dana yang telah Anda tranfer akan kami convert ke Poin, dan kami masukkan update ke Account Anda.\n\n ";
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
				alert("Tolak berhasil. Email konfirmasi telah dikirimkan kepada konsumen. Jangan lupa melakukan convert Dana Konsumen");
				document.location="list_booking.php";
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
	 document.location="list_booking.php";
	</script>
	<?php
}

?>