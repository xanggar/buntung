<?php
 include "common/top2.php";
?>

<!-- Sub Page Title Starts here-->
<h1>Login to Account</h1>
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
<h2>Login</h2>
<p><strong>Silahkan Login untuk mengakses account Anda</strong></p>

<!-- Contact Form Start -->
			<form name="login" method="post" action="ceklogin.php" style="margin:'0' '0' '0' '0">
  			<table cellpadding="10px" cellspacing="0" width="400px">
  				<tr>
  					<td align="left" valign="middle" width="23%">Username</td>
  					<td align="left" valign="middle" width="2%">:</td>
  					<td align="left" valign="middle" width="75%">
  						<input name="username" type="text" size="35">
  					</td>
  				</tr>
  				<tr>
  					<td align="left" valign="middle" width="23%">Password</td>
  					<td align="left" valign="middle" width="2%">:</td>
  					<td align="left" valign="middle" width="75%">
  						<input name="password" type="password" size="35">
  					</td>
  				</tr>
  				<tr>
  					<td align="left" valign="middle" width="23%"></td>
  					<td align="left" valign="middle" width="2%"></td>
  					<td align="left" valign="middle" width="75%">
  						<input type="submit" value=" Login " style="cursor:pointer">
								&nbsp; &nbsp;
								<a href="forget_password.php" class="link_biru">Forget Password</a>
  					</td>
  				</tr>
  				<tr>
  					<td align="left" valign="middle" colspan="3">
  					  <font color="#ff0000">
  						  <?php
                if(isset($_GET['err']))
    						  if($_GET['err']==1)
												{
    						    echo "Username atau password Anda salah";
														}
												else if($_GET['err']==2)
												{
												  echo "Username Anda belum diaktifkan";
													}
												else if($_GET['err']==3)
												{
												  echo "Username atau password Anda masih kosong";
													}
  						  ?>
  					  </font>
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
 include "common/right2.php";
?>
<!--End of the Right part text  -->
      </div>
</div>

<?php
 include "common/bottom.php";
?>
