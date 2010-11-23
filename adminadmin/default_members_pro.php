<?php
 include "../common/config.php";
	
	$edit=mysql_query("UPDATE default_members SET jml_members='".$_POST[member]."' WHERE id_fm='1'");
	if($edit)
	{
	 header("location:default_members.php");
	}
	
?>