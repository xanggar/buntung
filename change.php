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
<h2>Change Password</h2>
<p><strong>Ini adalah form untuk mengubah Password Account anda di <?php echo $namaweb; ?> </strong></p>
<br>
<!-- Contact Form Start -->
<form action="change_pro.php?_page=myaccount" method="post">
<table cellpadding="7px" cellspacing="0" width="90%">
 <tr>
		<td align="left" valign="top" width="33%">
		 Password Lama
		</td>
		<td align="left" valign="top" width="2%">
		 :
		</td>
		<td align="left" valign="top" width="65%">
		 <input type="password" name="password1" size="25">
		</td>
	</tr>
 <tr>
		<td align="left" valign="top" width="33%">
		 Password Baru
		</td>
		<td align="left" valign="top" width="2%">
		 :
		</td>
		<td align="left" valign="top" width="65%">
		 <input type="password" name="password2" size="25">&nbsp; 5-20 char
		</td>
	</tr>
 <tr>
		<td align="left" valign="top" width="33%">
		 Konfirmasi Password
		</td>
		<td align="left" valign="top" width="2%">
		 :
		</td>
		<td align="left" valign="top" width="65%">
		 <input type="password" name="password3" size="25">
		</td>
	</tr>
 <tr>
		<td align="left" valign="top" colspan="3">&nbsp;
		
		</td>
	</tr>
 <tr>
		<td align="left" valign="top" width="33%">
		 &nbsp;
		</td>
		<td align="left" valign="top" width="2%">
		 &nbsp;
		</td>
		<td align="left" valign="top" width="65%">
		 <input type="submit" name="submit" value="Submit">
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
