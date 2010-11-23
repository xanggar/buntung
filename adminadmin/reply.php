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
		  exit();
     	}
     ?>
		</td>
  </tr>
</table>

<table width="800px" cellpadding="10px" cellspacing="0" border="0">
  <tr>
	  <td align="right" valign="middle">&nbsp;</td>
	</tr>
</table>

<table cellpadding="10px" cellspacing="0" border="0" width="800px" style="border:1px solid #acbccc">
	<tr>
		<td align="left" valign="middle" colspan="3"><b><big>Reply Contact dari User</big></b></td>
</tr>
<tr>
 <td align="left" valign="top">
	 <?php
		$con=mysql_fetch_array(mysql_query("SELECT * FROM contact_us WHERE id_contact='".$_GET[id]."'"));
		?>
	 <form action="reply_pro.php?id=<?php echo $_GET[id]; ?>" method="post">
			<table width="760px" cellpadding="5px" cellspacing="0">
			 <tr>
				 <td align="left" valign="top">
					 <textarea cols="75" rows="11" name="isi">< <?php echo $con[nama]; ?> write>:<?php echo $con[isi]; ?></end></textarea>
					</td>
				</tr>
			 <tr>
				 <td align="left" valign="top">
					 <input name="submit" value="Kirim" type="submit">
						&nbsp; &nbsp;
						<input name="button" value="Batal" type="button" onClick="document.location='javascript:history.back(-1)'">
					</td>
				</tr>
			</table>
		</form>
	</td>
</tr>
</table>

<table>
  <tr>
	  <td align="center" valign="middle" height="20px"></td>
	</tr>
</table>
<?php
 include "common/footer_admin.php";
?>