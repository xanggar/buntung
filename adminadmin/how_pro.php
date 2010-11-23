<?php
 include "../common/config.php";
	
	$how=$_POST[how];
	$how=str_replace("\r\n", "<br>", $how);
	
	$ubah=mysql_query("UPDATE how SET ket='".$how."'");
	if($ubah)
	{
	 ?>
		<script language="javascript">
		 document.location="how.php";
		</script>
		<?php
	}
	
?>