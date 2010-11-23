<?php
	$detail=mysql_fetch_array(mysql_query("SELECT * FROM detail_contact WHERE id_detail_contact='1'"));
?>

<div class="grid_5">
<div class="text">
<h2>Location</h2>
<p><?php echo $detail[alamat]; ?></p>
</div>
<div class="text">
<h2>Instant Messangers </h2>
<p>Gmail : <?php echo $detail[gmail]; ?><br/>
Yahoo : <?php echo $detail[yahoo]; ?><br/>
MSN : <?php echo $detail[msn]; ?></p>
</div>
<div class="text">
<h2>Phone</h2>
<p>OFFICE : <?php echo $detail[telp_office]; ?><br/>
FAX: <?php echo $detail[fax]; ?><br/>
MOBILE: <?php echo $detail[mobile]; ?></p>
</div>
</div>
