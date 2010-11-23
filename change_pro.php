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
 $cek=mysql_fetch_array(mysql_query("SELECT username, password FROM member WHERE username='".$USERNAME."' AND password='".$_POST[password1]."'"));
 $aaa=md5($_POST[password1]);

 if(empty($_POST[password1]))
	{
	 ?>
		<strong>Password Lama masih kosong.</strong><br><br>
		<a href="change.php?_page=myaccount">Kembali kehalaman berikutnya</a>
		<?php
	}
 else if($cek[password]==$aaa)
	{
	 ?>
		<strong>Password Lama Anda salah.</strong><br><br>
		<a href="change.php?_page=myaccount">Kembali kehalaman berikutnya</a>
		<?php
	}
 else if(empty($_POST[password2]))
	{
	 ?>
		<strong>Password Baru masih kosong.</strong><br><br>
		<a href="change.php?_page=myaccount">Kembali kehalaman berikutnya</a>
		<?php
	}
 else if(empty($_POST[password3]))
	{
	 ?>
		<strong>Konfirmasi Password masih kosong.</strong><br><br>
		<a href="change.php?_page=myaccount">Kembali kehalaman berikutnya</a>
		<?php
	}
	else if((strlen($_POST[password2])<5) or (strlen($_POST[password2])>20))
	{
	 ?>
		<strong>Password Anda harus 5-20 Char.</strong><br><br>
		<a href="change.php?_page=myaccount">Kembali kehalaman berikutnya</a>
		<?php
	}
	else if($_POST[password2] <> $_POST[password3])
	{
	 ?>
		<strong>Password dan Konfirmasi Password Anda tidak sama.</strong><br><br>
		<a href="change.php?_page=myaccount">Kembali kehalaman berikutnya</a>
		<?php
	}
	else
	{
	 $masuk_pass=md5($_POST[password2]);
		
	 $masuk=mysql_query("UPDATE member SET password='".$masuk_pass."' WHERE username='".$USERNAME."'");
		if($masuk)
		{
			?>
			<script language="javascript">
			 alert("Anda berhasil melakukan perubahan password. Silahkan login kembali.");
				document.location="logout.php";
			</script>
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
