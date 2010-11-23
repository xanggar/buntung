<?php
 include "../common/config.php";
	
	
	$ubah=mysql_query("DELETE FROM admin WHERE idid='$_GET[id]'");
	if($ubah)
	{
	 ?>
		<script language="javascript">
		 document.location="add_admin.php";
		</script>
		<?php
	}
	
?>