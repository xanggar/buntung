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
<br><br>
<?php
$deskripsi = val_post('deskripsi', 'text');
if (!empty($deskripsi))
{ $cek="SELECT deskripsi FROM kategori WHERE deskripsi='$deskripsi'";
  $result=mysql_query($cek);
  }
	
if (empty($deskripsi))
{
?>
   <table cellpadding="10px" cellspacing="1px" border="0" width="400px">
     <tr>
      <td align="center" valign="middle" class="header_error">Tambah Kategori Utama Error</td>
     </tr>
	   <tr align="center" valign="middle">
		   <td>Tolong masukkan Kategori Utama.<br></td>
		 </tr>
		 <tr>
		   <td align="center" valign="middle"><a href='javascript:history.back(-1)' class="link_kecil">Kembali ke halaman sebelumnya</a></td>
		 </tr>
	</table>
  <?php
  }
else if (mysql_num_rows($result)>0)
{ 
	 ?>
   <table cellpadding="10px" cellspacing="1px" border="0" width="400px">
     <tr>
      <td align="center" valign="middle" class="header_error">Tambah Kategori Utama Error</td>
     </tr>
	   <tr align="center" valign="middle">
		   <td>Kategori Utama &nbsp;&nbsp;<font color="#ff0000" size="+1"><?php echo "$deskripsi"; ?></font>&nbsp; &nbsp;sudah ada di database.<br></td>
		 </tr>
		 <tr>
		   <td align="center" valign="middle"><a href='javascript:history.back(-1)' class="link_kecil">Kembali ke halaman sebelumnya</a></td>
		 </tr>
	</table>
  <?php
} 
else
{
  $query="INSERT INTO kategori (deskripsi) VALUES ('$deskripsi');";
  $result=mysql_query($query);
  if($result)
  { 
	?>
   <table cellpadding="10px" cellspacing="1px" border="0" width="800px">
     <tr>
      <td align="center" valign="middle" class="header_sukses">Tambah Kategori Berhasil</td>
     </tr>
	   <tr align="center" valign="middle">
		   <td>
			   <big>Proses Tambah Kategori Berhasil, Kategori <font color="#ff0000"><?php echo $deskripsi ?></font> berhasil ditambahkan ke database.</big>
		   </td>
		 </tr>
	</table>
	<script language="JavaScript">
	 <!-- Original:  Corey (638@gohip.com ) -->
	 <!-- Web Site:   http://six38.tripod.com -->
	 <!-- This script and many more are available free online at -->
	 <!-- The JavaScript Source!! http://javascript.internet.com -->
	 <!-- Begin
	 var start=new Date();
	 start=Date.parse(start)/1000;
	// Ini diubah-ubah untuk set kecepatan pindah halaman. 
	// Makin kecil, makin cepat pindah halaman
	var counts=5;
	function CountDown()
	{ var now=new Date();
		now=Date.parse(now)/1000;
		var x=parseInt(counts-(now-start), 10);
		if(x>0)
		{ timerID=setTimeout("CountDown()", 100)
			}
		else
		{ document.location="lihat_kategori_utama.php";
			}
		}
	window.setTimeout('CountDown()', 100);
	//  End -->
 </script>
   <?php
   }
 else
 { 
	 ?>
   <table cellpadding="10px" cellspacing="1px" border="0" width="800px">
     <tr>
      <td align="center" valign="middle" class="header_error">Pendaftaran Error</td>
     </tr>
	   <tr align="center" valign="middle">
		   <td>Telah terjadi occurred error.<br></td>
		 </tr>
		 <tr>
		   <td valign="middle" align="center"><a href='javascript:history.back(-1)' class="link_kecil">Kembali ke halaman sebelumnya</a></td>
		 </tr>
	</table>
	<?php
   }
 }
mysql_close();
?>
<table width="800px">
 <tr>
	 <td height="20px"></td>
	</tr>
</table>
<?php
include "common/footer_admin.php";
?>