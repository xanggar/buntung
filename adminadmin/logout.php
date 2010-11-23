<?php
include "common/top_admin.php";
if (!authen())
{ 
   ?>
   <table cellpadding="5px" border="0" width="300px">
     <tr>
      <td align="center" valign="middle"><font color="#ff0000"><b><big><br># Halaman Error #</big></b></font><br></td>
     </tr>
	 <tr>
	  <td align="center" valign="middle">Anda tidak bisa logout karena belum login.<br><br></td>
	 </tr>
	 <tr>
	   <td align="center" valign="middle" class="link_biru"><a href="index.php">Klik untuk login</a></td>
	 </tr>
	</table>
	<?php
  exit;
  }
session_destroy();

?>
<br><br><br><br>
<table cellpadding="10px" cellspacing="0" border="0" width="800px" height="150px">
<tr>
	<td align="center" valign="middle"><font color="#4091d0"><big>=-= Logout Selesai =-=</big></font></td>
</tr>
</table>
<br><br><br><br>

<script language="JavaScript">
<!-- Original: Corey (638@gohip.com ) -->
<!-- Web Site: http://six38.tripod.com -->
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
    { document.location="login.php"; //ini nama file yang dituju
       }
}
window.setTimeout('CountDown()', 10);
//  End -->
 </script>

<?php
include "common/footer_admin.php";
?>