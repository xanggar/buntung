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
<h2>Withdraw Poin</h2>
<p><strong>Ini adalah form untuk melakukan penukaran poin.</strong></p>
<br>
<!-- Contact Form Start -->
<form action="withdraw_pro.php?_page=myaccount" method="post">
<table cellpadding="7px" cellspacing="0" width="90%">
 <tr>
		<td align="left" valign="top" colspan="3">
		 <?php
			$poin=mysql_fetch_array(mysql_query("SELECT * FROM ms_poin WHERE username='$USERNAME'"));
			?>
		 Jumlah Poin Anda: <strong><?php echo $poin[jumlah_poin]; ?></strong>
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" width="33%">Jumlah Poin</td>
		<td align="center" valign="top" width="2%">:</td>
		<td align="left" valign="top" width="65%"><input type="text" size="7" name="poin" /></td>
	</tr>
	<tr>
  <td style="border-bottom:1px solid #acbccc" align="left" valign="top" colspan="3">
		 &nbsp;
		</td>
	</tr>
	<tr>
  <td align="left" valign="top" colspan="3">
		 <strong>Mohon Lengkapi Data di bawah ini untuk melakukan pembayaran withdraw poin Anda.</strong>
		</td>
	</tr>
	<tr>
		<td align="left" valign="top" width="33%">Nomor Rekening</td>
		<td align="center" valign="top" width="2%">:</td>
		<td align="left" valign="top" width="65%"><input type="text" size="15" name="nomor_rekening" /></td>
	</tr>
	<tr>
		<td align="left" valign="top" width="33%">Nama Bank</td>
		<td align="center" valign="top" width="2%">:</td>
		<td align="left" valign="top" width="65%"><input type="text" size="35" name="nama_bank" /></td>
	</tr>
	<tr>
		<td align="left" valign="top" width="33%">Atas Nama</td>
		<td align="center" valign="top" width="2%">:</td>
		<td align="left" valign="top" width="65%"><input type="text" size="35" name="atas_nama" /></td>
	</tr>
 <tr>
		<td align="left" valign="top" colspan="3">&nbsp;
		
		</td>
	</tr>
 <tr>
		<td align="left" valign="top" colspan="3">
		<input type="submit" value="Submit" style="cursor:pointer">
		</td>
	</tr>
</table>
</form>

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
