<?php
 include "common/session.php";
	
	$hancur=session_destroy();
	if($hancur)
	{
	 header("location:index.php");
	}
	
?>