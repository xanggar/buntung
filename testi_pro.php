<?php
 include "common/top3.php";
?>

<!-- Sub Page Title Starts here-->
<h1><?php echo $NAMA; ?> Account</h1>
<p><?php echo $account; ?></p>
<!-- Sub Page Title End here-->
</div>
</div>
</div>
<div class="clear">&nbsp;</div>
<div class="content cbg">
<div class="container_16 linebg">
<!--left part of text follows here-->
<div class="grid_11 para sepline">
<div class="text">
<!-- Contact Form Start -->

<?php
 if(empty($_POST[pesan]))
	{
	 ?>
		<strong>Testimonial yang Anda isi masih kosong.</strong><br><br>
		<a href="testimonial.php?_page=myaccount">Kembali kehalaman berikutnya</a>
		<?php
	}
	else
	{
	 $masuk=mysql_query("INSERT INTO testimonial (isi_testimonial, username, tanggal_testimonial) VALUES ('".$_POST[pesan]."', '".$USERNAME."', '".$tanggal_update."')");
		if($masuk)
		{
			?>
			<strong>Anda sukses memberikan testimonial ke <?php echo $namaweb; ?>. Terima kasih</strong><br><br>
			<a href="myaccount.php?_page=myaccount">Kembali kehalaman Account</a>
			<?php
		}
	}
?>


<br /><br /><br /><Br /><br /><br /><Br />
<!-- Contact Form end -->
</div>
</div>
            <!--End of the Left part text  -->
<!--Right part of text follows here-->
<?php
 include "common/right_account.php";
?>
<!--End of the Right part text  -->
      </div>
</div>

<?php
 include "common/bottom.php";
?>
