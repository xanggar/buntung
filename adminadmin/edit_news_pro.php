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
		  	exit();
      }
      ?>
		</td>
  </tr>
</table>

<?php
$isi = val_post('isi', 'text');
$tgl_mulai = val_post('tahunmulai', 'int')."-".val_post('bulanmulai', 'int')."-".val_post('tanggalmulai', 'int');
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

if ($isi == '')
{
	?>
  <table width="800px" height="250px" cellpadding="6px" cellspacing="0" border="0">
    <tr>
      <td align="center" valign="middle"><big><b><font color="#ff0000">Anda belum memasukkan Isi Berita</font></b></big>
        <br><br>
        <a href="javascript:history.back(-1)" class="link_kecil">Kembali ke halaman sebelumnya</a>
      </td>
    </tr>
  </table>
  <?php
}
else if (val_post('tahunmulai', 'int')<=0||val_post('bulanmulai', 'int')<=0||val_post('tanggalmulai', 'int')<=0)
{
	?>
 	<table width="800px" height="250px" cellpadding="6px" cellspacing="0" border="0">
   	<tr>
     	<td align="center" valign="middle"><big><b><font color="#ff0000">Anda belum memasukkan Tanggal Berita</font></b></big>
       	<br><br>
        <a href="javascript:history.back(-1)" class="link_kecil">Kembali ke halaman sebelumnya</a>
      </td>
    </tr>
  </table>
  <?php
}
else if(empty($name))
{
	$isi_a=str_replace("\r\n", "<br>", val_post('isi', 'text'));
	$query3="UPDATE berita_ringan SET isi_berita='$isi_a', tgl_berita='$tgl_mulai' WHERE brid='".val_get('id_news', 'int')."'";
	$result3=mysql_query($query3);
	if(result3)
  {  
  	?>
    <script language="JavaScript">
      document.location="lihat_news.php"; 
    </script>
  	<?php
  }
}
else if (!empty($name))
{
	$tmp_name=$_FILES["gambar"]["tmp_name"];
	$type=$_FILES["gambar"]["type"];
	if (($type!="image/gif")&&($type!="image/pjpeg")&&($type!="image/png")&&($type!="image/x-png")&&($type!="image/jpeg")&&($type!="image/jpg"))  
	{
		?>
	 	<table width="800px" height="250px" cellpadding="6px" cellspacing="0" border="0">
		 	<tr>
			 	<td align="center" valign="middle"><big><b><font color="#ff0000">Maaf, tipe file yang kami terima hanya JPG, JPEG, GIF, dan PNG</font></b></big>
				 	<br><br>
					<a href="edit_promo.php?id_promo=<?php echo val_get('id_promo', 'int'); ?>" class="link_kecil">Kembali ke halaman sebelumnya</a>
				</td>
			</tr>
		</table>
		<?php
	}
	else
	{ 
		$err_msg = '';
		$q_t = "SELECT * FROM berita_ringan WHERE brid='".val_get('id_news', 'int')."'";
		$r_t = mysql_query($q_t);
		if ($r_t)
		{
			if(mysql_num_rows($r_t) > 0)
			{
				$d_t = mysql_fetch_array($r_t);
				$curr_img = '../images_news/'.$d_t['gambar_news'];
				if (file_exists($curr_img) && is_file($curr_img))
				{
					unlink($curr_img);
				}
			}
			else
			{
				$err_msg .= 'Cannot get data.<br>';
			}
		}
		else
		{
			$err_msg .= 'Cannot get data.<br>';
		}
		
		$namafile=date("s").strtolower($name);
		if (!move_uploaded_file($tmp_name, "../images_news/$namafile"))
			$err_msg .= 'Cannot upload data.<br>';
		
		if ($err_msg == '')
		{ 
			chmod ("../images_news/$namafile", 0777);
		
     	$isi_a=str_replace("\r\n", "<br>", val_post('isi', 'text'));
			$query3="UPDATE berita_ringan SET isi_berita='$isi_a', tgl_berita='$tgl_mulai', gambar_news='$namafile' WHERE brid='".val_get('id_news', 'int')."'";
			$result=mysql_query($query3);
			if($result)
			{ 
				?>
        <table cellpadding="5px" width="100%" height="150px">
          <tr>
            <td align="center" valign="middle"><font color="#377aa9"><b><big><br><br># Edit Berita sukses #</big></b></font><br><br></td>
          </tr>
        </table>
        <script language="JavaScript">
          var start=new Date();
          start=Date.parse(start)/1000;
          var counts=5;
          function CountDown()
          { 
						var now=new Date();
          	now=Date.parse(now)/1000;
          	var x=parseInt(counts-(now-start), 10);
          	if(x>0)
          	{ 
							timerID=setTimeout("CountDown()", 100)
          	}
						else
						{ 
							document.location="lihat_news.php";
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
            <td align="center" valign="middle" class="header_error">Edit Berita Error</td>
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
include "common/footer_admin.php";
?>