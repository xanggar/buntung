<?php
 include "../common/config.php";
	
	$ubah=mysql_query("UPDATE detail_contact SET alamat='".$_POST[alamat]."', gmail='".$_POST[gmail]."', yahoo='".$_POST[yahoo]."', msn='".$_POST[msn]."', telp_office='".$_POST[office]."', fax='".$_POST[fax]."', mobile='".$_POST[mobile]."' WHERE id_detail_contact='1'");
	if($ubah)
	{
	 ?>
		<script language="javascript">
		 document.location="detail_contact.php";
		</script>
		<?php
	}
	
?>