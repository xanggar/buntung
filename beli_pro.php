<?php
 include "common/top2.php";
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
<h2>Pembelian Poin <?php echo $namaweb; ?></h2>
<br>

<!-- Contact Form Start -->
 <?php
	
	if(empty($_POST[idid]))
	{
	 ?>
		<script language="javascript">
		 alert("Anda belum memilih jenis poin");
			document.location="beli.php?_page=myaccount";
		</script>
		<?php
	}
	else
	{
	 $tok = date('dYim');
		$token2=mysql_fetch_array(mysql_query("SELECT * FROM token_pesan_packages"));
	 $token3=$USERNAME."".$_POST[idid]."".$tok."".$token2[isi];
		
		session_register("TOKEN");
		$_SESSION['TOKEN']=$token3;
		
	 $masuk="INSERT INTO pesan_packages (id_package, username, tanggal_pesan, token) VALUES ('".$_POST[idid]."', '".$USERNAME."', '".$tanggal_update."', '".$_SESSION['TOKEN']."')";
		$masuk2=mysql_query($masuk);
		if($masuk2)
		{
		 $masuk_log=mysql_query("INSERT INTO log (username, tanggal, ket) VALUES ('".$USERNAME."', '".$tanggal_update."', 'PEMESANAN PEMBELIAN POIN')");
		 if($masuk_log)
			{
				$tuj=mysql_fetch_array(mysql_query("SELECT username, email FROM member WHERE username='$USERNAME'"));
				$bbb=mysql_fetch_array(mysql_query("SELECT * FROM packages WHERE id_package='$_POST[idid]'"));
				$tujuan="$tuj[email]";
				$perihal="Token Pembelian Poin $namaweb";
				$header="From: Administrator $namaweb";
				$main_content="Dengan hormat,\n\n"; 
				$main_content.="Berikut Token pembelian Poin di $namaweb.\n\n ";
				$main_content.="<b>Token Pembelian :</b> $token3.\n\n";
				$main_content.="Nama Paket Poin: $bbb[nama_package].\n\n ";
				$main_content.="Jumlah Poin: $bbb[jumlah_bid].\n\n ";
				$main_content.="Harga: $bbb[harga_package].\n\n ";
				$main_content.="Terima kasih telah melakukan pembelian poin di $namaweb. Silahkan melakukan tranfer ke rekening kami kemudian melakukan konfirmasi pembayaran di Payment Confirmation.\n\n";
				$main_content.="Salam,\nAdministrator\n$namaweb\n\n";
				$signature="\n\n--\n\n";
				$signature.="$namaweb\n";
				$mailcontent=$main_content.$signature;
				$status=mail($tujuan, $perihal, $mailcontent, $header);
				if(status)
				{
					$iii=$token2[isi]+1;
					$ubah=mysql_query("UPDATE token_pesan_packages SET isi='".$iii."'");
					if($ubah)
					{
						?>
						<h2>Token poin Anda: <?php echo $_SESSION['TOKEN']; ?></h2>
						<strong>Anda berhasil memesan poin di <?php echo $namaweb; ?>. Simpan nomor Token pembelian Anda yang akan digunakan untuk Konfirmasi Pembayaran. <br>
						Silahkan melakukan tranfer ke rekening kami kemudian melakukan konfirmasi pembayaran di "Payment Confirmation"</strong>
						<br><br>
						* Email rekap dari pembelian ini, telah kami kirimkan ke alamat email Anda.
						<?php
					}
				}
			}
		}
	}
	
	
?>

<br /><br /><br /><Br /><br /><br /><Br />
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
