<?php
include "common/top_admin_before.php";
include "../common/config.php";
include "common/function.php";

$username = val_post('username', 'text');
$password = md5(val_post('password', 'text'));
$statuslogin = val_get('status', 'int');

$query="SELECT * FROM admin WHERE user_id='$username' AND status='$statuslogin'";
$result=mysql_query($query);
$data=mysql_fetch_array($result);
$USERNAME=$data["user_id"];
$PASSWORD=$data["password"];
$NAMA=$data["nama"];
$STATUS=$data["status"];

if (($username==$USERNAME)&&($password==$PASSWORD))
{
		session_name("AUTHENUSER");
		session_start();
  $_SESSION['SES_USERNAME']=$USERNAME;
  $_SESSION['SES_PASSWORD']=$PASSWORD;
  $_SESSION['SES_NAMA']=$NAMA;
  $_SESSION['SES_STATUS']=$STATUS;

  $query = 'UPDATE admin SET `lastlogin`=\''.date('Y-m-d H:i:s').'\' WHERE user_id=\''.$username.'\' ';
  $result = mysql_query($query);
	//echo $query; exit();
  ?>
  <table width="800px" height="300px" cellpadding="10px" cellspacing="1px" border="0">
    <tr>
	    <td align="center" valign="middle" width="100%"><font color="#4091d0"><big>=-= SIGN IN SUCCESFULLY =-=</big></font></td>
    </tr>
  </table>
  <script language="JavaScript">
    var start=new Date();
    start=Date.parse(start)/1000;
    var counts=4;
    function CountDown()
    {
      var now=new Date();
      now=Date.parse(now)/1000;
      var x=parseInt(counts-(now-start), 10);
      if(x>0)
      {
        timerID=setTimeout("CountDown()", 100)
      }
      else
      {
        document.location="index.php"; //ini nama file yang dituju oleh admin
      }
    }
    window.setTimeout('CountDown()', 20);
    //  End -->
  </script>
  <?php
}
else
{
  ?>
  <script language="javascript">
    document.location="login.php?err=1";
  </script>
  <?php
}
mysql_close();
include "common/footer_admin.php";
?>

