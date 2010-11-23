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
          <td align="center" valign="middle"><b><big><br># Halaman Error #</big></b><br></td>
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

<?php
$nama=$_POST[nama];
$nomor=$_POST[nomor];
$atasnama=$_POST[atasnama];

if (empty($nama)) 
{ 
   ?>
	 <table width="800px" height="250px" cellpadding="6px" cellspacing="0" border="0">
		 <tr>
			 <td align="center" valign="middle"><big><b>Nama Bank tidak boleh kosong</b></big>
				 <br><br>
					<a href="add_bank.php" class="link_kecil">Kembali ke halaman sebelumnya</a>
				</td>
			</tr>
		</table>
  <?php
  }
else if(empty($nomor)) 
{ 
   ?>
	 <table width="800px" height="250px" cellpadding="6px" cellspacing="0" border="0">
		 <tr>
			 <td align="center" valign="middle"><big><b>Nomor Rekening tidak boleh kosong</b></big>
				 <br><br>
					<a href="add_bank.php" class="link_kecil">Kembali ke halaman sebelumnya</a>
				</td>
			</tr>
		</table>
  <?php
  }
else if (empty($atasnama)) 
{ 
   ?>
	 <table width="800px" height="250px" cellpadding="6px" cellspacing="0" border="0">
		 <tr>
			 <td align="center" valign="middle"><big><b>Atas Nama tidak boleh kosong</b></big>
				 <br><br>
					<a href="add_bank.php" class="link_kecil">Kembali ke halaman sebelumnya</a>
				</td>
			</tr>
		</table>
  <?php
  }
else
{
 $query="UPDATE rekening SET nama_bank='$nama', nomor_rekening='$nomor', atas_nama='$atasnama' WHERE id_rekening='$_GET[id_bank]'";
	$res=mysql_query($query);
	if($res)
	{
	?>
	 <script language="javascript">
		 document.location="lihat_bank.php";
		</script>
	<?php
	}
}

 include "common/footer_admin.php";
?>