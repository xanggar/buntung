<?php
 include "../common/config.php";
	
	//echo $_POST[how]; exit;
	$ket=$_POST[how];
	$ket=str_replace('"', '', $ket);
	$ket=str_replace("'", "", $ket);
	$ket=str_replace("\r\n", "<br>", $ket);
	
	
	$ubah=mysql_query("UPDATE welcome SET ket='".$ket."' WHERE id='1'");
	if($ubah)
	{
	 ?>
		<script language="javascript">
		 document.location="welcome.php";
		</script>
		<?php
	}
	
?>