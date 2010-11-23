<?php
 include "common/top_product.php";
?>



<div class="clear">&nbsp;</div>
<div class="content cbg">
<div class="container_16 linebg">
<!--Left part of text follows here-->
<div class="grid_11 para sepline">
<div class="text">

<?php
 $ambil=mysql_fetch_array(mysql_query("SELECT * FROM product WHERE id_product='$_GET[id]'"));
	
	if ($ambil[gambar_barang]!="")
	{ 
		$imgSize=getimagesize("images_product/$ambil[gambar_barang]");
		if ($imgSize[0]>350) //lebar
		{ 
			$lebar=350;
			$tinggi=$imgSize[1]*(1-(($imgSize[0]-$lebar)/$imgSize[0]));
			if ($tinggi>350)
			{ 
				$tinggi=350;
				$lebar=$imgSize[0]*(1-(($imgSize[1]-$tinggi)/$imgSize[1]));
			}
		}
		else if ($imgSize[1]>350) //tinggi
		{ 
			$tinggi=350;
			$lebar=$imgSize[0]*(1-(($imgSize[1]-$tinggi)/$imgSize[1]));
			if ($lebar>350)
			{ 
				$lebar=350;
				$tinggi=$imgSize[1]*(1-(($imgSize[0]-$lebar)/$imgSize[0]));
			}
		}
	else
	{ 
		$tinggi=$imgSize[1];
		$lebar=$imgSize[0];
		}
	}
	
	if ($ambil[gambar_barang2]!="")
	{ 
		$imgSize2=getimagesize("images_product/$ambil[gambar_barang2]");
		if ($imgSize2[0]>70) //lebar
		{ 
			$lebar2=70;
			$tinggi2=$imgSize2[1]*(1-(($imgSize2[0]-$lebar2)/$imgSize2[0]));
			if ($tinggi2>70)
			{ 
				$tinggi2=70;
				$lebar2=$imgSize2[0]*(1-(($imgSize2[1]-$tinggi2)/$imgSize2[1]));
			}
		}
		else if ($imgSize2[1]>70) //tinggi
		{ 
			$tinggi2=70;
			$lebar2=$imgSize2[0]*(1-(($imgSize2[1]-$tinggi2)/$imgSize2[1]));
			if ($lebar2>70)
			{ 
				$lebar2=70;
				$tinggi2=$imgSize2[1]*(1-(($imgSize2[0]-$lebar2)/$imgSize2[0]));
			}
		}
	else
	{ 
		$tinggi2=$imgSize2[1];
		$lebar2=$imgSize2[0];
		}
	}

	if ($ambil[gambar_barang3]!="")
	{ 
		$imgSize3=getimagesize("images_product/$ambil[gambar_barang3]");
		if ($imgSize3[0]>70) //lebar
		{ 
			$lebar3=70;
			$tinggi3=$imgSize3[1]*(1-(($imgSize3[0]-$lebar3)/$imgSize3[0]));
			if ($tinggi3>70)
			{ 
				$tinggi3=70;
				$lebar3=$imgSize3[0]*(1-(($imgSize3[1]-$tinggi3)/$imgSize3[1]));
			}
		}
		else if ($imgSize3[1]>70) //tinggi
		{ 
			$tinggi3=70;
			$lebar3=$imgSize3[0]*(1-(($imgSize3[1]-$tinggi3)/$imgSize3[1]));
			if ($lebar3>70)
			{ 
				$lebar3=70;
				$tinggi3=$imgSize3[1]*(1-(($imgSize3[0]-$lebar3)/$imgSize3[0]));
			}
		}
	else
	{ 
		$tinggi3=$imgSize3[1];
		$lebar3=$imgSize3[0];
		}
	}

?>

<table cellpadding="5px" cellspacing="0" border="0" width="100%">
	<tr>
	 <td align="left" valign="middle" class="judul_barang">
		 <big><strong><?php echo $ambil[nama_barang]; ?></strong></big>
		</td>
	</tr>
	<tr>
	 <td align="center" valign="middle">&nbsp;
		 
		</td>
	</tr>
 <tr>
	 <td width="100%" align="center" valign="top">
		 <table cellpadding="0" cellspacing="0" border="0" width="100%" height="100%">
			 <tr>
				 <td width="70%" align="center" valign="middle">
		    <img style="border:1px solid #acbccc; padding:5px" width="<?php echo $lebar; ?>" height="<?php echo $tinggi; ?>" src="images_product/<?php echo $ambil[gambar_barang]; ?>" />
					</td>
					<?php
					if(!empty($ambil[gambar_barang2])&&!empty($ambil[gambar_barang3]))
					{
					?>
				 <td width="15%" align="left" valign="middle">
						<a href="images_product/<?php echo $ambil[gambar_barang2]; ?>" class="highslide" onclick="return hs.expand(this)">
       <img style="border:1px solid #acbccc; padding:1px" width="<?php echo $lebar2; ?>" height="<?php echo $tinggi2; ?>" src="images_product/<?php echo $ambil[gambar_barang2]; ?>" />						
						</a>
					</td>
				 <td width="15%" align="left" valign="middle">
						<a href="images_product/<?php echo $ambil[gambar_barang3]; ?>" class="highslide" onclick="return hs.expand(this)">
       <img style="border:1px solid #acbccc; padding:1px" width="<?php echo $lebar3; ?>" height="<?php echo $tinggi3; ?>" src="images_product/<?php echo $ambil[gambar_barang3]; ?>" />						
						</a>
					</td>
					<?php
					}
					else if(!empty($ambil[gambar_barang2])&&empty($ambil[gambar_barang3]))
					{
					?>
				 <td width="15%" align="left" valign="middle">
						<a href="images_product/<?php echo $ambil[gambar_barang2]; ?>" class="highslide" onclick="return hs.expand(this)">
       <img style="border:1px solid #acbccc; padding:1px" width="<?php echo $lebar2; ?>" height="<?php echo $tinggi2; ?>" src="images_product/<?php echo $ambil[gambar_barang2]; ?>" />						
						</a>
					</td>
					<?php
					}
					else if(empty($ambil[gambar_barang2])&&!empty($ambil[gambar_barang3]))
					{
					?>
				 <td width="15%" align="left" valign="middle">
						<a href="images_product/<?php echo $ambil[gambar_barang3]; ?>" class="highslide" onclick="return hs.expand(this)">
       <img style="border:1px solid #acbccc; padding:1px" width="<?php echo $lebar3; ?>" height="<?php echo $tinggi3; ?>" src="images_product/<?php echo $ambil[gambar_barang3]; ?>" />						
						</a>
					</td>
					<?php
					}
					?>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
	 <td align="center" valign="middle">&nbsp;
		 
		</td>
	</tr>
	<?php
		$aa=rand("6454", "8965");
		$aaa=$beo[id_kategori]."".$lebar.$aa;
	?>
	<tr>
	 <td align="center" valign="middle">
			<?php
			if(empty($USERNAME))
			{
			?>
			<img src="images/show_price.png" align="top" onclick="window.alert('Anda harus login terlebih dahulu')" />
			<?php
			}
			else
			{
				?>
				<img style="cursor:pointer" src="images/show_price.png" align="top" onclick="document.location='cekcek.php?sesolui=<?php echo $aaa; ?>&id=<?php echo $_GET[id]; ?>'" />
				<?php
			}
			?>
		</td>
	</tr>
	<tr>
	 <td style="border-bottom:1px solid #acbccc" align="center" valign="middle">&nbsp;
		
		</td>
	</tr>
	<tr>
	 <td align="center" valign="middle">&nbsp;
		 
		</td>
	</tr>
	<tr>
	 <td align="left" valign="middle">
		 <b>The longest-lasting Mac notebook battery ever.</b>
		 <?php echo $ambil[keterangan]; ?>
		</td>
	</tr>
</table>
<br /><br /><br /><br /><br /><br /><br /><br />
</div>
</div>
<!--End of the Left part text  -->

<?php
 include "common/right.php";
?>

</div>
</div>
</div>

<?php
 include "common/bottom.php";
?>

