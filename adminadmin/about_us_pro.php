<?php
 include "../common/config.php";
	
	$email=trim($_POST[email]);
	
	$ubah=mysql_query("UPDATE about_us SET about_us='".$_POST[about]."', more_about='".$_POST[more]."', quote='".$_POST[blockquote]."'");
	if($ubah)
	{
	 ?>
		<script language="javascript">
		 document.location="about_us.php";
		</script>
		<?php
	}
	
?>