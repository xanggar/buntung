<?php
 
	include "../common/config.php";
	
	$ubah="UPDATE harga_poin SET harga_poin='$_POST[harga]'";
	//echo $ubah; exit;
	$ubah2=mysql_query($ubah);
	if($ubah2)
	{
	 ?>
		<script language="javascript">
		 document.location="setting_harga_poin.php";
		</script>
		<?php
	}
	
?>