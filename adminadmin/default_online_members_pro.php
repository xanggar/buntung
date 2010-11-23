<?php
 include "../common/config.php";
	
	$edit=mysql_query("UPDATE default_ol_members SET jml_ol_members ='".$_POST[member]."' WHERE id_om='1'");
	if($edit)
	{
	 header("location:default_online_members.php");
	}
	
?>