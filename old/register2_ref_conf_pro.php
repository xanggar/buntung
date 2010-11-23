<?php
 include "common/top_reg2.php";
?>


<table width="851px" cellpadding="0" cellspacing="0" style="background-color:#ffffff" border="0"> 
 <tr><td colspan="2" height="10px"></td></tr>
 <tr>
	 <td align="left" valign="middle">

		 <table cellpadding="0" cellspacing="0" width="100%" border="0">
			 <tr>
				 <td width="580px" align="center" valign="top"> <!-- Untuk Utama --> 
					
					
							<table cellpadding="7px" cellspacing="0" width="100%" border="0">
								<tr>
									<td align="center" valign="middle" colspan="3">
										
					 <?php
						
						$cek=mysql_fetch_array(mysql_query("SELECT * FROM member WHERE page='".$_GET[_page]."'"));
						$kodekode=trim($_POST[kode]);
						
						if(empty($_POST[kode]))
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px" style="border:1px solid #acbccc" width="100%">
							 <tr>
							  <td align="center" valign="middle" class="header_error">Konfirmasi Kode Aktivasi Error</td>
							 </tr>
							 <tr align="center" valign="middle">
							  <td class="isi2">Anda belum memasukkan Kode Aktivasi.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:history.back(-1)'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table>
							<?php
						}
						else if($cek[token]<>$kodekode)
						{
						 ?>
							<table cellpadding="7px" cellspacing="1px" style="border:1px solid #acbccc" width="100%">
							 <tr>
							  <td align="center" valign="middle" class="header_error">Konfirmasi Kode Aktivasi Error</td>
							 </tr>
							 <tr align="center" valign="middle">
							  <td class="isi2">Kode Aktivasi Yang Anda masukkan Salah.<br></td>
							 </tr>
							 <tr>
							  <td align="center" valign="middle" class="link_biru"><a href='javascript:history.back(-1)'>Kembali ke halaman sebelumnya</a></td>
							 </tr>
							</table>
							<?php
						}
						else
						{
						 $edit=mysql_query("UPDATE member SET status='1' WHERE page='$_GET[_page]'");
							if($edit)
							{
								?>
								<script language="javascript">
									document.location="register3_ref.php?_page=<?php echo $_GET[_page]; ?>&_hal=regis";
								</script>
								<?php
							}
						}
						?>
										
										
									</td>
								</tr>
							</table>
							
							
					</td>
				</tr>
			</table>

		</td>
	</tr>
	<tr><td colspan="2" height="30px"></td></tr>
</table>

<?php
 include "common/bottom.php";
?>