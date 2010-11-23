<?php
 include "common/top2.php";
?>

      <!-- Sub Page Title Starts here-->
                  <h1>Instant Buy</h1>
                  <p>Lorem ipsum dolorsit amet, consectetur adipiscing elit Quisque rhoncus Duis rhoncus. </p>                  <!-- Sub Page Title End here-->
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
$barang=mysql_fetch_array(mysql_query("SELECT * FROM product WHERE id_product='".$_GET[id]."'"));
$cek_poin=mysql_fetch_array(mysql_query("SELECT * FROM ms_poin WHERE username='".$USERNAME."'"));
?>

<h2>Intant Buy <?php echo $barang[nama_barang]; ?></h2>
</div>
<div class="text">

<p>Terima kasih sudah bertransaksi di <?php echo $namaweb; ?>. Barang yang Anda beli, akan segera kami kirimkan ke Alamat Anda.</p>

<p><strong>Token Pembelian: <?php echo $_GET[token]; ?></strong></p>

<p>* Tolong disimpan Token Pembelian diatas sebagai kode pembelian yang akan digunakan untuk pengiriman barang.</p>

</div>

<br /><br /><br />
</div>
            <!--End of the Left part text  -->
<!--Right part of text follows here-->
<?php
 include "common/right2.php";
?>
<!--End of the Right part text  -->
      </div>
</div>

<?php
 include "common/bottom.php";
?>
