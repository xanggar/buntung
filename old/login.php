<?php
 include "common/top.php";
?>


<table width="851px" cellpadding="0" cellspacing="0" style="background-color:#ffffff" border="0"> 
 <tr><td height="50px"></td></tr>
 <tr>
	 <td align="center" valign="middle">
		 <form style="margin:0 0 0 0" action="ceklogin.php" method="post">
			 <table style="background-image:url(images/bg_login.jpg)" border="0" cellpadding="7px" cellspacing="0" width="300px" height="186px">
				 <tr>
					 <td align="left" valign="top" class="login">Login</td>
					</tr>
					<tr>
					 <td width="120px" align="left" valign="top" class="login2">Username</td>
					 <td width="2px" align="left" valign="top" class="login2">:</td>
					 <td width="178px" align="left" valign="top" class="login2"><input name="kode" type="text" size="21" style="font-family:tahoma, verdana, arial; font-size:9pt"></td>
					</tr>
					<tr>
					 <td width="110px" align="left" valign="top" class="login2">Password</td>
					 <td width="2px" align="left" valign="top" class="login2">:</td>
					 <td width="188px" align="left" valign="top" class="login2"><input name="password" type="password" size="21" style="font-family:tahoma, verdana, arial; font-size:9pt"></td>
					</tr>
					<tr>
					 <td width="120px" align="left" valign="top" class="login2"></td>
					 <td width="2px" align="left" valign="top" class="login2"></td>
					 <td width="178px" align="left" valign="top" class="login2"><input name="submit" type="submit" value="Login" style="font-family:tahoma, verdana, arial; font-size:9pt; cursor:pointer"></td>
					</tr>
					<?php
					if($_GET[err]==1)
					{
					 echo "<tr><td colspan='3'><small><font color=#ff0000>Username atau Password Anda salah</font></small></td></tr>";
					}
					else if($_GET[err]==2)
					{
					 echo "<tr><td colspan='3'><small><font color=#ff0000>Username atau Password Anda masih kosong</font></small></td></tr>";
					}
					?>
				</table>
			</form>
		</td>
	</tr>
	<tr><td height="50px"></td></tr>
</table>

<?php
 include "common/bottom.php";
?>