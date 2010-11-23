<?php
 include "common/top3.php";
	$token_pesan_packages="";
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

<table cellpadding="7px" cellspacing="0" width="90%" style="border:1px solid #acbccc">
 <tr>
	 <td align="center" valign="middle" width="10%"><b>&nbsp;</b></td>
	 <td align="left" valign="middle" width="30%"><b>Nama Paket Poin</b></td>
	 <td align="center" valign="middle" width="20%"><b>Jumlah Poin</b></td>
	 <td align="center" valign="middle" width="40%"><b>Harga</b></td>
	</tr>
	<form action="beli_pro.php?_page=myaccount" method="post">
	<?php
	$paket=mysql_query("SELECT * FROM packages ORDER BY jumlah_bid ASC");
	while($paket2=mysql_fetch_array($paket))
	{
	?>
 <tr>
	 <td align="center" valign="middle" width="10%"><input name="idid" type="radio" value="<?php echo $paket2[id_package]; ?>" /></td>
	 <td align="left" valign="middle" width="30%"><?php echo $paket2[nama_package]; ?></td>
	 <td align="center" valign="middle" width="20%"><?php echo $paket2[jumlah_bid]; ?></td>
	 <td align="center" valign="middle" width="40%">Rp.<?php echo number_format($paket2['harga_package'], 0, ',', '.'); ?>,-</td>
	</tr>
	<?php
	}
	?>
	<tr>
	 <td align="left" valign="top" colspan="4">
		 &nbsp; &nbsp;&nbsp;<input type="submit" value="Pesan" style="cursor:pointer" />
		</td>
	</tr>
	<tr>
	 <td align="left" valign="top" colspan="4">&nbsp;
		 
		</td>
	</tr>
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
	<tr>
	 <td align="left" valign="top" colspan="4">&nbsp;
		 
		</td>
	</tr>
	</form>
</table>

<br />
 <strong>Keterangan: </strong><br />
	1. Order Pembelian Poin dengan form di atas<br />
	2. Tranfer ke rekening <?php echo $namaweb; ?> sesuai dengan poin yang anda beli<br />
	3. Konfirmasi pembayaran pada "Payment Confirmation"
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
