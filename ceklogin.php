<?php
include "common/config.php";
include "common/function.php";

if(empty($_POST[username])||empty($_POST[password]))
{
	?>
	<script language="javascript">
			document.location="login.php?_page=myaccount&err=3";
	</script>
	<?php
}
else
{
	$username = val_post('username', 'text');
	$password = md5(val_post('password', 'text'));
	//echo $username."<BR><BR>".$password; exit;
	
	$belum="SELECT * FROM member WHERE username='$username' AND status='0'";
	$belum2=mysql_num_rows(mysql_query($belum));
	if($belum2>0)
	{
			?>
			<script language="javascript">
					document.location="login.php?_page=myaccount&err=2";
			</script>
			<?php
	}
	
	$query="SELECT * FROM member WHERE username='$username' AND status='1'";
	$result=mysql_query($query);
	$data=mysql_fetch_array($result);
	$USERNAME=$data["username"];
	$PASSWORD=$data["password"];
	$NAMA=$data["nama"];
	
	if (($username==$USERNAME)&&($password==$PASSWORD))
	{
	  session_register("SES_USERNAME");
	  session_register("SES_PASSWORD");
	  session_register("SES_NAMA");
			$_SESSION['SES_USERNAME']=$USERNAME;
			$_SESSION['SES_PASSWORD']=$PASSWORD;
			$_SESSION['SES_NAMA']=$NAMA;
			
			//echo $PASSWORD."<br><br>".$_SESSION['SES_PASSWORD']; exit;
	
			$query = 'UPDATE member SET `lastlogin`=\''.date('Y-m-d H:i:s').'\' WHERE username=\''.$username.'\' ';
			$result = mysql_query($query);
		//echo $query; exit();
			?>
			<script language="javascript">
				document.location="myaccount.php?_page=myaccount";
			</script>
			<?php
	}
	else
	{
			?>
			<script language="javascript">
					document.location="login.php?_page=myaccount&err=1";
			</script>
			<?php
	}
	mysql_close();
}
?>

