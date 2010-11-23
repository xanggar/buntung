<?php
 include "common/top2.php";
?>

      <!-- Sub Page Title Starts here-->
                  <h1>Berita Buntung</h1>
                  <p><?php echo $blog; ?></p>
                  <!-- Sub Page Title End here-->
            </div>
												
<?php
 include "common/search.php";
?>

      </div>
</div>
<div class="clear">&nbsp;</div>
<div class="content cbg">
      <div class="container_16 linebg">
            <!--left part of text follows here-->
            <div class="grid_11 para sepline">
                  <div class="text">
																		
	<?php
	 $abc="SELECT * FROM berita_ringan ORDER BY tgl_berita DESC";
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
			{ $imgSize=getimagesize("images_news/$row[gambar_news]");
				if ($imgSize[0]>250) //lebar
				{ $lebar=250;
					$tinggi=$imgSize[1]*(1-(($imgSize[0]-$lebar)/$imgSize[0]));
					if ($tinggi>250)
					{ $tinggi=250;
					$lebar=$imgSize[0]*(1-(($imgSize[1]-$tinggi)/$imgSize[1]));
					}
					}
				else if ($imgSize[1]>250) //tinggi
				{ $tinggi=250;
					$lebar=$imgSize[0]*(1-(($imgSize[1]-$tinggi)/$imgSize[1]));
					if ($lebar>250)
					{ $lebar=250;
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
				
			$berita=$row[isi_berita];
			$aabbcc=explode(" ", $berita);
			$_bvcxz=describe($aabbcc, 20, 0);
		?>
																		
<div class="blogbox bordersub">
			 <img class="borderimg leftalign" width="<?php echo $lebar; ?>" height="<?php echo $tinggi; ?>" src="images_news/<?php if($row['gambar_news']!=NULL) { echo $row['gambar_news']; } else {?>no_image_promo2.jpg<?php }?>">
						<h2><?php echo $row['judul_berita']; ?></h2>
						<span class="postinfo">On <?php echo $tgl_mulai; ?> -  by <a href="index.php"><?php echo $namaweb; ?></a></span><br />
						<p><?php echo $_bvcxz; ?></p>
</div>
<div class="bottomblog"><a href="new_details.php?_page=news&id=<?php echo $row[brid]; ?>" class="button rightalign">continue reading</a></div>
<br />

                  
	<?php
		$n++;
		}
	}
?>

<center>
<?php
		for($i=1; $i<=$halaman; $i++)
		{ $newoffset=$limit*($i-1);
			if($offset!=$newoffset)
			{ echo "<a class='button2 centertalign' href=\"".$_SERVER['PHP_SELF']."?_page=news&offset=$newoffset&halamanke=$i\" class=\"num\">$i</a> &nbsp; ";
				}
			else
			{ echo "<b>".$i."</b> &nbsp; ";
				}
		}
?>
</center>
																		</div>
            </div>
            <!--End of the Left part text  -->
<!--Right part of text follows here-->
<?php
 include "common/right.php";
?>
<!--End of the Right part text  -->
      </div>
</div>

<?php
 include "common/bottom.php";
?>
