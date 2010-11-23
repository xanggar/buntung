<?php
 include "../common/config.php";
	
	$ubah=mysql_query("UPDATE testimonial SET status='1' WHERE id_testimonial='$_GET[id]'");
	if($ubah)
	{
	 ?>
		<script language="javascript">
		 document.location="testi.php";
		</script>
		<?php
	}
	
	
?>