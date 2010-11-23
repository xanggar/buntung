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
  <td align="left" valign="middle" width="50%"><b><big>Kategori Utama</big></b></td>
  <td align="right" valign="middle" width="50%"></td>
 </tr>
</table><br />
<table width="800px" cellpadding="6px" cellspacing="0" border="1px">
  <tr bgcolor="#efefef">
	  <td align="center" valign="middle" width="25px" class="putih"><b>NOMOR</b></td>
	  <td align="center" valign="middle" width="400px" class="putih"><b>NAMA KATEGORI UTAMA</b></td>
	  <td align="center" valign="middle" width="375px" class="putih"><b>FASILITAS</b></td>
	</tr>
	<?php
	$abc="SELECT * FROM kategori ORDER BY deskripsi";
	$res=mysql_query($abc);
	$n=1;
	if(mysql_num_rows($res)>0)
	{
	  while($beo=mysql_fetch_array($res))
		{
	?>
  <tr>
	  <td align="center" valign="middle" width="5px"><?php echo $n ?>.</td>
	  <td align="left" valign="middle" width="300px"><?php echo $beo['deskripsi']; ?></td>
	  <td align="center" valign="middle" width="395px">
		  <table cellpadding="3px" cellspacing="0" width="100%">
			  <tr>
				  <td align="center" valign="middle" width="25%"><a href="edit_kategori.php?id_kategori=<?php echo $beo['id_kategori']; ?>" class="link_kecil">Edit</a></td>
				  <td align="center" valign="middle" width="25%"><a href="konf_hapus_kategori.php?id_kategori=<?php echo $beo['id_kategori']; ?>" class="link_kecil">Hapus</a></td>
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