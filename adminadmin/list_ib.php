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
  <td align="left" valign="middle" width="50%"><b><big>List Instant Buy</big></b></td>
  <td align="right" valign="middle" width="50%"></td>
 </tr>
</table><br />
<table width="800px" cellpadding="6px" cellspacing="0" border="1px">
  <tr bgcolor="#efefef">
	  <td align="center" valign="middle" width="25px" class="putih"><b>No.</b></td>
	  <td align="center" valign="middle" width="275px" class="putih"><b>Nama Barang</b></td>
	  <td align="center" valign="middle" width="100px" class="putih"><b>Username</b></td>
	  <td align="center" valign="middle" width="100px" class="putih"><b>Token</b></td>
	  <td align="center" valign="middle" width="150px" class="putih"><b>Tanggal</b></td>
	  <td align="center" valign="middle" width="100px" class="putih"><b>Detail</b></td>
	  <td align="center" valign="middle" width="50px" class="putih"><b>Action</b></td>
	</tr>
	<?php
	$abc="SELECT * FROM instant_buy WHERE status='0' ORDER BY tanggal_update ASC";
	$res=mysql_query($abc);
	$n=1;
	if(mysql_num_rows($res)>0)
	{
	  while($beo=mysql_fetch_array($res))
		{
		 $barang=mysql_fetch_array(mysql_query("SELECT * FROM product WHERE id_product='".$beo[id_product]."'"));
		 $kon=mysql_fetch_array(mysql_query("SELECT * FROM member WHERE username='".$beo[username]."'"));
		 $tujuan=mysql_fetch_array(mysql_query("SELECT * FROM tujuan WHERE id_tujuan='".$kon[id_tujuan]."'"));
			list($h, $j, $k)=split ("[- :]", $beo[tanggal_update]);
			$tgl=$k."-".$j."-".$h;
	?>
  <tr>
	  <td align="center" valign="middle" width="25px" class="putih"><?php echo $n; ?></td>
	  <td align="left" valign="middle" width="275px" class="putih"><?php echo $barang[nama_barang]; ?></td>
	  <td align="left" valign="middle" width="100px" class="putih"><?php echo $beo[username]; ?></td>
	  <td align="center" valign="middle" width="100px" class="putih"><?php echo $beo[token]; ?></td>
	  <td align="center" valign="middle" width="150px" class="putih"><?php echo $tgl; ?></td>
	  <td align="center" valign="middle" width="100px" class="putih">
				<a class="link_biru2" href="#" onclick="return hs.htmlExpand(this)">
					Detail
				</a>
				<div class="highslide-maincontent">
					<h3>Detail Konsumen</h3>
					 <table cellpadding="3px" cellspacing="0" width="100%">
						 <tr>
							 <td align="left" valign="top" width="33%">Username</td>
								<td align="center" valign="top" width="2%">:</td>
							 <td align="left" valign="top" width="65%"><b><?php echo $kon[username]; ?></b></td>
							</tr>
						 <tr>
							 <td align="left" valign="top" width="33%">Nama</td>
								<td align="center" valign="top" width="2%">:</td>
							 <td align="left" valign="top" width="65%"><b><?php echo $kon[nama]; ?></b></td>
							</tr>
						 <tr>
							 <td align="left" valign="top" width="33%">Email</td>
								<td align="center" valign="top" width="2%">:</td>
							 <td align="left" valign="top" width="65%"><b><?php echo $kon[email]; ?></b></td>
							</tr>
						 <tr>
							 <td align="left" valign="top" width="33%">Alamat</td>
								<td align="center" valign="top" width="2%">:</td>
							 <td align="left" valign="top" width="65%"><b><?php echo $kon[alamat]." ".$tujuan[tujuan]; ?></b></td>
							</tr>
						</table>
				</div>
			</td>
	  <td align="center" valign="middle" width="50px" class="putih">
			 <a class="link_biru" href="list_ib_pro.php?id=<?php echo $beo[id_ib]; ?>">Proses</a>
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
	  <td align="center" valign="middle" colspan="8">Belum ada instant buy pada saat ini</td>
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