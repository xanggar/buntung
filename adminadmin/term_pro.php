<?php
 include "../common/config.php";
	
	//echo $_POST[how]; exit;
	$ket=$_POST[how];
	$ket=str_replace('"', '', $ket);
	$ket=str_replace("'", "", $ket);
	$ket=str_replace("\r\n", "<br>", $ket);
	
	
	$ubah=mysql_query("UPDATE term SET ket='".$ket."'");
	if($ubah)
	{
	 ?>
		<script language="javascript">
		 document.location="term.php";
		</script>
		<?php
	}
	
?>