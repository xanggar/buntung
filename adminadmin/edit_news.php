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

<?php
$qqq="SELECT * FROM berita_ringan WHERE brid='".val_get('id_news', 'int')."'";
$rrr=mysql_query($qqq);
$data=mysql_fetch_array($rrr);

$isi=str_replace("<br>", "\r\n", $data['isi_berita']);

list($h, $j, $k, $u, $i, $o)=split ("[- :]", $data[tgl_berita]);
$tgl_berita=$h."-".$j."-".$k;

?>

<table width="800px" cellpadding="10px" cellspacing="0" border="0">
  <tr>
	  <td align="right" valign="middle" colspan="2">&nbsp;</td>
	</tr>
</table>

<form name="ubah" enctype="multipart/form-data" method="post" action="edit_news_pro.php?id_news=<?php echo $data['brid']; ?>">
  <table cellpadding="6px" cellspacing="0" border="0" width="780px" style="border:1px solid #acbccc">
	  <tr bgcolor="#efefef">
		  <td align="left" valign="middle" colspan="3"><big><b>Edit Berita</b></big></td>
		</tr>
		<tr>
		  <td align="left" valign="middle" width="23%">Isi Berita</td>
			<td align="left" valign="middle" width="2%">:</td>
		  <td align="left" valign="middle">
			  <input type="text" name="judul" size="85" value="<?php echo $data[judul_berita]; ?>" />
				</td>
		</tr>
		<tr>
		  <td align="left" valign="middle" width="23%">Isi Berita</td>
			<td align="left" valign="middle" width="2%">:</td>
		  <td align="left" valign="middle">
			  <textarea rows="5" cols="85" name="isi"><?php echo $isi; ?></textarea>
				</td>
		</tr>
		<tr>
		  <td align="left" valign="middle" width="23%">Tanggal Berita</td>
			<td align="left" valign="middle" width="2%">:</td>
		  <td align="left" valign="middle">
						<input type="text" value="<?php echo $tgl_berita; ?>" name="tanggal_berita" id="sel3" size="15"
						><input type="reset" value=" ... "
						onclick="return showCalendar('sel3', '%Y-%m-%d');">																		
			</td>
		</tr>
				  <tr>
					  <td align="left" valign="middle" width="23%">Gambar</td>
					  <td align="left" valign="middle" width="2%">:</td>
					  <td align="left" valign="middle" width="75%">
						  <input name="gambar" type="file" size="37">
						</td>
					</tr>
		<tr>
		  <td align="center" valign="middle" colspan="3">
			  <input type="submit" value="Ubah" style="cursor:pointer">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		    <input type="button" value="Cancel" onClick="javascript:history.back(-1)" style="cursor:pointer">
			</td>
		</tr>
	</table>
</form>
<table>
  <tr>
	  <td align="center" valign="middle" height="20px"></td>
	</tr>
</table>
<?php
 include "common/footer_admin.php";
?>