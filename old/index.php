<?php
 include "common/top.php";
?>

<div class="clear">&nbsp;</div>
<div class="content cbg">
<div class="container_16 linebg">
<!--Left part of text follows here-->
<div class="grid_11 para sepline">
<div class="text">
<h2>Welcome to <span>Buntung.com</span></h2>
<p>
<?php
$about=mysql_fetch_array(mysql_query("SELECT * FROM welcome WHERE id='1'"));
$aaa=$about[ket];
$bbb=explode(" ", $aaa);
$ccc=describe($bbb, 70, 0);
echo $ccc."... "; 
?>
</p>
<p><a href="live/welcome.php" class="link_biru">Read More</a></p>
<br />

<h2>Current auctions</h2>

<table cellpadding="5px" cellspacing="0" border="0" width="100%">
 <tr>
		<?php
	 $abc="SELECT * FROM product WHERE (status='0' OR status='1') AND tanggal<='$tanggaltanggal' ORDER BY product.tanggal_masuk DESC";
	 $res=mysql_query($abc);
	 $jumlah=mysql_num_rows($res);
	 $limit=8;
	 $offset = val_get('offset', 'int');
	 if (empty($offset))
	 { $offset = 0;
		 }
	 $halaman=intval($jumlah/$limit);
	 if($jumlah%$limit)
	 { $halaman++;
		 }
	 $abc2="SELECT * FROM product WHERE (status='0' OR status='1') AND tanggal<='$tanggaltanggal' ORDER BY product.tanggal_masuk DESC LIMIT $offset, $limit";
	 $res2=mysql_query($abc2);
	 $jumlah2=mysql_num_rows($res2);
	 if($jumlah2>0)
	 { 
		$n=$offset+1;
		$col=1;
		while($beo=mysql_fetch_array ($res2))
		{
		if ($beo[gambar_barang]!="")
		{ 
			$imgSize=getimagesize("images_product/$beo[gambar_barang]");
			if ($imgSize[0]>100) //lebar
			{ 
				$lebar=100;
				$tinggi=$imgSize[1]*(1-(($imgSize[0]-$lebar)/$imgSize[0]));
				if ($tinggi>100)
				{ 
					$tinggi=100;
					$lebar=$imgSize[0]*(1-(($imgSize[1]-$tinggi)/$imgSize[1]));
				}
			}
			else if ($imgSize[1]>75) //tinggi
			{ 
				$tinggi=75;
				$lebar=$imgSize[0]*(1-(($imgSize[1]-$tinggi)/$imgSize[1]));
				if ($lebar>75)
				{ 
					$lebar=75;
					$tinggi=$imgSize[1]*(1-(($imgSize[0]-$lebar)/$imgSize[0]));
				}
			}
		else
		{ 
			$tinggi=$imgSize[1];
			$lebar=$imgSize[0];
			}
		}
		?>
	 <!-- Barang Kiri -->
	 <td width="49%" align="center" valign="top">
		 <table width="100%" height="150px" cellpadding="5px" cellspacing="0" style="border:1px solid #acbccc">
			 <tr>
				 <td align="left" valign="top" style="padding-left:5px">
				  <a href="detail_barang.php?id=<?php echo $beo[id_product]; ?>&ida=<?php echo $beo[id_kategori]; ?>" class="link_biru"><b><?php echo $beo[nama_barang]; ?></b></a>
				 </td>
				</tr>
			 <tr>
				 <td align="left" valign="top">
						<div class="servicebox"> <img src="images_product/<?php echo $beo[gambar_barang]; ?>" width="<?php echo $lebar; ?>" height="<?php echo $tinggi; ?>" align="top" class="leftalign" style="border:1px solid #acbccc; padding:2px" />
						<div class="rightpara2">
						<p><b>Your Current Price:</b></p>
						<p>
						<?php
						$aa=rand("6454", "8965");
						$aaa=$beo[id_kategori]."".$lebar.$aa;
						if(empty($USERNAME))
						{
						?>
						<img src="images/tanya.png" align="top" onclick="window.alert('Anda harus login terlebih dahulu')" />
						<?php
						}
						else
						{
						?>
						<img src="images/tanya.png" align="top" onclick="document.location='cekcek.php?sesolui=<?php echo $aaa; ?>&id=<?php echo $beo[id_product]; ?>'" />
						<?php
						}
						?>
						</p>
						<?php
						 $mata=mysql_fetch_array(mysql_query("SELECT * FROM matauang WHERE idmatauang='".$beo[idmatauang]."'"));
						?>
						<p>Value: <?php echo $mata[matauang]." ".number_format($beo[harga], 0, ',', '.').",-"; ?></p>
						<p><a href="detail_barang.php?id=<?php echo $beo[id_product]; ?>&ida=<?php echo $beo[id_kategori]; ?>" class="link_biru">More Details</a></p>
						</div>
						</div>
					</td>
				</tr>
			</table>
		</td>
	 <!-- Batas Barang Kiri -->
		
		<td width="2%">&nbsp;</td> <!-- Batas -->
		
		<?php
				if ($col==1)
				{ 
					$col++;
				}
				else  
				{ 
					echo "</tr><tr>";
					$col=1;
				}
			}
		}
		?>
	</tr>
	<tr>
	 <td colspan="3">&nbsp;</td>
	</tr>
	<tr>
	 <td colspan="3" align="center" valign="middle">
			<?php
					for($i=1; $i<=$halaman; $i++)
					{ $newoffset=$limit*($i-1);
						if($offset!=$newoffset)
						{ echo "<a class='button2 centertalign' href=\"".$_SERVER['PHP_SELF']."?offset=$newoffset&halamanke=$i\" class=\"num\">$i</a> &nbsp; ";
							}
						else
						{ echo "<b>".$i."</b> &nbsp; ";
							}
					}
			?>
		</td>
	</tr>
</table>

</div>
</div>
<!--End of the Left part text  -->

<?php
 include "common/kanan.php";
?>

</div>
</div>
</div>

<?php
 include "common/bottom.php";
?>

