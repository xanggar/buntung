<?php
 include "../common/config.php";
	
	$email=trim($_POST[email]);
	
	$ubah=mysql_query("UPDATE email SET email='".$email."'");
	if($ubah)
	{
	 ?>
		<script language="javascript">
		 document.location="setting_email.php";
		</script>
		<?php
	}
	
?>