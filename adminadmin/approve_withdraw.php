<?php
include 'common/function.php';
include "autentifikasi.php";
include "../common/config.php";

$master=mysql_fetch_array(mysql_query("SELECT * FROM withdraw WHERE id='".$_GET[id]."'"));
$user=mysql_fetch_array(mysql_query("SELECT * FROM ms_poin WHERE username='".$master[username]."'"));

$ii=mysql_query("UPDATE withdraw SET status='1', admin='".$_SESSION['SES_USERNAME']."', tanggal_approve='".$tanggal_update."'");
if($ii)
{
$jumlah_sekarang=$user[jumlah_poin]-$master[jumlah];
$poin=mysql_query("UPDATE ms_poin SET jumlah_poin='".$jumlah_sekarang."' WHERE username='".$master[username]."'");	
if($poin)
{
 $tu=mysql_query("INSERT INTO transaksi (username, jumlah_poin, ket, tanggal_transaksi) VALUES ('".$master[username]."', '".$master[jumlah]."', 'WITHDRAW', '".$tanggal_update."')");
 if($tu)
 {
	 $masuk_log=mysql_query("INSERT INTO log (username, tanggal, ket) VALUES ('".$master[username]."', '".$tanggal_update."', 'APPROVE WITHDRAW POIN')");
	 if($masuk_log)
	 {
			$tuj=mysql_fetch_array(mysql_query("SELECT * FROM member WHERE username='$master[username]'"));
			$tujuan="$tuj[email]";
			$perihal="Withdraw Poin Berhasil";
			$header="From: Administrator $namaweb";
			$main_content="Dengan hormat,\n\n"; 
			$main_content.="Withdraw Poin Anda di $namaweb telah diverifikasi administrator kami.\n\n ";
			$main_content.="Jumlah Withdraw: $master[jumlah].\n\n ";
			$main_content.="Jumlah Uang: Rp. $_GET[duit],-.\n\n ";
			$main_content.="<b>Tranfer Ke: </b>.\n\n ";
			$main_content.="Nomor Rekening: $master[nomor_rekening].\n\n ";
			$main_content.="Nama Bank: $master[nama_bank].\n\n ";
			$main_content.="Atas Nama: $master[atas_nama].\n\n ";
			$main_content.="Silahkan cek nomor rekening Anda.\n\n ";
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
					document.location="withdraw.php";
				</script>
				<?php
			}
		}
	}
}
}	
	
	
?>