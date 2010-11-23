<?php
 include "common/top3.php";
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
<!-- Contact Form Start -->

<?php
 $poin=mysql_fetch_array(mysql_query("SELECT * FROM ms_poin WHERE username='$USERNAME'"));
	$valid="^[0-9]{1,}$";
	
 if(empty($_POST[poin]))
	{
	 ?>
		<strong>Anda belum memasukkan jumlah poin yang mau di-withdraw.</strong><br><br>
		<a href="withdraw.php?_page=myaccount">Kembali kehalaman berikutnya</a>
		<?php
	}
 else if($poin[jumlah_poin]<$_POST[poin])
	{
	 ?>
		<strong>Jumlah Poin yang Anda masukkan tidak mencukupi</strong><br><br>
		<a href="withdraw.php?_page=myaccount">Kembali kehalaman berikutnya</a>
		<?php
	}
	else if (!eregi($valid, $_POST[poin]))
	{
	 ?>
		<strong>Jumlah Poin yang Anda masukkan tidak valid</strong><br><br>
		<a href="withdraw.php?_page=myaccount">Kembali kehalaman berikutnya</a>
		<?php
	}
 else if(empty($_POST[nomor_rekening]))
	{
	 ?>
		<strong>Anda belum memasukkan nomor rekening.</strong><br><br>
		<a href="withdraw.php?_page=myaccount">Kembali kehalaman berikutnya</a>
		<?php
	}
 else if(empty($_POST[nama_bank]))
	{
	 ?>
		<strong>Anda belum memasukkan Nama Bank.</strong><br><br>
		<a href="withdraw.php?_page=myaccount">Kembali kehalaman berikutnya</a>
		<?php
	}
 else if(empty($_POST[atas_nama]))
	{
	 ?>
		<strong>Anda belum memasukkan Atas Nama.</strong><br><br>
		<a href="withdraw.php?_page=myaccount">Kembali kehalaman berikutnya</a>
		<?php
	}
	else
	{
	 $masuk=mysql_query("INSERT INTO withdraw (username, jumlah, tanggal, nomor_rekening	, nama_bank, atas_nama) VALUES ('".$USERNAME."', '".$_POST[poin]."', '".$tanggal_update."', '".$_POST[nomor_rekening]."', '".$_POST[nama_bank]."', '".$_POST[atas_nama]."')");
		if($masuk)
		{
			$masuk_log=mysql_query("INSERT INTO log (username, tanggal, ket) VALUES ('".$USERNAME."', '".$tanggal_update."', 'WITHDRAW POIN SEBESAR $_POST[poin] poin')");
			if($masuk_log)
			{
			?>
			<strong>Anda sukses dalam request Withdrow Poin. Administrator Kami akan melakukan verifikasi terhadap request Anda. Terima kasih</strong><br><br>
			<a href="myaccount.php?_page=myaccount">Kembali kehalaman Account</a>
			<?php
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
