<!--Right part of text follows here-->
<div class="grid_5">
<div class="text">
<h2 class="blogimage">All Categories</h2>
<ul class="commonlist">
<li>


<?php
$menu=mysql_query("SELECT * FROM kategori ORDER BY deskripsi");
$menu2=mysql_num_rows($menu);
while($menu3=mysql_fetch_array($menu))
{
	$jum=mysql_query("SELECT * FROM product WHERE id_kategori='".$menu3[id_kategori]."' AND (status='0' OR status='1') AND tanggal<='$tanggaltanggal'");
	$jum2=mysql_num_rows($jum);
?>
<a <?php if($_GET[ida]==$menu3[id_kategori]) { ?> class="abc" <?php } ?> href="kategori_barang.php?ida=<?php echo $menu3[id_kategori]; ?>"><?php echo $a."".$menu3[deskripsi]." ($jum2)"; ?></a><br />
<?php
}
?>
<br />
<form method="get" action="cari.php" name="cari">
 <input value="Search Product" onFocus="cari.kunci.value=''" type="text" size="25" name="kunci" /> &nbsp;<input name="submit" class="" type="image" src="images/cari.png" value="Search"/>
</form>

</li>


<li>
<img src="images/iklan1.png" align="absmiddle" /><br />
<img src="images/iklan2.png" align="absmiddle" /><br />
<img src="images/iklan3.png" align="absmiddle" /><br /><br />
</li>
</ul>
</div>

<div class="text">
<h2 class="testimonialimg">Testimonials</h2>
<div class="testimonial">
<?php
 $testi=mysql_fetch_array(mysql_query("SELECT * FROM testimonial ORDER BY tanggal_testimonial	DESC LIMIT 1"));
?>
<blockquote>
<p><?php echo $testi[isi_testimonial]; ?> <br /><br />
<cite class="leftalign"><?php echo $testi[username]; ?><br />
 </cite> </p></blockquote>
</div>
</div>
<!--End of the Right part text  -->
