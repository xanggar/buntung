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
	        <td align="center">Kamu harus login untuk mengakses halaman ini.<br></td>
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

<br /><br />

<table width="700px" cellpadding="6px" cellspacing="0" border="1px">
  <tr bgcolor="#efefef">
	  <td align="left" valign="middle" width="5px" colspan="5" class="putih">
				<a href="add_bank.php" class="bid" onMouseOver="style.textDecoration='underline'" onMouseOut="style.textDecoration='none'">Tambah Rekening</a>
			</td>
	</tr>
  <tr bgcolor="#efefef">
	  <td align="center" valign="middle" width="5px" class="putih"><b>No.</b></td>
	  <td align="center" valign="middle" width="300px" class="putih"><b>NAMA BANK</b></td>
	  <td align="center" valign="middle" width="150px" class="putih"><b>NOMOR REKENING</b></td>
	  <td align="center" valign="middle" width="150px" class="putih"><b>ATAS NAMA</b></td>
	  <td align="center" valign="middle" width="95px" class="putih"><b>FASILITAS</b></td>
	</tr>
	<?php
	$abc="SELECT * FROM rekening ORDER BY id_rekening ASC";
	$res=mysql_query($abc);
	$n=1;
	if(mysql_num_rows($res)>0)
	{
	  while($beo=mysql_fetch_array($res))
		{
	?>
  <tr>
	  <td align="center" valign="middle" width="5px"><?php echo $n ?>.</td>
	  <td align="left" valign="middle" width="300px"><?php echo $beo[nama_bank]; ?></td>
	  <td align="center" valign="middle" width="150px">
			<?php 
			if(!empty($beo[nomor_rekening]))
			{
			 echo $beo[nomor_rekening]; 
			}
			else
			{
			 echo "-";
			}
			?>
			</td>
	  <td align="center" valign="middle" width="150px">
			<?php 
			if(!empty($beo[atas_nama]))
			{
			 echo $beo[atas_nama];
			}
			else
			{
			 echo "-";
			} 
			?>
			</td>
	  <td align="center" valign="middle" width="95px">
		  <table cellpadding="3px" cellspacing="0" width="100%">
			  <tr>
				  <td align="center" valign="middle" width="25%"><a href="edit_bank.php?id_bank=<?php echo $beo[id_rekening]; ?>" class="link_kecil">Edit</a></td>
				  <td align="center" valign="middle" width="25%"><a href="konf_hapus_bank.php?id_bank=<?php echo $beo[id_rekening]; ?>" class="link_kecil">Hapus</a></td>
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

<br /><br />

<table width="800px">
  <tr>
	  <td align="center" valign="middle" height="20px"></td>
	</tr>
</table>


<?php
include "common/footer_admin.php";
?>