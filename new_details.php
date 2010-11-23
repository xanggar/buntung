<?php
 include "common/top2.php";
	
	$berita=mysql_fetch_array(mysql_query("SELECT * FROM berita_ringan WHERE brid='$_GET[id]'"));
	
	list($bb, $mm, $dd)=split ("[- :]", $berita['tgl_berita']);
	$tgl_mulai=$dd."-".$mm."-".$bb;

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
                        <div class="blogbox bordersub">
                              <h2><?php echo $berita[judul_berita]; ?></h2>
                              <span class="postinfo">On <?php echo $tgl_mulai; ?> -  by <a href="index.php"><?php echo $namaweb; ?></a></span><br />
                              <br />
                              <center><img src="images_news/<?php echo $berita[gambar_news]; ?>" alt="" class="borderimg" /></center><br />
                              <p><?php echo $berita[isi_berita]; ?></p>
                        </div>
                        <div class="bottomblog">&nbsp;</div>
                        <br />
                  </div>
                  <!-- Blog Box End -->
                  <div class="text">
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
