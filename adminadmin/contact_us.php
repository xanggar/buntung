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
		  exit();
     	}
     ?>
		</td>
  </tr>
</table>

<table width="800px" cellpadding="10px" cellspacing="0" border="0">
  <tr>
	  <td align="right" valign="middle">&nbsp;</td>
	</tr>
</table>

<table cellpadding="10px" cellspacing="0" border="0" width="800px" style="border:1px solid #acbccc">
	<tr>
		<td align="left" valign="middle" colspan="3"><b><big>Contact dari User</big></b></td>
</tr>
<tr>
 <td align="left" valign="top">
	 <table width="760px" cellpadding="5px" cellspacing="0" border="1px" bordercolor="#acbccc">
		 <tr>
			 <td align="center" valign="middle" width="80px"><b>Tanggal Masuk</b></td>
			 <td align="center" valign="middle" width="120px"><b>Nama Pengirim</b></td>
			 <td align="center" valign="middle" width="100px"><b>Email</b></td>
			 <td align="center" valign="middle" width="140px"><b>Judul Pesan</b></td>
			 <td align="center" valign="middle" width="270px"><b>Isi Pesan</b></td>
			 <td align="center" valign="middle" width="50px"><b>Action</b></td>
			</tr>
			<?php
			$abc="SELECT * FROM contact_us ORDER BY tanggal_masuk ASC";
			$res=mysql_query($abc);
			$jumlah=mysql_num_rows($res);
			$limit=10;
			$offset=val_get('offset', 'int');
			if ($offset < 0 || $offset == '')
			{
					$offset=0;
			}
			$halaman=intval($jumlah/$limit);
			if($jumlah%$limit)
			{
					$halaman++;
			}
			$abc2="SELECT * FROM contact_us ORDER BY tanggal_masuk ASC LIMIT $offset, $limit";
			$res2=mysql_query($abc2);
			$jumlah2=mysql_num_rows($res2);
			if($jumlah2<1)
			{
			 ?>
				<tr>
				 <td colspan="6" align="center" valign="middle" height="50px">Belum ada contact dari User untuk www.netviel.com</td>
				</tr>
				<?php
			}
			else
			{
			while($con2=mysql_fetch_array($res2))
			{
				list($yb, $mb, $db, $hb, $ib, $sb)=split ("[- :]", $con2[tanggal_masuk]);
				$tgl_masuk=$db."-".$mb."-".$yb;
			?>
		 <tr>
			 <td align="center" valign="middle" width="80px"><?php echo $tgl_masuk; ?></td>
			 <td align="center" valign="middle" width="120px"><?php echo $con2[nama]; ?></td>
			 <td align="center" valign="middle" width="100px"><?php echo $con2[email]; ?></td>
			 <td align="center" valign="middle" width="140px"><?php echo $con2[judul]; ?></td>
			 <td align="left" valign="middle" width="270px"><?php echo $con2['isi']; ?></td>
			 <td align="center" valign="middle" width="50px">
				<?php
				if($con2[status]==0)
				{
				?>
				<a href="reply.php?id=<?php echo $con2[id_contact]; ?>" class="link_biru">Reply?<a>
				<?php
				}
				else
				{
				?>
				<a href="reply.php?id=<?php echo $con2[id_contact]; ?>" class="link_biru">Reply Again?<a>
				<?php
				}
				?>
				</td>
			</tr>
			<?php
			}
			}
			?>
			<tr>
			 <td colspan="6" align="center" valign="middle">
					<?php
							for($i=1; $i<=$halaman; $i++)
							{
									$newoffset=$limit*($i-1);
									if($offset!=$newoffset)
									{
											echo "<a href=\"".$_SERVER['PHP_SELF']."?offset=$newoffset&halamanke=$i\" class=\"num\">$i</a> &nbsp; ";
									}
									else
									{
											echo "<b>".$i."</b> &nbsp; ";
									}
							}
					?>
				</td>
			</tr>
		</table>
	</td>
</tr>
</table>

<table>
  <tr>
	  <td align="center" valign="middle" height="20px"></td>
	</tr>
</table>
<?php
 include "common/footer_admin.php";
?>