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
	        <td align="center">Kamu harus login untuk mengakses halaman ini.<br></td>
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
<br /><br />
<?php
$id_bank=$_GET[id_bank];
?>

<table cellpadding="6px" cellspacing="0"style="border:1px solid #acbccc" width="300px">
  <tr>
    <td align="center" valign="middle" colspan="2"><font color="#000000"><b><big>HAPUS BANK</big></b></font></td>
  </tr>
  <tr>
    <td align="center" valign="middle" colspan="2">Apakah anda yakin mau menghapus Bank ini?</td>
  </tr>
  <tr>
	  <td align="center" valign="middle">
		  <a href="hapus_bank.php?id_bank=<?php echo $id_bank ?>" class="link_kecil">Ya</a>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		  <a href="lihat_bank.php" class="link_kecil">Tidak</a>
		</td>
  </tr>
</table>

<table width="800px">
  <tr>
	  <td align="center" valign="middle" height="20px"></td>
	</tr>
</table>


<?php
include "common/footer_admin.php";
?>