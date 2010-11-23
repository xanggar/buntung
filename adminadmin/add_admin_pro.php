<?php
 include "../common/config.php";
	
	$pass=md5($_POST[password]);
	
	$ubah=mysql_query("INSERT INTO admin (user_id, password) VALUES ('$_POST[username]', '$pass')");
	if($ubah)
	{
	 ?>
		<script language="javascript">
		 document.location="add_admin.php";
		</script>
		<?php
	}
	
?>