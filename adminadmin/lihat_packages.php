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
  <td align="left" valign="middle" width="50%"><b><big>Packages</big></b></td>
  <td align="right" valign="middle" width="50%"></td>
 </tr>
</table><br />
<table width="800px" cellpadding="6px" cellspacing="0" border="1px">
  <tr bgcolor="#efefef">
	  <td align="center" valign="middle" width="25px" class="putih"><b>No.</b></td>
	  <td align="center" valign="middle" width="200px" class="putih"><b>Nama Packages</b></td>
	  <td align="center" valign="middle" width="100px" class="putih"><b>Jumlah Bids</b></td>
	  <td align="center" valign="middle" width="175px" class="putih"><b>Harga</b></td>
	  <td align="center" valign="middle" width="125px" class="putih"><b>Action</b></td>
	</tr>
	<?php
	$abc="SELECT * FROM packages ORDER BY jumlah_bid";
	$res=mysql_query($abc);
	$n=1;
	if(mysql_num_rows($res)>0)
	{
	  while($beo=mysql_fetch_array($res))
		{
	?>
  <tr>
	  <td align="center" valign="middle" width="5px"><?php echo $n ?>.</td>
	  <td align="left" valign="middle" width="200px"><?php echo $beo['nama_package']; ?></td>
	  <td align="center" valign="middle" width="100px"><?php echo $beo['jumlah_bid']; ?></td>
	  <td align="left" valign="middle" width="175px">Rp.<?php echo number_format($beo['harga_package'], 0, ',', '.'); ?>,-</td>
	  <td align="center" valign="middle" width="125px">
		  <table cellpadding="3px" cellspacing="0" width="100%">
			  <tr>
				  <td align="center" valign="middle" width="25%"><a href="edit_package.php?id_package=<?php echo $beo['id_package']; ?>" class="link_kecil">Edit</a></td>
				  <td align="center" valign="middle" width="25%"><a href="hapus_package.php?id_package=<?php echo $beo['id_package']; ?>" class="link_kecil">Hapus</a></td>
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
	  <td align="center" valign="middle" colspan="3">Belum ada Kategori Utama pada saat ini</td>
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