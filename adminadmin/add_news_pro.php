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
$isi = val_post('isi', 'text');
$tgl_mulai=val_post('tahunmulai', 'int')."-".val_post('bulanmulai', 'int')."-".val_post('tanggalmulai', 'int');
$name=$_FILES["gambar"]["name"];
$name=str_replace(" ", "_", $name);
$name=str_replace("-","_", $name);
$name=str_replace("\'","", $name);
$name=str_replace("+","", $name);
$name=str_replace("*","", $name);
$name=str_replace(",","", $name);
$name=str_replace('\"',"", $name);
$name=str_replace("&","", $name);
$name=str_replace("$","", $name);
$name=str_replace("#","", $name);
$name=str_replace("@","", $name);
$name=str_replace("(","", $name);
$name=str_replace(")","", $name);
$name=str_replace("{","", $name);
$name=str_replace("}","", $name);
$name=str_replace("[","", $name);
$name=str_replace("]","", $name);
$name=str_replace(":","", $name);
$name=str_replace(";","", $name);
$name=str_replace("!","", $name);
if (empty($_POST[judul]))
{
?>
	 <table width="800px" height="250px" cellpadding="6px" cellspacing="0" border="0">
		 <tr>
			 <td align="center" valign="middle"><big><b><font color="#ff0000">Anda belum memasukkan Judul Berita</font></b></big>
				 <br><br>
					<a href="add_news.php" class="link_kecil">Kembali ke halaman sebelumnya</a>
				</td>
			</tr>
		</table>
  <?php
  }
else if (empty($isi))
{
?>
	 <table width="800px" height="250px" cellpadding="6px" cellspacing="0" border="0">
		 <tr>
			 <td align="center" valign="middle"><big><b><font color="#ff0000">Anda belum memasukkan Isi Berita</font></b></big>
				 <br><br>
					<a href="add_news.php" class="link_kecil">Kembali ke halaman sebelumnya</a>
				</td>
			</tr>
		</table>
  <?php
  }
else if (empty($_POST[tanggal_berita]))
{
?>
	 <table width="800px" height="250px" cellpadding="6px" cellspacing="0" border="0">
		 <tr>
			 <td align="center" valign="middle"><big><b><font color="#ff0000">Anda belum memasukkan Tanggal Berita</font></b></big>
				 <br><br>
					<a href="add_news.php" class="link_kecil">Kembali ke halaman sebelumnya</a>
				</td>
			</tr>
		</table>
  <?php
  }
else if(empty($name))
{
  $isi_a=str_replace("\r\n", "<br>", val_post('isi', 'text'));
  $query="INSERT INTO berita_ringan (judul_berita, isi_berita, tgl_berita) VALUES ('$_POST[judul]', '$isi_a', '$_POST[tanggal_berita]')";
  $result=mysql_query($query);
  if($result)
  { 
	?>
	<table cellpadding="5px" width="100%" height="200px">
	<tr>
	<td align="center" valign="middle"><font color="#377aa9"><big><br><br># Tambah Berita sukses #</big></font><br><br></td>
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
	var counts=3;
	function CountDown()
	{ var now=new Date();
		now=Date.parse(now)/1000;
		var x=parseInt(counts-(now-start), 10);
		if(x>0)
		{ timerID=setTimeout("CountDown()", 100)
			}
		else
		{ document.location="lihat_news.php";
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
      <td align="center" valign="middle" class="header_error">Tambah Berita Error</td>
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
else if (!empty($name))
{
	$tmp_name=$_FILES["gambar"]["tmp_name"];
	$type=$_FILES["gambar"]["type"];
	if (($type!="image/gif")&&($type!="image/pjpeg")&&($type!="image/png")&&($type!="image/jpeg")&&($type!="image/jpg"))  
	{
	?>
	 <table width="800px" height="250px" cellpadding="6px" cellspacing="0" border="0">
		 <tr>
			 <td align="center" valign="middle"><big><b><font color="#ff0000">Maaf, tipe file yang kami terima hanya JPG, JPEG, GIF, dan PNG</font></b></big>
				 <br><br>
					<a href="add_promo.php" class="link_kecil">Kembali ke halaman sebelumnya</a>
				</td>
			</tr>
		</table>
	<?php
			}
	else
	{ 
			$namafile=date("s").strtolower($name);
			if (move_uploaded_file($tmp_name, "../images_news/$namafile"))
			{ 
					chmod ("../images_news/$namafile", 0777);
				
     $isi_a=str_replace("\r\n", "<br>", val_post('isi', 'text'));
					$query="INSERT INTO berita_ringan (judul_berita, isi_berita, tgl_berita, gambar_news) VALUES ('$_POST[judul]', '$isi_a', '$_POST[tanggal_berita]', '$namafile')";
					$result=mysql_query($query);
					if($result)
					{ 
						?>
							<table cellpadding="5px" width="100%" height="150px">
								<tr>
									<td align="center" valign="middle"><font color="#377aa9"><b><big><br><br># Tambah Berita sukses #</big></b></font><br><br></td>
								</tr>
								</table>
								<script language="JavaScript">
								var start=new Date();
								start=Date.parse(start)/1000;
								var counts=5;
								function CountDown()
								{ var now=new Date();
								now=Date.parse(now)/1000;
								var x=parseInt(counts-(now-start), 10);
								if(x>0)
								{ timerID=setTimeout("CountDown()", 100)
								}
								else
								{ document.location="lihat_news.php";
								}
								}
								window.setTimeout('CountDown()', 100);
								</script>
							<?php
							}
							else
							{ 
							?>
								<table cellpadding="10px" cellspacing="1px" border="0" width="800px">
									<tr>
										<td align="center" valign="middle" class="header_error">Tambah Berita Error</td>
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
			else
			{
			?>
			<div align='center'><p><br><br><br><br>
			<big><b>Maaf, gambar gagal untuk di upload</b></big><br><br>
			<a href='javascript:history.back(-1)' class="link_kecil">Kembali ke halaman sebelumnya</a>
			<?php 
					}
			}
}
mysql_close();
include "common/footer_admin.php";
?>
