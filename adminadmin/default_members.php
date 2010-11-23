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
		  include "common/buttom.php";
		  exit;
      }
      ?>
	</td>
  </tr>
</table>

<?php
 $j=mysql_fetch_array(mysql_query("SELECT * FROM default_members WHERE id_fm='1'"));
?>

<table align="center" vspace="middle" width="800px" cellpadding="6px">
 <tr>
	 <td align="left" valign="middle" width="50%"><b><big>Setting Default Members (<font color="#0066FF"><?php echo $j[jml_members]; ?></font> orang)</big></b></td>
	 <td align="right" valign="middle" width="50%"></td>
	</tr>
</table><br />
<table cellpadding="6px" cellspacing="0" border="0" width="800px">
	<tr>
	  <td align="left" valign="top" colspan="2" width="100%">
	    <form action="default_members_pro.php" method="post">
	     Default Members &nbsp; <input type="text" name="member" size="15">
      <input type="submit" value="Setting" style="cursor:pointer">
	    </form>
	  </td>
	</tr>
</table>

<table width="800px" cellpadding="6px">
 <tr>
	 <td align="right" valign="middle" height="20px"></td>
	</tr>
</table>

<?php
include "common/footer_admin.php";
?>
