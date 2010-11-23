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

<table width="800px" cellpadding="6px" cellspacing="0" border="0">
 <tr>
  <td align="left" valign="middle" width="50%"><b><big>Withdraw Poin</big></b></td>
  <td align="right" valign="middle" width="50%"></td>
 </tr>
</table><br />
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

<table width="800px">
  <tr>
	  <td align="center" valign="middle" height="20px"></td>
	</tr>
</table>


<?php
include "common/footer_admin.php";
?>