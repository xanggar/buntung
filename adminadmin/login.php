<?php
include "common/top_admin_before.php";
?>
<table width="800px" cellpadding="10px" cellspacing="1px" border="0">
  <tr>
    <td align="center" valign="middle">
    <?php
      if (authen())
      {
      ?>
      <table cellpadding="5px" width="300px">
        <tr>
          <td align="center" valign="middle"><font color="#ff0000"><b><big><br># Halaman Error #</big></b></font><br></td>
        </tr>
	      <tr align="left" valign="middle">
	        <td align="center">Anda sudah login.<br></td>
	      </tr>
	      <tr>
	        <td align="center" valign="middle"><a href="javascript:history.back(-1)" class="link_biru">Kembali ke halaman sebelumnya</a></td>
	      </tr>
	    </table>
	  <?php
		  exit;
      }
      ?>
	</td>
  </tr>
</table>

<table cellpadding="0" cellspacing="0" style="border:1px solid #acbccc" width="800px" height="300px">
	<tr>
		<td align="center" valign="middle">
			<form name="login" method="post" action="ceklogin_admin.php?status=2" style="margin:'0' '0' '0' '0">
  			<table cellpadding="10px" cellspacing="0" width="400px" style="border:1px solid #acbccc">
  				<tr>
  					<td align="left" valign="middle" colspan="3"><b><big>Log In</big></b></td>
  				</tr>
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
  					</td>
  				</tr>
  				<tr>
  					<td align="left" valign="middle" colspan="3">
  					  <font color="#ff0000">
  						  <?php
                if(isset($_GET['err']))
    						  if($_GET['err']==1)
    						    echo "Username atau password Anda salah";
  						  ?>
  					  </font>
  				  </td>
          </tr>
        </table>
      </form>
    </td>
  </tr>
</table>

<table><tr><td></td></tr></table>
<?php
 include "common/footer_admin.php";
?>