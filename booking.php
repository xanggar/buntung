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

<h2>Step Booking</h2>
</div>
<div class="text">

<?php
$jumlah_booking=mysql_num_rows(mysql_query("SELECT * FROM booking WHERE id_product='".$_GET[id]."' AND (status='0' OR status='1')"));
if($jumlah_booking<4)
{
$barang=mysql_fetch_array(mysql_query("SELECT * FROM product WHERE id_product='".$_GET[id]."'"));
$cek_poin=mysql_fetch_array(mysql_query("SELECT * FROM ms_poin WHERE username='".$USERNAME."'"));
?>


<form method="post" action="booking_pro.php?id=<?php echo $_GET[id]; ?>&token=<?php echo $_GET[token]; ?>&harga=<?php echo $_GET[harga_baru]; ?>">
 <table width="70%" cellpadding="7px" cellspacing="0">
	 <tr>
		 <td align="left" valign="middle" width="33%"><strong>Nama Barang</strong></td>
		 <td align="left" valign="middle" width="2%">:</td>
		 <td align="left" valign="middle" width="65%"><?php echo $barang[nama_barang]; ?></td>
		</tr>
	 <tr>
		 <td align="left" valign="middle" width="33%"><strong>Special Price</strong></td>
		 <td align="left" valign="middle" width="2%">:</td>
		 <td align="left" valign="middle" width="65%">
		 <?php 
			 $matauang=mysql_fetch_array(mysql_query("SELECT * FROM matauang WHERE idmatauang='".$barang[idmatauang]."'"));
			?>
		 <?php echo $matauang[matauang]; ?> <?php echo number_format($_GET[harga_baru], 0, ',', '.'); ?>,-
			</td>
		</tr>
	 <tr>
		 <td align="left" valign="middle" width="33%"><strong>Token Booking</strong></td>
		 <td align="left" valign="middle" width="2%">:</td>
		 <td align="left" valign="middle" width="65%"><?php echo $_GET[token]; ?></td>
		</tr>
		<?php 
		 $user=mysql_fetch_array(mysql_query("SELECT * FROM member WHERE username='".$USERNAME."'"));
		 $tujuan=mysql_fetch_array(mysql_query("SELECT * FROM tujuan WHERE id_tujuan='".$user[id_tujuan]."'"));
		?>
	 <tr>
		 <td align="left" valign="middle" width="33%"><strong>Username</strong></td>
		 <td align="left" valign="middle" width="2%">:</td>
		 <td align="left" valign="middle" width="65%"><?php echo $USERNAME; ?></td>
		</tr>
	 <tr>
		 <td align="left" valign="middle" width="33%"><strong>Nama</strong></td>
		 <td align="left" valign="middle" width="2%">:</td>
		 <td align="left" valign="middle" width="65%"><?php echo $user[nama]; ?></td>
		</tr>
	 <tr>
		 <td align="left" valign="middle" width="33%"><strong>Email</strong></td>
		 <td align="left" valign="middle" width="2%">:</td>
		 <td align="left" valign="middle" width="65%"><?php echo $user[email]; ?></td>
		</tr>
	 <tr>
		 <td align="left" valign="middle" width="33%"><strong>Alamat</strong></td>
		 <td align="left" valign="middle" width="2%">:</td>
		 <td align="left" valign="middle" width="65%"><?php echo $user[alamat]; ?></td>
		</tr>
	 <tr>
		 <td align="left" valign="middle" width="33%"><strong>Kota</strong></td>
		 <td align="left" valign="middle" width="2%">:</td>
		 <td align="left" valign="middle" width="65%"><?php echo $tujuan[tujuan]; ?></td>
		</tr>
	 <tr>
		 <td align="left" valign="middle">&nbsp;</td>
		</tr>
	 <tr>
		 <td align="left" valign="middle" width="33%">&nbsp;</td>
		 <td align="left" valign="middle" width="2%">&nbsp;</td>
		 <td align="left" valign="middle" width="65%">
			 <input type="submit" value="Submit Booking">
			</td>
		</tr>
	</table>
</form>
<?php
}
else
{
?>
 <p>Sudah ada 3 orang yang sudah melakukan booking untuk product ini. Maaf pada saat ini Anda sudah tidak bisa melakukan booking untuk produk ini</p>
 <br />
	<p><a href="index.php">Kembali ke halaman utama</a></p>

<?php
}
?>

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
