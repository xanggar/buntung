<?php
 include "../common/config.php";
	
	$ee=mysql_fetch_array(mysql_query("SELECT * FROM product WHERE id_product='$_GET[id]'"));
	
	$hapus=unlink("../images_product/$ee[gambar_barang3]");
	if($hapus)
	{
	 $qu=mysql_query("UPDATE product SET gambar_barang3='' WHERE id_product='$_GET[id]'");
		if($qu)
		{
		 ?>
			 <script language="javascript">
				 document.location="lihat_barang.php";
				</script>
			<?php
		}
	}
	
	
?>