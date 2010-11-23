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
$toktok=trim($_POST[token]);
$cek=mysql_num_rows(mysql_query("SELECT * FROM booking WHERE id_booking='".$_GET[id_pesan]."' AND username='".$USERNAME."' AND token='".$toktok."'"));

$tgl=$_POST[tahun]."-".$_POST[bulan]."-".$_POST[tanggal];
if (empty($_POST[tanggal]))
{
?>
 
	<table cellpadding="7px" cellspacing="0"width="100%" height="200px" bgcolor="#ffffff">
	 <tr>
		 <td align="left" valign="middle">
				<font color="#ff0000"><strong>Tanggal tidak boleh kosong</strong></font><br><br>
				<a href="javascript:history.back(-1)" class="link_kecil">Kembali ke halaman sebelumnya</a>
			</td>
		</tr>
	</table>
 
<?php
}
else if(empty($_POST[nama_bank]))
{
?>
 
	<table cellpadding="7px" cellspacing="0"width="100%" height="200px" bgcolor="#ffffff">
	 <tr>
		 <td align="left" valign="middle">
				<font color="#ff0000"><strong>Nama Bank tidak boleh kosong</strong></font><br><br>
				<a href="javascript:history.back(-1)" class="link_kecil">Kembali ke halaman sebelumnya</a>
			</td>
		</tr>
	</table>
 
<?php
}
else if(empty($_POST[nomor_rekening]))
{
?>
 
	<table cellpadding="7px" cellspacing="0"width="100%" height="200px" bgcolor="#ffffff">
	 <tr>
		 <td align="left" valign="middle">
				<font color="#ff0000"><strong>Nomor Rekening tidak boleh kosong</strong></font><br><br>
				<a href="javascript:history.back(-1)" class="link_kecil">Kembali ke halaman sebelumnya</a>
			</td>
		</tr>
	</table>
 
<?php
}
else if(empty($_POST[atas_nama]))
{
?>
 
	<table cellpadding="7px" cellspacing="0"width="100%" height="200px" bgcolor="#ffffff">
	 <tr>
		 <td align="left" valign="middle">
				<font color="#ff0000"><strong>Atas Nama tidak boleh kosong</strong></font><br><br>
				<a href="javascript:history.back(-1)" class="link_kecil">Kembali ke halaman sebelumnya</a>
			</td>
		</tr>
	</table>
 
<?php
}
else if(empty($_POST[kategori]))
{
?>
 
	<table cellpadding="7px" cellspacing="0"width="100%" height="200px" bgcolor="#ffffff">
	 <tr>
		 <td align="left" valign="middle">
				<font color="#ff0000"><strong>Rekening tidak boleh kosong</strong></font><br><br>
				<a href="javascript:history.back(-1)" class="link_kecil">Kembali ke halaman sebelumnya</a>
			</td>
		</tr>
	</table>
 
<?php
}
else if(empty($_POST[token]))
{
?>
 
	<table cellpadding="7px" cellspacing="0"width="100%" height="200px" bgcolor="#ffffff">
	 <tr>
		 <td align="left" valign="middle">
				<font color="#ff0000"><strong>Token pembelian tidak boleh kosong</strong></font><br><br>
				<a href="javascript:history.back(-1)" class="link_kecil">Kembali ke halaman sebelumnya</a>
			</td>
		</tr>
	</table>
 
<?php
}
else if($cek<1)
{
?>
 
	<table cellpadding="7px" cellspacing="0"width="100%" height="200px" bgcolor="#ffffff">
	 <tr>
		 <td align="left" valign="middle">
				<font color="#ff0000"><strong>Token booking yang Anda masukkan salah</strong></font><br><br>
				<a href="javascript:history.back(-1)" class="link_kecil">Kembali ke halaman sebelumnya</a>
			</td>
		</tr>
	</table>
 
<?php
}
else
{
 //echo $_POST[kategori]; exit;
 $masuk="UPDATE booking SET status='1', tanggal_konfirmasi='".$tanggal_update."', nama_bank='".$_POST[nama_bank]."', nomor_rekening='".$_POST[nomor_rekening]."', atas_nama='".$_POST[atas_nama]."', tranfer_ke='".$_POST[kategori]."' WHERE id_booking='".$_GET[id_pesan]."'";
	$res_masuk=mysql_query($masuk);
	if($res_masuk)
	{
		$masuk_log=mysql_query("INSERT INTO log (username, tanggal, ket) VALUES ('".$USERNAME."', '".$tanggal_update."', 'KONFIRMASI PEMBAYARAN BOOKING')");
		if($masuk_log)
		{
		?>
			<table cellpadding="7px" cellspacing="0"width="100%" height="200px" bgcolor="#ffffff">
				<tr>
					<td align="left" valign="middle">
						<font color="#0099FF"><strong>Admin akan melakukan verifikasi atas transaksi ini.</strong></font><br><br>
						Terima kasih atas konfirmasi pembayaran booking yang Anda lakukan. Administrator kami akan melakukan verifikasi terhadap pembayaran yang Anda lakukan.<br>
						<a href="index.php" class="link_kecil">Kembali ke halaman utama</a>
					</td>
				</tr>
			</table>
			
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
