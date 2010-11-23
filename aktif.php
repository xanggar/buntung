<?php
include "common/top2.php";

// perubahanku //

//Mengambil nilai username dan tanggal daftar
$username=urldecode($_GET[username]);
$token=urldecode($_GET[token]);
$page=urldecode($_GET[page]);

list($yb, $mb, $db, $hb, $ib, $sb)=split ("[- :]", $_tgldaftar);
$tgl_daftar=$yb."-".$mb."-".$db;

//Mencari account yang ingin diaktifkan
$sql="SELECT * FROM member WHERE username='$username' AND status='0'";
$res=mysql_query($sql);
$dat=mysql_fetch_array($res);
$jmlhData=mysql_num_rows($res);
if ($jmlhData<1) //Bila account tidak ada didaftar account yang belum aktif
{ //cek apakah account sudah diaktifkan sebelumnya
  $sql2="SELECT * FROM member WHERE username='$username' AND status='1'"; 
  $res2=mysql_query($sql2);
		//echo $sql2;
  $jmlhData2=mysql_num_rows($res2);
  if ($jmlhData2>0) //Account sudah aktif
  { ?>
		  <table width="851px" cellpadding="5px" cellspacing="0" border="0" bgcolor="#FFFFFF">
				<tr>
				<td align="center" valign="middle">
    <div align='center'><p><br><br><br><br>
    <big><b>Maaf, account yang ingin anda aktifkan sudah diaktifkan sebelumnya</b></big><br><br>
    Silakan gunakan account anda untuk login di situs kami<br><br><br>
				</td>
				<tr>
				</table>
    <?php include "common/bottom.php"; exit; 
    }
  else // Account tetap tidak ditemukan
  { ?>
		  <table width="851px" cellpadding="5px" cellspacing="0" border="0" bgcolor="#FFFFFF">
				<tr>
				<td align="center" valign="middle">
    <div align='center'><p><br><br><br><br>
    <big><b>Maaf, account yang ingin anda aktifkan belum tercatat dalam database kami</b></big><br><br>
    Silakan isi formulir pendaftaran keanggotaan terlebih dahulu<br><br><br>
				</td>
				<tr>
				</table>
    <?php include "common/bottom.php"; exit; 
    }
  }
else //Account yang ingin diaktifkan ditemukan
{ $sql3="UPDATE member SET status='1' WHERE username='$username' AND status='0'";
  $res3=mysql_query($sql3);
  if ($res3)
  { ?>
		  <table width="851px" cellpadding="5px" cellspacing="0" border="0" bgcolor="#FFFFFF">
				<tr>
				<td align="center" valign="middle">
    <div align='center'><p><br><br><br><br>
    <big><b>Account anda sudah diaktifkan</b></big><br><br>
    Selamat menikmati semua kemudahan dan keuntungan berbelanja melalui situs kami<br><br><br>
    <a href='index.php'>Masuk ke <?php echo $namaweb ?></a><br><br><br>
				</td>
				<tr>
				</table>
    <?php include "common/bottom.php"; exit; 
	}
  } 
		
include "common/bottom.php";
?>    