<?php
 include "common/top3.php";
	$poin=mysql_fetch_array(mysql_query("SELECT * FROM ms_poin WHERE username='$USERNAME'"));
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
<h2>Account History (<?php echo $poin[jumlah_poin]; ?> poin)</h2>
<p><strong>Berikut adalah 15 transaksi terakhir Anda di <?php echo $namaweb; ?></strong></p>

<!-- Contact Form Start -->
<table cellpadding="7px" cellspacing="0" width="90%" style="border:1px solid #acbccc">
 <tr>
	 <td align="center" valign="middle" width="20%"><b>Username</b></td>
	 <td align="center" valign="middle" width="30%"><b>Tanggal</b></td>
	 <td align="center" valign="middle" width="10%">&nbsp;</td>
	 <td align="left" valign="middle" width="40%"><b>Keterangan</b></td>
	</tr>
	<?php
	$log=mysql_query("SELECT * FROM log WHERE username='".$USERNAME."' ORDER BY tanggal DESC LIMIT 15");
	$log2=mysql_num_rows($log);
	if($log2>0)
	{
	 while($log3=mysql_fetch_array($log))
		{
			list($a, $b, $c, $d, $e, $f)=split ("[- :]", $log3['tanggal']);
			$tgl=$c."-".$b."-".$a. "&nbsp; &nbsp;".$d.":".$e.":".$f;
			?>
			<tr>
				<td align="center" valign="middle" width="20%"><?php echo $USERNAME; ?></td>
				<td align="center" valign="middle" width="30%"><?php echo $tgl; ?></td>
				<td align="center" valign="middle" width="10%">&nbsp;</td>
				<td align="left" valign="middle" width="40%"><?php echo $log3[ket]; ?></td>
			</tr>
			<?php
	 }
	}
	else
	{
	?>
	<tr>
	 <td colspan="4" align="center" valign="middle"><strong>Belum ada history transaksi Anda pada saat ini</strong></td>
	</tr>
	<?php
	}
	?>
</table>


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
