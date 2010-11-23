<?php
 include "common/top2.php";
?>

      <!-- Sub Page Title Starts here-->
                  <h1>Contact Us</h1>
                  <p>Lorem ipsum dolorsit amet, consectetur adipiscing elit Quisque rhoncus Duis rhoncus. </p>
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

                        <br />
<!-- Contact Form Start -->

<?php
$valid_mail="^([._a-z0-9-]+[._a-z0-9-]*)@(([a-z0-9-]+\.)*([a-z0-9-]+)(\.[a-z]{2,3}))$";

if(empty($_POST[nama]))
{
	echo "<b>Your Name must be fill</b><br><br><a href='javascript:history.back(-1)' class='link_biru'>Back to previous page</a><br><br><br><br><br><br><br><br><br><br><br><br>";
}
else if(empty($_POST[email]))
{
	echo "<b>E-mail Address must be fill</b><br><br><a href='javascript:history.back(-1)' class='link_biru'>Back to previous page</a><br><br><br><br><br><br><br><br><br><br><br><br>";
}
else if (!eregi($valid_mail, $_POST[email]))
{
	echo "<b>E-mail Address not valid</b><br><br><a href='javascript:history.back(-1)' class='link_biru'>Back to previous page</a><br><br><br><br><br><br><br><br><br><br><br><br>";
}
else if(empty($_POST[isi]))
{
	echo "<b>Your Message must be fill</b><br><br><a href='javascript:history.back(-1)' class='link_biru'>Back to previous page</a><br><br><br><br><br><br><br><br><br><br><br><br>";
}
else
{
	include "common/config.php";
	
	$nama = val_post('nama', 'text');
	$email = val_post('email', 'text');
	$judul = val_post('judul', 'text');
	$isi = val_post('isi', 'text');
	
	$q="INSERT INTO contact_us (nama, email, judul, isi, tanggal_masuk) VALUES ('".$nama."', '".$email."', '".$judul."', '".$isi."', '".$date."')";
	$q2=mysql_query($q);
	if($q2)
	{
		echo "<font color='#834b15'><b>Your Message have been sent to our Administrator. Our Staff will verificated your message and would sent back our answer as soon as possible.</b></font><br><br><a href='index.php' class='link_biru'>Back to Home Page</a><br><br><br><br><br><br><br><br><br><br><br><br>";
	}
}
?>

<!-- Contact Form end -->
                  </div>
            </div>
            <!--End of the Left part text  -->
<!--Right part of text follows here-->
<?php
 include "common/right_contact.php";
?>
<!--End of the Right part text  -->
      </div>
</div>

<?php
 include "common/bottom.php";
?>
