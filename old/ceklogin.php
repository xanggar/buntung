<?php
include "common/config.php";

$username=$_POST[kode];
$password=md5($_POST[password]);

$query="SELECT * FROM member WHERE username='$username' AND status = '1'";
//echo $query; exit;
$result=mysql_query($query);
$data=mysql_fetch_array($result);
$USERNAME=$data["username"];
$PASSWORD=$data["password"];
$GROUP=$data["user_posisi"];

//echo $PASSWORD; exit;
//exit;
if(empty($_POST[kode])||empty($_POST[password]))
{
	?>
	<script language="javascript">
			document.location="login.php?err=2&_hal=account";
	</script>
	<?php
}
else if (($username==$USERNAME)&&($password==$PASSWORD))
{ 
  session_start();
		session_register("username");
		session_register("group");
  $_SESSION['username']=$USERNAME;		
  $_SESSION['group']=$GROUP;
		header("location:main_menu.php?_hal=account");		
  } 
else 
{ 
  ?>
  <script language="javascript">
    document.location="login.php?err=1&_hal=account";
  </script>
  <?php
  }
mysql_close();  

include "common/bottom.php";
?>

