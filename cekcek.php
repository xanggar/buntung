<?php
 include "common/session.php";
	include "common/config.php";
	
	$cek_poin=mysql_fetch_array(mysql_query("SELECT * FROM ms_poin WHERE username='".$USERNAME."'"));
	$cek_kurang=mysql_fetch_array(mysql_query("SELECT nama_barang, id_product, id_kategori, harga, jumlah_poin, jumlah_minimal_koin	, tambah_harga FROM product WHERE id_product='".$_GET[id]."'"));
	
	if($cek_poin[jumlah_poin]<$cek_kurang[jumlah_poin])
	{
	 ?>
		<script language="javascript">
		 document.location="error.php";
		</script>
		<?php
	}
	else
	{
	 $nilai=$cek_poin[jumlah_poin]-$cek_kurang[jumlah_poin];
	 $ubah=mysql_query("UPDATE ms_poin SET jumlah_poin='".$nilai."', tanggal_update='".$tanggal_update."' WHERE username='".$USERNAME."'");
		if($ubah)
		{
		 $nilai2=$cek_kurang[harga]-$cek_kurang[tambah_harga];
		 $ubah2=mysql_query("UPDATE product SET harga_baru='".$nilai2."', tanggal_update='".$tanggal_update."' WHERE id_product='".$_GET[id]."'");
			if($ubah2)
			{
		  $masuk_log=mysql_query("INSERT INTO log (username, tanggal, id_product, ket) VALUES ('".$USERNAME."', '".$tanggal_update."', '".$_GET[id]."', 'SHOW PRICE $cek_kurang[nama_barang] | Jumlah Poin $cek_kurang[jumlah_poin] poin')");
				if($masuk_log)
				{
				 $ketket="VIEW".$_GET[id];
				 $masuk_transaksi=mysql_query("INSERT INTO transaksi (username, jumlah_poin, ket, tanggal_transaksi) VALUES ('".$USERNAME."', '".$cek_kurang[jumlah_poin]."', '".$ketket."', '".$tanggal_update."')");
					if($masuk_transaksi)
					{
					?>
					<script language="javascript">
						document.location="show_price.php?sesolui=<?php echo $_GET[sesolui]; ?>&id=<?php echo $_GET[id]; ?>";
					</script>
					<?php
					}
				}
			}
		}
	}
	
?>