<?php
include "common/top_admin.php";
?>
<table width="800px" cellpadding="10px" cellspacing="1px" border="0">
	<tr>
		<td align="center" valign="middle">
			<?php
			if (!authen())
			{
				?>
					<table cellpadding="5px" width="300px">
						<tr>
							<td align="center" valign="middle"><font color="#ff0000"><b><big><br># Halaman Error #</big></b></font><br></td>
						</tr>
						<tr align="left" valign="middle">
							<td align="center">Anda harus login untuk mengakses halaman ini.<br></td>
						</tr>
						<tr>
							<td align="center" valign="middle"><a href="login.php" class="link_biru">Klik untuk login</a></td>
						</tr>
					</table>
				<?php
				exit;
				}
				?>
		</td>
	</tr>
</table>

<table width="800px">
 <tr>
	 <td height="20px" align="right" valign="middle">&nbsp;</td>
	</tr>
</table>

<table cellpadding="6px" cellspacing="0" style="border:1px solid #acbccc" width="700px">
  <tr bgcolor="#efefef">
	  <td align="left" valign="middle"><b><big>Form Tambah Admin</big></b></td>
	</tr>
	<tr>
	  <td align="left" valign="top" colspan="2" width="700px">
			<form name="ubah" method="post" action="add_admin_pro.php">
				<table cellpadding="6px" cellspacing="0" border="0" width="780px">
					<tr>
						<td align="left" valign="middle" width="23%">Username *</td>
						<td align="left" valign="middle" width="2%">:</td>
						<td align="left" valign="middle">
							<input type="text" name="username" size="35" />
							</td>
					</tr>
					<tr>
						<td align="left" valign="middle" width="23%">Password *</td>
						<td align="left" valign="middle" width="2%">:</td>
						<td align="left" valign="middle">
							<input type="password" name="pass" size="35" />
							</td>
					</tr>
					<tr>
						<td height="10px" colspan="3"></td>
					</tr>
					<tr>
						<td align="left" valign="middle" width="23%">&nbsp;</td>
						<td align="left" valign="middle" width="2%">&nbsp;</td>
						<td align="left" valign="middle">
							<input type="submit" value="Submit" style="cursor:pointer">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="button" value="Cancel" onClick="javascript:history.back(-1)" style="cursor:pointer">
						</td>
					</tr>
				</table>
			</form>
	  </td>
	</tr>
	<tr>
	 <td height="30px" colspan="3"></td>
	</tr>
	<tr>
	 <td align="left" valign="top">
		 <table cellpadding="6px" cellspacing="0" width="40%" border="1px">
			 <tr>
				 <td width="80%" align="center" valign="middle"><b>Username</b></td>
				 <td width="20%" align="center" valign="middle"><b>Action</b></td>
				</tr>
				<?php
				$user=mysql_query("SELECT * FROM admin");
				while($user2=mysql_fetch_array($user))
				{
				?>
			 <tr>
				 <td width="80%" align="left" valign="middle"><?php echo $user2[user_id]; ?></td>
				 <td width="20%" align="center" valign="middle">
					 <img src="images/hapus.png" style="cursor:pointer" onClick="document.location='hapus_admin.php?id=<?php echo $user2[idid]; ?>'">
					</td>
				</tr>
				<?php
				}
				?>
			</table>
		</td>
	</tr>
</table>

<table>
 <tr>
	 <td height="20px"></td>
	</tr>
</table>
<?php
 include "common/footer_admin.php";
?>
