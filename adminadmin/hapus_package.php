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
<br><br>
<?php
	$hapus=mysql_query("DELETE FROM packages WHERE id_package='".$_GET[id_package]."'");
	if($hapus)
	{
	?>
		<table cellpadding="10px" height="150px" cellspacing="1px" border="0" width="800px">
		<tr>
		<td align="center" valign="middle" class="header_sukses">Hapus Packages Bidding Berhasil</td>
		</tr>
		</table>
		<script language="JavaScript">
		<!-- Original:  Corey (638@gohip.com ) -->
		<!-- Web Site:   http://six38.tripod.com -->
		<!-- This script and many more are available free online at -->
		<!-- The JavaScript Source!! http://javascript.internet.com -->
		<!-- Begin
		var start=new Date();
		start=Date.parse(start)/1000;
		// Ini diubah-ubah untuk set kecepatan pindah halaman. 
		// Makin kecil, makin cepat pindah halaman
		var counts=3;
		function CountDown()
		{ var now=new Date();
		now=Date.parse(now)/1000;
		var x=parseInt(counts-(now-start), 10);
		if(x>0)
		{ timerID=setTimeout("CountDown()", 100)
		}
		else
		{ document.location="lihat_packages.php";
		}
		}
		window.setTimeout('CountDown()', 100);
		//  End -->
		</script>
		<?php
	}
mysql_close();
?>
<table width="800px">
 <tr>
	 <td height="20px"></td>
	</tr>
</table>
<?php
include "common/footer_admin.php";
?>