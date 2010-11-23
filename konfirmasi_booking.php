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
<h2>Payment Booking Confirmation</h2>
<p><strong>Berikut adalah History Pembelian Poin Anda.</strong></p>

<table cellpadding="7px" cellspacing="0" width="100%" style="border:1px solid #acbccc">
 <tr>
	 <td align="center" valign="middle" width="10%"><b>&nbsp;</b></td>
	 <td align="left" valign="middle" width="40%"><b>Nama Barang</b></td>
	 <td align="center" valign="middle" width="20%"><b>Harga</b></td>
	 <td align="center" valign="middle" width="20%"><b>Tanggal Pesan</b></td>
	 <td align="center" valign="middle" width="10%"><b>Action</b></td>
	</tr>
	<?php
	$paket=mysql_query("SELECT * FROM booking WHERE status='0' OR status='1' ORDER BY tanggal ASC");
	$n=1;
	while($paket2=mysql_fetch_array($paket))
	{
		list($bb, $mm, $dd)=split ("[- :]", $paket2['tanggal']);
		$tgl=$dd."-".$mm."-".$bb;
		$barang=mysql_fetch_array(mysql_query("SELECT id_product, nama_barang FROM product WHERE id_product='".$paket2[id_product]."'"));
	?>
	 <td align="center" valign="middle" width="10%"><?php echo $n; ?></td>
	 <td align="left" valign="middle" width="40%"><?php echo $barang[nama_barang]; ?></td>
	 <td align="center" valign="middle" width="20%">Rp.<?php echo number_format($paket2['harga_booking'], 0, ',', '.'); ?>,-</td>
	 <td align="center" valign="middle" width="20%"><?php echo $tgl; ?></td>
	 <td align="center" valign="middle" width="10%">
		 <?php 
			if($paket2[status]==0)
			{
			?>
		 <a href="konfirmasi_booking_pro.php?_page=myaccount&idid=<?php echo $paket2[id_booking]; ?>">Confirm</a>
		 <?php
			}
			else if($paket2[status]==1)
			{
			 echo "Inprogress";
			}
			?>
		</td>
	</tr>
	<?php
	$n++;
	}
	?>
</table>

<br />
<strong>Note: Inprogress berarti transaksi Anda dalam proses Intern <?php echo $namaweb; ?></strong>

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
