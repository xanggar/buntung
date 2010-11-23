<?php
 include "common/top2.php";
?>

      <!-- Sub Page Title Starts here-->
                  <h1>Instant Buy</h1>
                  <p>Lorem ipsum dolorsit amet, consectetur adipiscing elit Quisque rhoncus Duis rhoncus. </p>                  <!-- Sub Page Title End here-->
            </div>
												
<?php
 include "common/search.php";
?>
</div>
</div>
<div class="clear">&nbsp;</div>
<div class="content cbg">
<div class="container_16 linebg">
<!--left part of text follows here-->
<div class="grid_11 para sepline">
<div class="text">
<?php
$barang=mysql_fetch_array(mysql_query("SELECT * FROM product WHERE id_product='".$_GET[id]."'"));
$jumlah=mysql_num_rows(mysql_query("SELECT * FROM booking WHERE id_product='".$_GET[id]."'"));
if($jumlah<1)
{
	$kurang_poin=3*$barang[jumlah_poin];
}
else if($jumlah<2&&$jumlah>0)
{
	$kurang_poin=2*$barang[jumlah_poin];
}
else if($jumlah>1)
{
	$kurang_poin=$barang[jumlah_poin];
}

//echo $jumlah."|".$barang[jumlah_poin]."|".$kurang_poin; exit;

$cek_poin=mysql_fetch_array(mysql_query("SELECT * FROM ms_poin WHERE username='".$USERNAME."'"));

$nilai=$cek_poin[jumlah_poin]-$kurang_poin;
$ubah=mysql_query("UPDATE ms_poin SET jumlah_poin='".$nilai."', tanggal_update='".$tanggal_update."' WHERE username='".$USERNAME."'");
if($ubah)
{

$tu=mysql_query("INSERT INTO booking (id_product, username, token, tanggal, harga_booking) VALUES ('".$_GET[id]."', '".$USERNAME."', '".$_GET[token]."', '".$tanggal_update."', '".$_GET[harga]."')");
if($tu)
{
	$masuk_log=mysql_query("INSERT INTO log (username, tanggal, ket) VALUES ('".$USERNAME."', '".$tanggal_update."', 'BOOKING $barang[nama_barang]  Biaya Booking $kurang_poin poin')");
	if($masuk_log)
	{
$ketket="BOOKING".$_GET[id];
$masuk_transaksi=mysql_query("INSERT INTO transaksi (username, jumlah_poin, ket, tanggal_transaksi) VALUES ('".$USERNAME."', '".$kurang_poin."', '".$ketket."', '".$tanggal_update."')");
if($masuk_transaksi)
{
?>

<h2>Booking <?php echo $barang[nama_barang]; ?></h2>
</div>
<div class="text">


<p><strong>Token Booking: <?php echo $_GET[token]; ?></strong></p>

<p>* Tolong disimpan Token Booking diatas sebagai kode konfirmasi yang akan digunakan untuk konfirmasi pembayaran.</p>

<p>* Anda hanya mempunyai waktu 15 Menit untuk melakukan pembayaran dan konfimasi pembayaran.</p>
<br><br>
<table cellpadding="7px" cellspacing="0" width="100%">
	<tr>
	 <td align="left" valign="top" colspan="4">&nbsp; &nbsp;&nbsp; 
		 Rekening <?php echo $namaweb; ?>:
			<table cellpadding="5px" cellspacing="0" width="100%">
			 <tr>
				 <td width="4%" align="left" valign="top">&nbsp;</td>
				 <td width="40%" align="left" valign="top"><strong>Nama Bank</strong></td>
				 <td width="26%" align="left" valign="top"><strong>Nomor Rekening</strong></td>
				 <td width="30%" align="left" valign="top"><strong>Nama Pemilik Rekening</strong></td>
				</tr>
			<?php 
			$rek=mysql_query("SELECT * FROM rekening");
			while($rek2=mysql_fetch_array($rek))
			{
			?>
			 <tr>
				 <td width="4%" align="left" valign="top">&nbsp;</td>
				 <td width="40%" align="left" valign="top"><?php echo $rek2[nama_bank]; ?></td>
				 <td width="26%" align="left" valign="top"><?php echo $rek2[nomor_rekening]; ?></td>
				 <td width="30%" align="left" valign="top"><?php echo $rek2[atas_nama]; ?></td>
				</tr>
			<?php
			}
			?>
			</table>
		</td>
	</tr>
</table>
<br><br>
Konfirmasi pembayaran booking di <a href="konfirmasi_booking.php?_page=myaccount">Konfirmasi booking</a>


</div>

<br /><br /><br />
<?php
}
}
}
}
?>
</div>
            <!--End of the Left part text  -->
<!--Right part of text follows here-->
<?php
 include "common/right2.php";
?>
<!--End of the Right part text  -->
      </div>
</div>

<?php
 include "common/bottom.php";
?>
