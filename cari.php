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
	function highlight($description_result, $key_word)
	{ $start_tag="<span style='color:#ff6601; font-weight:bold'>"; $end_tag="</span>";
			$highlight_result=$start_tag.$key_word.$end_tag;
			return eregi_replace($key_word, $highlight_result, $description_result);
			}


 $kunci=trim($_GET[kunci]);
	$kunci=htmlspecialchars($kunci);
	$kunci=str_replace("mysql_connect'","", $kunci);
	$kunci=str_replace("mysql_query'","", $kunci);
	$kunci=str_replace("mysql_num_rows'","", $kunci);
	$kunci=str_replace("mysql_fetch_array'","", $kunci);
	$kunci=strtolower(strip_tags(trim($kunci)));
	
	
	
 $kat=mysql_fetch_array(mysql_query("SELECT * FROM kategori WHERE id_kategori='".$_GET[ida]."'"));
?>

<h2>Category Product: <span><?php echo $kat[deskripsi]; ?></span></h2>

<?php
	$abc="SELECT * FROM product WHERE (status='0' OR status='1') AND tanggal<='$tanggaltanggal' AND (nama_barang like '%$kunci%' OR keterangan like '%$kunci%') ORDER BY tanggal DESC";
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
	$abc2="SELECT * FROM product WHERE (status='0' OR status='1') AND tanggal<='$tanggaltanggal' AND (nama_barang like '%$kunci%' OR keterangan like '%$kunci%') ORDER BY tanggal DESC LIMIT $offset, $limit";
	$res2=mysql_query($abc2);
	$jumlah2=mysql_num_rows($res2);
	if($jumlah2>0)
	{ 
	$n=$offset+1;
	while($row=mysql_fetch_array($res2))
	{
	
	$tampil=highlight($row[nama_barang], $kunci);
	$tampil2=highlight($row[keterangan], $kunci);
	
	if ($row[gambar_barang]!="")
	{ 
		$imgSize=getimagesize("images_product/$row[gambar_barang]");
		if ($imgSize[0]>220) //lebar
		{ 
			$lebar=220;
			$tinggi=$imgSize[1]*(1-(($imgSize[0]-$lebar)/$imgSize[0]));
			if ($tinggi>220)
			{ 
				$tinggi=220;
				$lebar=$imgSize[0]*(1-(($imgSize[1]-$tinggi)/$imgSize[1]));
			}
		}
		else if ($imgSize[1]>220) //tinggi
		{ 
			$tinggi=220;
			$lebar=$imgSize[0]*(1-(($imgSize[1]-$tinggi)/$imgSize[1]));
			if ($lebar>220)
			{ 
				$lebar=220;
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

<div class="portfolioitem bordersub">
<div class="details ">
<div class="corner logocorner"></div>
<h3><a href="#"><?php echo $tampil; ?></a></h3>
<p>
<?php
$aaa=$tampil2;
$bbb=explode(" ", $aaa);
$ccc=describe($bbb, 50, 0);
echo $ccc."... "; 
?>
</p>
</div>
<div class="preview "> 
<img src="images_product/<?php echo $row[gambar_barang]; ?>" width="<?php echo $lebar; ?>" height="<?php echo $tinggi; ?>" class="borderimg" alt="Screenshot Name" /> <br />
<br />
<a href="detail_barang.php?id=<?php echo $row[id_product]; ?>&ida=<?php echo $row[id_kategori]; ?>" class="button">view details</a> </div>

</div>
<?php
 }
	}	
	else
	{
		echo "<br><br>";
	 echo "<strong><em>Belum Ada Barang untuk kategori ini.</em></strong>";
		echo "<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>";
	}
?>


<?php
		for($i=1; $i<=$halaman; $i++)
		{ $newoffset=$limit*($i-1);
			if($offset!=$newoffset)
			{ echo "<a class='button2 centertalign' href=\"".$_SERVER['PHP_SELF']."?kunci=$kunci&offset=$newoffset&halamanke=$i\" class=\"num\">$i</a> &nbsp; ";
				}
			else
			{ echo "<b>".$i."</b> &nbsp; ";
				}
		}
?>

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

