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
$id_kategori = val_get('id_kategori', 'int');
$err_msg = '';
$abc="SELECT * FROM kategori_barang WHERE id_kategori='$id_kategori'";
$aaa=mysql_query($abc);
if (!$aaa)
{
	$err_msg .= 'Tidak dapat ambil data kategori.';
}
else if(mysql_num_rows($aaa)>0)
{
  while($beo=mysql_fetch_array($aaa))
	{
		$pop = 'SELECT * FROM sub_kategori_barang WHERE id_kategori_barang='.$beo['id_kategori_barang'];
		$uiu=mysql_query($pop);
		if (!$uiu)
		{
			$err_msg .= 'Tidak dapat ambil data sub kategori barang.';
			break;
		}		
		else if(mysql_num_rows($uiu)>0)
		{	
			$query2='DELETE FROM sub_kategori_barang WHERE id_kategori_barang='.$beo['id_kategori_barang'];
			$result2=mysql_query($query2);
			if (!$result2)
			{
				$err_msg .= 'Tidak dapat hapus data sub kategori barang.';
				break;
			}		
		}  
		else 
		{
			$err_msg .= 'Tidak dapat ambil data sub kategori barang.';
			break;
		}		
	}
	
	if ($err_msg == '')
	{
		$query3="DELETE FROM kategori_barang WHERE id_kategori='$id_kategori'";
		$result3=mysql_query($query3);
		if ($result3)
		{  
			$query3="DELETE FROM kategori WHERE id_kategori='$id_kategori'";
			$result3=mysql_query($query3);
			if ($result3)
			{  
				?>
				<script language="JavaScript">
					document.location="lihat_kategori_utama.php"; 
				</script>
				<?php
			}
			else
			{
				$err_msg .= 'Tidak dapat hapus data kategori.';
			}
		}
		else
		{
			$err_msg .= 'Tidak dapat hapus data kategori barang.';
		}
	}
}
else
{
	$err_msg .= 'Tidak dapat ambil data kategori.';
}

?>
<table cellpadding="10px" cellspacing="1px" border="0" width="400px">
 	<tr>
  	<td align="center" valign="middle" class="header_error">Hapus Kategori Utama Barang</td>
 	</tr>
 	<tr align="center" valign="middle">
   	<td><big><?php echo $err_msg; ?></big><br></td>
 	</tr>
 	<tr>
   	<td align="center" valign="middle"><a href='javascript:history.back(-1)' class="link_kecil">Kembali ke halaman sebelumnya</a></td>
 	</tr>
</table>
<?php
include "common/footer_admin.php";
?>