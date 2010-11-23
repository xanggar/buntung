<?php
include "common/top_admin.php";
?>
<table width="800px" cellpadding="10px" cellspacing="1px" border="0">
  <tr>
    <td align="center" valign="middle">
    <?php
      if (!authen())
      {
      ?>
      <table cellpadding="5px" width="300px">
        <tr>
          <td align="center" valign="middle"><font color="#ff0000"><b><big><br># Halaman Error #</big></b></font><br></td>
        </tr>
	      <tr align="left" valign="middle">
	        <td align="center">Anda harus login untuk mengakses halaman ini.<br></td>
	      </tr>
	      <tr>
	        <td align="center" valign="middle"><a href="login.php" class="link_biru">Klik untuk login</a></td>
	      </tr>
	    </table>
	  <?php
		  exit;
      }
      ?>
	</td>
  </tr>
</table>

<?php
 $poin=mysql_fetch_array(mysql_query("SELECT * FROM harga_poin WHERE id='1'"));
?>

<table width="800px" cellpadding="6px" cellspacing="0" border="0">
 <tr>
  <td align="left" valign="middle" width="50%"><b><big>Convert Dana (1 poin = <?php echo $poin[harga_poin]; ?>)</big></b></td>
  <td align="right" valign="middle" width="50%"></td>
 </tr>
</table><br />
<table width="800px" cellpadding="6px" cellspacing="0" border="1px">
  <tr bgcolor="#efefef">
	  <td align="center" valign="middle" width="25px" class="putih"><b>No.</b></td>
	  <td align="center" valign="middle" width="150px" class="putih"><b>Jumlah Uang</b></td>
	  <td align="center" valign="middle" width="150px" class="putih"><b>Username</b></td>
	  <td align="center" valign="middle" width="150px" class="putih"><b>Saran System</b></td>
	  <td align="center" valign="middle" width="75px" class="putih"><b>Action</b></td>
	</tr>
	<?php
	$abc="SELECT * FROM booking WHERE menang <> '1' AND convert_a='0' AND (status = '3' OR status = '11') ORDER BY tanggal_konfirmasi ASC";
	$res=mysql_query($abc);
	$n=1;
	if(mysql_num_rows($res)>0)
	{
	  while($beo=mysql_fetch_array($res))
		{
		 $barang=mysql_fetch_array(mysql_query("SELECT * FROM product WHERE id_product='".$beo[id_product]."'"));
			
			$pp=$beo[harga_booking]/$poin[harga_poin];
			
	?>
  <tr>
	  <td align="center" valign="middle" width="25px" class="putih"><?php echo $n; ?></td>
	  <td align="center" valign="middle" width="150px" class="putih">Rp.<?php echo number_format($beo[harga_booking], 0, ',', '.'); ?>,-</td>
	  <td align="center" valign="middle" width="150px" class="putih"><?php echo $beo[username]; ?></td>
	  <td align="center" valign="middle" width="150px" class="putih"><?php echo $pp; ?> poin</td>
	  <td align="center" valign="middle" width="150px" class="putih">
			 <a href="sytem_convert.php?id_booking=<?php echo $beo[id_booking]; ?>&username=<?php echo $beo[username]; ?>&jum=<?php echo $pp; ?>&dana=<?php echo $beo[harga_booking]; ?>" class="link_biru">System Convert</a>
			</td>
	</tr>
	<?php
		$n++;
		}
	}
	else
	{
	?>
	<tr>
	  <td align="center" valign="middle" colspan="8">Belum ada konfirmasi pembayaran pada saat ini</td>
	</tr>
	<?php
		}
	?>
</table>

<table width="800px">
  <tr>
	  <td align="center" valign="middle" height="20px"></td>
	</tr>
</table>


<?php
include "common/footer_admin.php";
?>