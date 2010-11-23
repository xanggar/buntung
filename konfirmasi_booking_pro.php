<?php
 include "common/top3.php";
?>

<!-- Sub Page Title Starts here-->
<h1><?php echo $NAMA; ?> Account</h1>
<p><?php echo $account; ?></p>
<!-- Sub Page Title End here-->
</div>
</div>
</div>
<div class="clear">&nbsp;</div>
<div class="content cbg">
<div class="container_16 linebg">
<!--left part of text follows here-->
<div class="grid_11 para sepline">
<div class="text">
<h2>Payment Confirmation</h2>
<p><strong>Silahkan konfirmasi pembelian poin di <?php echo $namaweb; ?></strong></p>

<!-- Contact Form Start -->
       <?php
	       $pp=mysql_fetch_array(mysql_query("SELECT * FROM booking WHERE id_booking='".$_GET[idid]."'"));
		      $barang=mysql_fetch_array(mysql_query("SELECT id_product, nama_barang FROM product WHERE id_product='".$pp[id_product]."'"));
								
								list($bb, $mm, $dd)=split ("[- :]", $pp['tanggal']);
								$tgl=$dd."-".$mm."-".$bb;

							?>
							<form action="bayar_booking.php?_page=myaccount&id_pesan=<?php echo $_GET[idid]; ?>" method="post" name="tambah" id="tambah">
							 <table width="100%" border="0" cellpadding="7" cellspacing="0">
								 <tr>
									 <td colspan="3" align="left" valign="middle">&nbsp;</td>
									</tr>
								 <tr>
									 <td width="23%" align="left" valign="middle">Nama Barang</td>
										<td width="2" align="center" valign="middle">:</td>
										<td width="75%" align="left" valign="middle">
										 <?php echo $barang[nama_barang]; ?>
										</td>
									</tr>
								 <tr>
									 <td width="23%" align="left" valign="middle">Harga</td>
										<td width="2" align="center" valign="middle">:</td>
										<td width="75%" align="left" valign="middle">
										 Rp.<?php echo number_format($pp['harga_booking'], 0, ',', '.'); ?>,-
										</td>
									</tr>
								 <tr>
									 <td width="23%" align="left" valign="middle">Tanggal Pesan</td>
										<td width="2" align="center" valign="middle">:</td>
										<td width="75%" align="left" valign="middle">
										 <?php echo $tgl; ?>
										</td>
									</tr>
								 <tr>
									 <td colspan="3" align="left" valign="middle">&nbsp;</td>
									</tr>
								 <tr>
									 <td width="23%" align="left" valign="middle">Tanggal</td>
										<td width="2" align="center" valign="middle">:</td>
										<td width="75%" align="left" valign="middle">
											<input type="text" name="tanggal" id="sel3" size="15"
											><input type="reset" value=" ... "
											onclick="return showCalendar('sel3', '%Y-%m-%d');">																		
										</td>
									</tr>
								 <tr>
									 <td width="23%" align="left" valign="middle">Nama Bank</td>
										<td width="2" align="center" valign="middle">:</td>
										<td width="75%" align="left" valign="middle">
										 <input name="nama_bank" type="text" size="29">
										</td>
									</tr>
								 <tr>
									 <td width="23%" align="left" valign="middle">Nomor Rekening</td>
										<td width="2" align="center" valign="middle">:</td>
										<td width="75%" align="left" valign="middle">
										 <input name="nomor_rekening" type="text" size="29">
										</td>
									</tr>
								 <tr>
									 <td width="23%" align="left" valign="middle">Atas Nama</td>
										<td width="2" align="center" valign="middle">:</td>
										<td width="75%" align="left" valign="middle">
										 <input name="atas_nama" type="text" size="29">
										</td>
									</tr>
								</table>
								<br /><b>Ke :</b><br />
							 <table width="100%" border="0" cellpadding="7" cellspacing="0">
									<tr>
									<td align="left" valign="middle" width="23%">Nama Bank</td>
									<td align="left" valign="middle" width="2%">:</td>
									<td align="left" valign="middle" width="75%">
									<script language="JavaScript">
									function getCat()
									{ 
									 with (document.tambah)
										{ 
										<?php
										$sq="SELECT * FROM rekening ORDER BY nama_bank ASC";
										$rs=mysql_query($sq);
										while ($ds=mysql_fetch_array($rs))
										{ 
											$opt="";
											$_script="";
											$kategori=$ds[id_rekening];
											$q="SELECT * FROM rekening WHERE id_rekening='$kategori'";
											$r=mysql_query($q);
											$opt.="<option value=''>-- Klik untuk memilih --</option>";
											while ($dt=mysql_fetch_array($r))
											{ 
												$opt.="<option selected value='".trim($dt[id_rekening])."'>".trim($dt[nomor_rekening])."</option>";
											}
											$_script.="if (kategori.options[kategori.selectedIndex].text==\"".trim($ds[nama_bank])."\")";
											$_script.="{kategori_brg.innerHTML=\"<select disabled name='kategori_barang'>".$opt."</select>\"; }";
											echo $_script;
											}
										?>
										}
									 with (document.tambah)
										{ 
										<?php
										$sqq="SELECT * FROM rekening ORDER BY nama_bank ASC";
										$rsq=mysql_query($sqq);
										while ($dsq=mysql_fetch_array($rsq))
										{ 
											$optq="";
											$_scriptq="";
											$kategoriq=$dsq[id_rekening];
											$qq="SELECT * FROM rekening WHERE id_rekening='$kategoriq'";
											$rq=mysql_query($qq);
											$optq.="<option value=''>-- Klik untuk memilih --</option>";
											while ($dtq=mysql_fetch_array($rq))
											{ 
												$optq.="<option selected value='".trim($dtq[id_rekening])."'>".trim($dtq[atas_nama])."</option>";
											}
											$_scriptq.="if (kategori.options[kategori.selectedIndex].text==\"".trim($dsq[nama_bank])."\")";
											$_scriptq.="{kategori_brgq.innerHTML=\"<select disabled name='kategori_barang'>".$optq."</select>\"; }";
											echo $_scriptq;
											}
										?>
										}
									}
									
									</script>
									<select id="kategori" name="kategori" onchange="getCat()" <?php if ($_GET[kategori]=="freelance") { echo "disabled"; } ?>>
									<option value="">-- Klik untuk memilih --</option>
									<?php
									$sql="SELECT nama_bank FROM rekening ORDER BY nama_bank ASC";
									$res=mysql_query($sql);
									while ($data=mysql_fetch_array($res))
									{ ?>
									<option value="<?php echo trim($data[nama_bank]);?>" <?php if ($_GET[back]==1) { if ($data[nama_bank]==$_POST[nama_bank]) { echo "selected"; } } ?>><?php echo trim($data[nama_bank]) ?></option>
									<?php
									}
									?>
									</select>
									</td>
									</tr>
									<tr>
									<td align="left" valign="middle" width="23%">Nomor Rekening</td>
									<td align="left" valign="middle" width="2%">:</td>
									<td align="left" valign="middle" width="75%">
									<span id="kategori_brg">
									<select id="kategori_barang" name="kategori_barang" <?php if ($_GET[back]==1) { if ($_POST[kategori_barang]=="") { echo "disabled"; }} else { echo "disabled"; } ?>">
									<option value="">-- Nomor Rekening --</option>
									<?php
									if ($_GET[back]==1)
									{ $q="SELECT * FROM rekening WHERE id_rekening='$_POST[kategori]'";
									$r=mysql_query($q);
									while ($dt=mysql_fetch_array($r))
									{ ?>
									<option <?php if ($_GET[back]==1) { if ($dt[id_rekening]==$_POST[kategori]) { echo "selected"; }} ?>><?php echo trim($dt[nomor_rekening]); ?></option>
									<?php
									}
									}
									?>
									</select>
									</span>
									</td>
									</tr>
									<tr>
									<td align="left" valign="middle" width="23%">Atas Nama</td>
									<td align="left" valign="middle" width="2%">:</td>
									<td align="left" valign="middle" width="75%">
									<span id="kategori_brgq">
									<select id="kategori_barang" name="kategori_barang" <?php if ($_GET[back]==1) { if ($_POST[kategori_barang]=="") { echo "disabled"; }} else { echo "disabled"; } ?>">
									<option value="">-- Nomor Rekening --</option>
									<?php
									if ($_GET[back]==1)
									{ $q="SELECT * FROM rekening WHERE id_rekening='$_POST[kategori]'";
									$r=mysql_query($q);
									while ($dt=mysql_fetch_array($r))
									{ ?>
									<option <?php if ($_GET[back]==1) { if ($dt[id_rekening]==$_POST[kategori]) { echo "selected"; }} ?>><?php echo trim($dt[nomor_rekening]); ?></option>
									<?php
									}
									}
									?>
									</select>
									</span>
									</td>
									</tr>
									<tr>
										<td align="left" valign="middle" colspan="3">&nbsp;
										
										</td>
									</tr>
									<tr>
									<td align="left" valign="middle" width="23%">Token</td>
									<td align="left" valign="middle" width="2%">:</td>
									<td align="left" valign="middle" width="75%">
									 <input name="token" type="text" size="35" />
									</td>
									</tr>
									<tr>
										<td align="left" valign="middle" colspan="3">&nbsp;
										
										</td>
									</tr>
									<tr>
										<td align="left" valign="middle" colspan="3">
											<input name="submit" type="submit" value=" Yes " style="cursor:pointer">&nbsp;&nbsp;
											<input name="button" type="button" value="Cancel" style="cursor:pointer" onClick="document.location='konfirmasi.php?_page=myaccount'">
										</td>
									</tr>
								</table>
					</form>


<br /><br /><br />
<!-- Contact Form end -->
</div>
</div>
            <!--End of the Left part text  -->
<!--Right part of text follows here-->
<?php
 include "common/right_account.php";
?>
<!--End of the Right part text  -->
      </div>
</div>

<?php
 include "common/bottom.php";
?>
