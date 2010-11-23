<?php
include "common/top_admin.php";
if (!authen())
{
  ?>
  <script type="text/javascript">
    window.location = 'login.php';
  </script>
  <br /><br />
  <font color="#ff0000"><b><big><br># Halaman Error #</big></b></font><br><br>
  Anda harus login untuk mengakses halaman ini.<br><br><br>
  <a href="login.php" class="link_biru">Klik untuk login</a>
  <br /><br />
  <?php
}
else
{
  ?>
  <table border="0" cellpadding="0" cellspacing="0" width="800px">
    <tr>
      <td align="center" valign="top" width="100%">
						
		<br /><br />			
<table width="800px" cellpadding="6px" cellspacing="0" border="0">
 <tr>
  <td align="left" valign="middle" width="50%"><b><big>Withdraw Poin</big></b></td>
  <td align="right" valign="middle" width="50%"></td>
 </tr>
</table>
<table width="800px" cellpadding="6px" cellspacing="0" border="1px">
  <tr bgcolor="#efefef">
	  <td align="center" valign="middle" width="25px" class="putih"><b>No.</b></td>
	  <td align="center" valign="middle" width="100px" class="putih"><b>Username</b></td>
	  <td align="center" valign="middle" width="100px" class="putih"><b>Tanggal Request</b></td>
	  <td align="center" valign="middle" width="150px" class="putih"><b>Jumlah Withdraw</b></td>
	  <td align="center" valign="middle" width="150px" class="putih"><b>Jumlah Poin Sekarang</b></td>
	  <td align="center" valign="middle" width="50px" class="putih"><b>Action</b></td>
	</tr>
	<?php
	$abc="SELECT * FROM withdraw WHERE status='0' ORDER BY tanggal ASC";
	$res=mysql_query($abc);
	$n=1;
	if(mysql_num_rows($res)>0)
	{
	  while($beo=mysql_fetch_array($res))
		{
			list($h, $j, $k)=split ("[- :]", $beo[tanggal]);
			$tgl=$k."-".$j."-".$h;
		 $ms_poin=mysql_fetch_array(mysql_query("SELECT * FROM ms_poin WHERE username='".$beo[username]."'"));
		 $user=mysql_fetch_array(mysql_query("SELECT * FROM member WHERE username='".$beo[username]."'"));
			$harga=mysql_fetch_array(mysql_query("SELECT * FROM harga_poin"));
			
			$duit=$beo[jumlah]*$harga[harga_poin];
			
	?>
  <tr>
	  <td align="center" valign="middle" width="25px" class="putih"><?php echo $n; ?></td>
	  <td align="center" valign="middle" width="75px" class="putih">
				<a class="link_biru2" href="#" onclick="return hs.htmlExpand(this)">
					<?php echo $beo[username]; ?>
				</a>
				<div class="highslide-maincontent">
					<h3>Tranfer Ke</h3>
					 <table cellpadding="3px" cellspacing="0" width="100%">
						 <tr>
							 <td align="left" valign="top" width="33%">Nomor Rekening</td>
								<td align="center" valign="top" width="2%">:</td>
							 <td align="left" valign="top" width="65%"><b><?php echo $beo[nomor_rekening]; ?></b></td>
							</tr>
						 <tr>
							 <td align="left" valign="top" width="33%">Nama Bank</td>
								<td align="center" valign="top" width="2%">:</td>
							 <td align="left" valign="top" width="65%"><b><?php echo $beo[nama_bank]; ?></b></td>
							</tr>
						 <tr>
							 <td align="left" valign="top" width="33%">Atas Nama</td>
								<td align="center" valign="top" width="2%">:</td>
							 <td align="left" valign="top" width="65%"><b><?php echo $beo[atas_nama]; ?></b></td>
							</tr>
						</table>
				</div>
			</td>
	  <td align="center" valign="middle" width="100px" class="putih"><?php echo $tgl; ?></td>
	  <td align="center" valign="middle" width="150px" class="putih"><?php echo $beo[jumlah]; ?></td>
	  <td align="center" valign="middle" width="150px" class="putih"><?php echo $ms_poin[jumlah_poin]; ?></td>
	  <td align="center" valign="middle" width="50px" class="putih">
		  <table cellpadding="3px" cellspacing="0" width="100%">
			  <tr>
				  <td align="center" valign="middle" width="25%"><a href="approve_withdraw.php?id=<?php echo $beo['id']; ?>&duit=<?php echo $duit; ?>" class="link_kecil">Approve</a></td>
				</tr>
			</table>
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
	  <td align="center" valign="middle" colspan="8">Belum ada withdraw poin pada saat ini</td>
	</tr>
	<?php
		}
	?>
</table>
						
<br /><br />						
<table width="800px" cellpadding="6px" cellspacing="0" border="0">
 <tr>
  <td align="left" valign="middle" width="50%"><b><big>Konfirmasi Pembayaran dari Tranfer</big></b></td>
  <td align="right" valign="middle" width="50%"></td>
 </tr>
</table><br />
<table width="800px" cellpadding="6px" cellspacing="0" border="1px">
  <tr bgcolor="#efefef">
	  <td align="center" valign="middle" width="25px" class="putih"><b>No.</b></td>
	  <td align="center" valign="middle" width="100px" class="putih"><b>Nama Packages</b></td>
	  <td align="center" valign="middle" width="100px" class="putih"><b>Tanggal Tranfer</b></td>
	  <td align="center" valign="middle" width="150px" class="putih"><b>Nama Bank</b></td>
	  <td align="center" valign="middle" width="150px" class="putih"><b>Nomor Rekening</b></td>
	  <td align="center" valign="middle" width="150px" class="putih"><b>Atas Nama</b></td>
	  <td align="center" valign="middle" width="75px" class="putih"><b>Detail</b></td>
	  <td align="center" valign="middle" width="50px" class="putih"><b>Action</b></td>
	</tr>
	<?php
	$abc="SELECT * FROM pesan_packages WHERE status='1' ORDER BY tanggal_konfirmasi ASC";
	$res=mysql_query($abc);
	$n=1;
	if(mysql_num_rows($res)>0)
	{
	  while($beo=mysql_fetch_array($res))
		{
		 $pak=mysql_fetch_array(mysql_query("SELECT * FROM packages WHERE id_package='".$beo[id_package]."'"));
			list($h, $j, $k)=split ("[- :]", $beo[tanggal_konfirmasi]);
			$tgl_trans=$k."-".$j."-".$h;
		 $bank=mysql_fetch_array(mysql_query("SELECT * FROM rekening WHERE nama_bank='".$beo[tranfer_ke]."'"));
	?>
  <tr>
	  <td align="center" valign="middle" width="25px" class="putih"><?php echo $n; ?></td>
	  <td align="center" valign="middle" width="100px" class="putih"><?php echo $pak[nama_package]; ?></td>
	  <td align="center" valign="middle" width="100px" class="putih"><?php echo $tgl_trans; ?></td>
	  <td align="center" valign="middle" width="150px" class="putih"><?php echo $beo[nama_bank]; ?></td>
	  <td align="center" valign="middle" width="150px" class="putih"><?php echo $beo[nomor_rekening]; ?></td>
	  <td align="center" valign="middle" width="150px" class="putih"><?php echo $beo[atas_nama]; ?></td>
	  <td align="center" valign="middle" width="75px" class="putih">
				<a class="link_biru2" href="#" onclick="return hs.htmlExpand(this)">
					Detail
				</a>
				<div class="highslide-maincontent">
					<h3>Detail Pembayaran</h3>
					 <table cellpadding="3px" cellspacing="0" width="100%">
						 <tr>
							 <td align="left" valign="top" width="33%">Tranfer Ke</td>
								<td align="center" valign="top" width="2%">:</td>
							 <td align="left" valign="top" width="65%"><b><?php echo $beo[tranfer_ke]; ?></b></td>
							</tr>
						 <tr>
							 <td align="left" valign="top" width="33%">Nomor Rek Admin</td>
								<td align="center" valign="top" width="2%">:</td>
							 <td align="left" valign="top" width="65%"><b><?php echo $bank[nomor_rekening]; ?></b></td>
							</tr>
						 <tr>
							 <td align="left" valign="top" width="33%">Atas Nama</td>
								<td align="center" valign="top" width="2%">:</td>
							 <td align="left" valign="top" width="65%"><b><?php echo $bank[atas_nama]; ?></b></td>
							</tr>
						 <tr>
							 <td align="left" valign="top" width="33%">Harga Paket</td>
								<td align="center" valign="top" width="2%">:</td>
							 <td align="left" valign="top" width="65%"><b>Rp.<?php echo number_format($pak['harga_package'], 0, ',', '.'); ?>,-</b></td>
							</tr>
						</table>
				</div>
			</td>
	  <td align="center" valign="middle" width="50px" class="putih">
		  <table cellpadding="3px" cellspacing="0" width="100%">
			  <tr>
				  <td align="center" valign="middle" width="25%"><a href="approve_pembayaran.php?id_bayar=<?php echo $beo['id_pesan_packages']; ?>" class="link_kecil">Approve</a></td>
				  <td align="center" valign="middle" width="25%"><a href="hapus_pesan_poin.php?id_bayar=<?php echo $beo['id_pesan_packages']; ?>" class="link_kecil">Tolak</a></td>
				</tr>
			</table>

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
						
      </td>
    </tr>
  </table>
  <br><br>
  <?php
}
include "common/footer_admin.php";
?>