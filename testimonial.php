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
<h2>Input Testimonial</h2>
<p><strong>Silahkan berikan Testimonial Anda di <?php echo $namaweb; ?></strong></p>
<br>
<!-- Contact Form Start -->
<form action="testi_pro.php?_page=myaccount" method="post">
<table cellpadding="7px" cellspacing="0" width="90%">
 <tr>
		<td align="left" valign="top">
  	   <script language="JavaScript">
        <!-- Original:  Ronnie T. Moore ; web Site:  The JavaScript Source -->
        <!-- Dynamic 'fix' by: Nannette Thacker ; web Site: http://www.shiningstar.net -->
        <!-- This script and many more are available free online at The JavaScript Source!! http://javascript.internet.com -->
        function textCounter(field, countfield, maxlimit)
        { if (field.value.length>maxlimit) // if too long...trim it!
           field.value = field.value.substring(0, maxlimit);
          else // otherwise, update 'characters left' counter
           countfield.value = maxlimit - field.value.length;
          }
       </script>
		   <textarea name="pesan" rows="7" cols="50" wrap="physical" onKeyDown="textCounter(this.form.pesan, this.form.counter, 500);" onKeyUp="textCounter(this.form.pesan, this.form.counter, 500)"></textarea>
					<br>
					<input type="text" name="counter" id="counter" readonly size="5" maxlength="3" value="500"> karakter
		</td>
	</tr>
 <tr>
		<td align="left" valign="top">
		&nbsp;
		</td>
	</tr>
 <tr>
		<td align="left" valign="top">
		<input type="submit" value="Submit" style="cursor:pointer">
		</td>
	</tr>
</table>
</form>

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
