<?php
	session_start();
	
	session_name("SES_USERNAME");
	session_name("SES_PASSWORD");
	session_name("SES_NAMA");
	session_name("TOKEN");
	$USERNAME=$_SESSION['SES_USERNAME'];
	$PASSWORD=$_SESSION['SES_PASSWORD'];
	$NAMA=$_SESSION['SES_NAMA'];
	$token_pesan_packages=$_SESSION['TOKEN'];
	
?>