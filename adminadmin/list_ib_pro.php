<?php
	include 'common/function.php';
	include "autentifikasi.php";
	include "../common/config.php";
	
	$data=mysql_fetch_array(mysql_query("SELECT * FROM instant_buy WHERE id_ib='$_GET[id]'"));
	$member=mysql_fetch_array(mysql_query("SELECT * FROM member WHERE username='$data[username]'"));
	$barang=mysql_fetch_array(mysql_query("SELECT * FROM product WHERE id_product='$data[id_product]'"));
	$tujuan=mysql_fetch_array(mysql_query("SELECT * FROM tujuan WHERE id_tujuan='$member[id_tujuan]'"));
	
	$up=mysql_query("UPDATE instant_buy SET status='1', tanggal_update='".$tanggal_update."' WHERE id_ib='$_GET[id]'");
	if($up)
	{
	 $up2=mysql_query("UPDATE product SET status='4' WHERE id_product='$data[id_product]'");
		if($up2)
		{
		 $masuk_log=mysql_query("INSERT INTO log (username, admin, tanggal, ket) VALUES ('".$data[username]."', '".$SES_USERNAME."', '".$tanggal_update."', 'APPROVE INSTANT BUY')");
			if($masuk_log)
			{
				$tujuan="$member[email]";
				$perihal="Approve Instant Buy berhasil";
				$header="From: Administrator $namaweb";
				$main_content="Dengan hormat,\n\n"; 
				$main_content.="Rekapitulasi pemesanan barang di $namaweb.\n\n ";
				$main_content.="Nama Barang: $barang[nama_barang].\n\n ";
				$main_content.="Jumlah Poin: $product[jumlah_minimal_koin].\n\n ";
				$main_content.="Token: $data[token].\n\n ";
				$main_content.="Tanggal Approve : $data[tanggal_update].\n\n ";
				$main_content.="Barang Anda akan dikirimkan pada alamat berikut: .\n\n ";
				$main_content.="<b>$member[alamat] $tujuan[tujuan]</b>.\n\n ";
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
						document.location="list_ib.php";
					</script>
					<?php
				}
			}
		}
	}
?>