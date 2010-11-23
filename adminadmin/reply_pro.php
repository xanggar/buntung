<?php
include "common/top_admin.php";

$bales=mysql_fetch_array(mysql_query("SELECT * FROM contact_us WHERE id_contact='".$_GET[id]."'"));
$emailnet=mysql_fetch_array(mysql_query("SELECT * FROM email LIMIT 1"));

$perihal="RE: $bales[judul]";
$header="From: Administrator $namaweb | $emailnet[email] ";
$main_content.="$_POST[isi]\n\n";
$signature="\n\n--\n\n";
$mailcontent=$main_content.$signature;
$tujuan="$bales[email]";
//echo $tujuan; exit;
$status=mail($tujuan, $perihal, $mailcontent, $header);

if($status)
{
 $sent=mysql_query("UPDATE contact_us SET status='1' WHERE id_contact='".$_GET[id]."'");
 if($sent)
	{
	 echo "<font color='#ff0000'><b>Sukses mengirim balasan Contact Us dari User</b></font> &nbsp;
								<br><br><br><a href='contact_us.php'>Halaman Contact Us</a>";
	}
}
?>
