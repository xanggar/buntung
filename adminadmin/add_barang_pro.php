<?php
include "common/top_admin.php";
?>
<table width="800px" cellpadding="8px" cellspacing="0" border="0">
 <tr>
  <td align="center" valign="middle">
			<?php
			if (!authen())
			{ ?>
					<font color="#ff0000"><b><br># Halaman Error #</b></font><br><br>
					Anda harus login untuk mengakses halaman ini.<br><br><br>
					<a href="login.php" class="link_biru">Klik untuk login</a>
     <?php
					}
			else
			{ $statusbrg = val_post('status', 'int');
					$kategori = val_post('kategori', 'int');
					//echo $kategori; exit;
					$waktu_awal=$_POST[tanggal_bid]." ".$_POST[jam].":".$_POST[menit].":"."00";
					$subkategori = val_post('subkategori', 'int');
					$merk = val_post('merk', 'int');
					$nama = val_post('nama', 'text');
					$ket_sub = val_post('ket_sub', 'text');
					$ket_pro=str_replace("'", "", $_POST[ket_pro]);
					$ket_pro=str_replace("\r\n", "<br>", $ket_pro);
					$matauang = val_post('matauang', 'int');
					$harga=str_replace(".", "", $_POST[harga]);
					$tambah_harga=str_replace(".", "", $_POST[tambah_harga]);
					//echo $harga; exit;
					$name=$_FILES["gambar"]["name"];
					$name=str_replace(" ", "_", $name);
					$name=str_replace("-","_", $name);
					$name=str_replace("\'","", $name);
					$name=str_replace("+","", $name);
					$name=str_replace("*","", $name);
					$name=str_replace(",","", $name);
					$name=str_replace('\"',"", $name);
					$name=str_replace("&","", $name);
					$name=str_replace("$","", $name);
					$name=str_replace("#","", $name);
					$name=str_replace("@","", $name);
					$name=str_replace("(","", $name);
					$name=str_replace(")","", $name);
					$name=str_replace("{","", $name);
					$name=str_replace("}","", $name);
					$name=str_replace("[","", $name);
					$name=str_replace("]","", $name);
					$name=str_replace(":","", $name);
					$name=str_replace(";","", $name);
					$name=str_replace("!","", $name);
					
					$name2=$_FILES["gambar2"]["name"];
					$name2=str_replace(" ", "_", $name2);
					$name2=str_replace("-","_", $name2);
					$name2=str_replace("\'","", $name2);
					$name2=str_replace("+","", $name2);
					$name2=str_replace("*","", $name2);
					$name2=str_replace(",","", $name2);
					$name2=str_replace('\"',"", $name2);
					$name2=str_replace("&","", $name2);
					$name2=str_replace("$","", $name2);
					$name2=str_replace("#","", $name2);
					$name2=str_replace("@","", $name2);
					$name2=str_replace("(","", $name2);
					$name2=str_replace(")","", $name2);
					$name2=str_replace("{","", $name2);
					$name2=str_replace("}","", $name2);
					$name2=str_replace("[","", $name2);
					$name2=str_replace("]","", $name2);
					$name2=str_replace(":","", $name2);
					$name2=str_replace(";","", $name2);
					$name2=str_replace("!","", $name2);

					$name3=$_FILES["gambar3"]["name"];
					$name3=str_replace(" ", "_", $name3);
					$name3=str_replace("-","_", $name3);
					$name3=str_replace("\'","", $name3);
					$name3=str_replace("+","", $name3);
					$name3=str_replace("*","", $name3);
					$name3=str_replace(",","", $name3);
					$name3=str_replace('\"',"", $name3);
					$name3=str_replace("&","", $name3);
					$name3=str_replace("$","", $name3);
					$name3=str_replace("#","", $name3);
					$name3=str_replace("@","", $name3);
					$name3=str_replace("(","", $name3);
					$name3=str_replace(")","", $name3);
					$name3=str_replace("{","", $name3);
					$name3=str_replace("}","", $name3);
					$name3=str_replace("[","", $name3);
					$name3=str_replace("]","", $name3);
					$name3=str_replace(":","", $name3);
					$name3=str_replace(";","", $name3);
					$name3=str_replace("!","", $name3);
					
					$valid_harga="^[0-9]{1,}$";
					if ($nama!="")
					{ $hoh="SELECT * FROM product WHERE nama_barang='$nama'";
							$ooo=mysql_query($hoh);
							$found=mysql_num_rows($ooo);
							}
					else
					{ $found=0;
							}
					if (empty($kategori))
					{ $msg="<font color='#ff0000'><b>Tambah Barang Bermasalah:</b></font> &nbsp;
													Anda harus memilih kategori utama untuk memasukan barang baru.
													<br><br><br><a href='javascript:history.back(-1)'>Halaman sebelumnya</a>
													";
							}
					else if (empty($nama))
					{ $msg="<font color='#ff0000'><b>Tambah Barang Bermasalah:</b></font> &nbsp;
													Anda harus memasukan nama barang untuk memasukan barang baru.
													<br><br><br><a href='javascript:history.back(-1)'>Halaman sebelumnya</a>
													";
							}
					else if ($found>0)
					{ $msg="<font color='#ff0000'><b>Tambah Barang Bermasalah:</b></font> &nbsp;
													Nama barang yang Anda masukan sudah pernah dimasukan sebelumnya.
													<br><br><br><a href='javascript:history.back(-1)'>Halaman sebelumnya</a>
													";
							}
					else if (empty($ket_pro))
					{ $msg="<font color='#ff0000'><b>Tambah Barang Bermasalah:</b></font> &nbsp;
													Anda harus memasukan keterangan lengkap barang untuk memasukan barang baru.
													<br><br><br><a href='javascript:history.back(-1)'>Halaman sebelumnya</a>
													";
							}
					else if (empty($_POST[poin]))
					{ $msg="<font color='#ff0000'><b>Tambah Barang Bermasalah:</b></font> &nbsp;
													Anda harus jumlah poin untuk memasukan barang baru.
													<br><br><br><a href='javascript:history.back(-1)'>Halaman sebelumnya</a>
													";
							}
					else if (empty($harga) || $harga==0)
					{ $msg="<font color='#ff0000'><b>Tambah Barang Bermasalah:</b></font> &nbsp;
													Anda harus memasukan harga barang untuk memasukan barang baru.
													<br><br><br><a href='javascript:history.back(-1)'>Halaman sebelumnya</a>
													";
							}
					else if (!eregi($valid_harga, $harga))
					{ $msg="<font color='#ff0000'><b>Tambah Barang Bermasalah:</b></font> &nbsp;
													Harga barang yang Anda masukan tidak umum.
													<br><br><br><a href='javascript:history.back(-1)'>Halaman sebelumnya</a>
													";
							}
					else if (empty($_POST[tanggal_bid]))
					{ $msg="<font color='#ff0000'><b>Tambah Barang Bermasalah:</b></font> &nbsp;
													Anda harus memasukkan tanggal tampil.
													<br><br><br><a href='javascript:history.back(-1)'>Halaman sebelumnya</a>
													";
							}
					else
					{ if(empty($name)&&empty($name2)&&empty($name3))
							{ $query="INSERT INTO product (id_kategori, nama_barang, keterangan, jumlah_poin, idmatauang, harga, tambah_harga, tanggal, tanggal_masuk, jumlah_minimal_koin) ";
									$query.="VALUES ('".$kategori."', '".$nama."', '".$ket_pro."', '".$_POST[poin]."', '".$matauang."', '".$harga."', '".$tambahharga."', '".$_POST[tanggal_bid]."', '".$tanggal_update."', '".$_POST[jumlah_poin]."');";
									$result=mysql_query($query);
									if($result)
									{ 
										$msg="<font color='#ff0000'><b>Tambah Barang Sukses:</b></font> &nbsp;
																Data barang telah berhasil ditambahkan ke dalam database.
																<br><br><br><a href='lihat_barang.php'>Lihat semua barang</a>
																";
											}
									else
									{ $msg="<font color='#ff0000'><b>Tambah Barang Bermasalah:</b></font> &nbsp;
																	Data barang tidak dapat ditambahkan karena sambungan internet bermasalah. Mohon periksa sambungan internet Anda dan coba kembali.
																	<br><br><br><a href='javascript:history.back(-1)'>Halaman sebelumnya</a>
																	";
											}
									}
							else
							{ 
							  $tmp_name=$_FILES["gambar"]["tmp_name"];
									$type=$_FILES["gambar"]["type"];
							  $tmp_name2=$_FILES["gambar2"]["tmp_name"];
							  $tmp_name3=$_FILES["gambar3"]["tmp_name"];
									if ($type!="image/gif" && $type!="image/pjpeg" && $type!="image/jpeg" && $type!="image/jpg" && $type!="image/png")
									{ $msg="<font color='#ff0000'><b>Tambah Barang Bermasalah:</b></font> &nbsp;
																	Foto/gambar barang yang Anda masukan harus berbentuk JPG, GIF atau PNG.
																	<br><br><br><a href='javascript:history.back(-1)'>Halaman sebelumnya</a>
																	";
											}
									else
									{ 
									  $namafile=date("Ymdhis").strtolower($name);
									  $namafile2=date("Ymdhis").strtolower($name2);
									  $namafile3=date("Ymdhis").strtolower($name3);
											
											if ((move_uploaded_file($tmp_name, "../images_product/".$namafile)))
											{ 
											  if(!empty($name))
													{
											  chmod ("../images_product/$namafile", 0777);
													}
											  if(!empty($name2))
													{
											  chmod ("../images_product/$namafile2", 0777);
													}
											  if(!empty($name3))
													{
											  chmod ("../images_product/$namafile3", 0777);
													}

													$query="INSERT INTO product (id_kategori, nama_barang, keterangan, jumlah_poin, idmatauang, harga, tambah_harga, tanggal, gambar_barang, tanggal_masuk, jumlah_minimal_koin) ";
													$query.="VALUES ('".$kategori."', '".$nama."', '".$ket_pro."', '".$_POST[poin]."', '".$matauang."', '".$harga."', '".$tambahharga."', '".$_POST[tanggal_bid]."', '".$namafile."', '".$tanggal_update."', '".$_POST[jumlah_poin]."');";
													//echo $query; exit;
													$result=mysql_query($query);
													if($result)
													{ 
														$msg="<font color='#ff0000'><b>Tambah Barang Sukses:</b></font> &nbsp;
																				Data barang telah berhasil ditambahkan ke dalam database.
																				<br><br><br><a href='lihat_barang.php'>Lihat semua barang</a>
																				";
														}
													else
													{ $msg="<font color='#ff0000'><b>Tambah Barang Bermasalah:</b></font> &nbsp;
																					Data barang tidak dapat ditambahkan karena sambungan internet bermasalah. Mohon periksa sambungan internet Anda dan coba kembali.
																					<br><br><br><a href='javascript:history.back(-1)'>Halaman sebelumnya</a>
																					";
													}
											}
											else
											{ $msg="<font color='#ff0000'><b>Tambah Barang Bermasalah:</b></font> &nbsp;
																			Gambar/foto tidak dapat di-upload karena sambungan internet bermasalah. Mohon periksa sambungan internet Anda dan coba kembali.
																			<br><br><br><a href='javascript:history.back(-1)'>Halaman sebelumnya</a>
																			";
													}
											}
									}
							}
					?>
     <table border="0" cellpadding="6px" cellspacing="0" width="800px">
      <tr>
       <td height="35px" align="right" valign="middle" width="100%">&nbsp;
       	
       </td>
      </tr>
      <tr>
   	   <td align="left" valign="top" width="100%">
       	<b><big>TAMBAH DATA BARANG</big></b><br><br>
        <?php echo $msg; ?><br><br>
       </td>
      </tr>
     </table>
     <?php
					}
			?>
  </td>
 </tr>
</table>

<?php
include "common/footer_admin.php";
?>
