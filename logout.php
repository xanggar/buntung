<?php
include "common/session.php";
include "common/config.php";

session_destroy();

?>

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
var counts=0.5;
function CountDown()
{ var now=new Date();
  now=Date.parse(now)/1000;
  var x=parseInt(counts-(now-start), 10);
  if(x>0)
   { timerID=setTimeout("CountDown()", 100)
       }
   else
    { document.location="index.php"; //ini nama file yang dituju
       }
}
window.setTimeout('CountDown()', 10);
//  End -->
 </script>

