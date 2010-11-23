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

<table align="center" vspace="middle" width="800px" cellpadding="6px">
 <tr>
	 <td align="left" valign="middle" width="50%"><b><big>Tambah Kategori Utama</big></b></td>
	 <td align="right" valign="middle" width="50%"></td>
	</tr>
</table><br />
<table cellpadding="6px" cellspacing="0" border="0" width="800px">
	<tr>
	  <td align="left" valign="top" colspan="2" width="100%">
	    <form action="add_kategori_pro.php" method="post">
	     Nama Kategori Utama &nbsp; <input type="text" name="deskripsi" size="35">
      <input type="submit" value="Tambahkan" style="cursor:pointer">
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
