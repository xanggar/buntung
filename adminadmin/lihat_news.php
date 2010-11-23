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

<table width="800px" cellpadding="10px" cellspacing="0" border="0">
  <tr>
	  <td align="right" valign="middle">&nbsp;</td>
	</tr>
</table>

<table width="780px" cellpadding="6px" cellspacing="0" border="1px">
  <tr bgcolor="#efefef">
	  <td align="center" valign="middle" width="5px" class="putih"><b>No.</b></td>
	  <td align="center" valign="middle" width="100px" class="putih"><b>GAMBAR BERITA</b></td>
	  <td align="center" valign="middle" width="400px" class="putih"><b>JUDUL & ISI BERITA</b></td>
	  <td align="center" valign="middle" width="100px" class="putih"><b>TANGGAL BERITA</b></td>
	  <td align="center" valign="middle" width="95px" class="putih"><b>FASILITAS</b></td>
	</tr>
	<?php
	 $abc="SELECT * FROM berita_ringan";
	 $res=mysql_query($abc);
	 $jumlah=mysql_num_rows($res);
	 $limit=4;
	 $offset = val_get('offset', 'int');
	 if (empty($offset))
	 { $offset = 0;
		 }
	 $halaman=intval($jumlah/$limit);
	 if($jumlah%$limit)
	 { $halaman++;
		 }
	 $abc2="SELECT * FROM berita_ringan ORDER BY tgl_berita DESC LIMIT $offset, $limit";
	 $res2=mysql_query($abc2);
	 $jumlah2=mysql_num_rows($res2);
	 if($jumlah2>0)
	 { $n=$offset+1;
	   while($row=mysql_fetch_array($res2))
		 {
			list($bb, $mm, $dd)=split ("[- :]", $row['tgl_berita']);
			$tgl_mulai=$dd."-".$mm."-".$bb;
			if ($row['gambar_news']!="")
			{ $imgSize=getimagesize("../images_news/$row[gambar_news]");
				if ($imgSize[0]>125) //lebar
				{ $lebar=125;
					$tinggi=$imgSize[1]*(1-(($imgSize[0]-$lebar)/$imgSize[0]));
					if ($tinggi>125)
					{ $tinggi=125;
					$lebar=$imgSize[0]*(1-(($imgSize[1]-$tinggi)/$imgSize[1]));
					}
					}
				else if ($imgSize[1]>100) //tinggi
				{ $tinggi=100;
					$lebar=$imgSize[0]*(1-(($imgSize[1]-$tinggi)/$imgSize[1]));
					if ($lebar>100)
					{ $lebar=100;
					$tinggi=$imgSize[1]*(1-(($imgSize[0]-$lebar)/$imgSize[0]));
					}
					}
				else
				{ $tinggi=$imgSize[1];
					$lebar=$imgSize[0];
					}
			}
			else
			{ $tinggi="120px";
				$lebar="120px";
				}

		?>
  <tr>
	  <td align="center" valign="middle" width="5px"><?php echo $n ?>.</td>
	  <td align="left" valign="top" width="100px">
			 <img width="<?php echo $lebar; ?>" height="<?php echo $tinggi; ?>" src="../images_news/<?php if($row['gambar_news']!=NULL) { echo $row['gambar_news']; } else {?>no_image_promo2.jpg<?php }?>">
			</td>
	  <td align="left" valign="top" width="400px">
			<?php 
			 echo "<b>".$row['judul_berita']."</b><br><br>".$row['isi_berita']; 
			?>
			</td>
	  <td align="center" valign="middle" width="100px">
			<?php echo $tgl_mulai; ?></font>
		</td>
	  <td align="center" valign="middle" width="95px">
		  <table cellpadding="3px" cellspacing="0" width="100%">
			  <tr>
				  <td align="center" valign="middle"><a href="edit_news.php?id_news=<?php echo $row['brid']; ?>" class="link_kecil">Edit</a></td>
				  <td align="center" valign="middle"><a href="konf_hapus_news.php?id_news=<?php echo $row['brid']; ?>" class="link_kecil">Hapus</a></td>
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
	  <td align="center" valign="middle" colspan="4">Belum ada Barang pada saat ini</td>
	</tr>
	<?php
		}
	?>
</table><br>

 Page: &nbsp;
 <?php
		for($i=1; $i<=$halaman; $i++)
		{ $newoffset=$limit*($i-1);
			if($offset!=$newoffset)
			{ echo "<a href=\"".$_SERVER['PHP_SELF']."?offset=$newoffset&halamanke=$i\" class=\"num\">$i</a> &nbsp; ";
				}
			else
			{ echo "<b>".$i."</b> &nbsp; ";
				}
		}
 ?>

<table>
  <tr>
	  <td align="center" valign="middle" height="20px"></td>
	</tr>
</table>
<?php
 include "common/footer_admin.php";
?>