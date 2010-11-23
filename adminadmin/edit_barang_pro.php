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
					$kategori_barang = val_post('kategori_barang', 'int');
					$qf="SELECT * FROM spesifikasi WHERE id_kategori_barang='".$kategori_barang."' ORDER BY nama_spek";
					$subkategori = val_post('subkategori', 'int');
					$merk = val_post('merk', 'int');
					$nama = val_post('nama', 'text');
					$ket_sub = val_post('ket_sub', 'text');
					$ket_pro=str_replace("'", "", $_POST[ket_pro]);
					$ket_pro=str_replace("\r\n", "<br>", $ket_pro);
					$matauang = val_post('matauang', 'int');
					$harga=str_replace(".", "", $_POST[harga]);
					$tambah_harga=str_replace(".", "", $_POST[tambah_harga]);
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
					$valid_harga="^[0-9]{1,}$";
					if ($nama!="")
					{ $hoh="SELECT * FROM product WHERE id_product <>'".$_GET['id_product']."' AND nama_barang='".$nama."'";
							$ooo=mysql_query($hoh);
							$found=mysql_num_rows($ooo);
							}
					else
					{ $found=0;
							}
					if (empty($kategori))
					{ $msg="<font color='#ff0000'><b>Edit Barang Bermasalah:</b></font> &nbsp;
													Anda harus memilih kategori utama untuk memasukan barang baru.
													<br><br><br><a href='javascript:history.back(-1)'>Halaman sebelumnya</a>
													";
							}
					else if (empty($nama))
					{ $msg="<font color='#ff0000'><b>Edit Barang Bermasalah:</b></font> &nbsp;
													Anda harus memasukan nama barang untuk memasukan barang baru.
													<br><br><br><a href='javascript:history.back(-1)'>Halaman sebelumnya</a>
													";
							}
					else if ($found>0)
					{ $msg="<font color='#ff0000'><b>Edit Barang Bermasalah:</b></font> &nbsp;
													Nama barang yang Anda masukan sudah pernah dimasukan sebelumnya.
													<br><br><br><a href='javascript:history.back(-1)'>Halaman sebelumnya</a>
													";
							}
					else if (empty($ket_pro))
					{ $msg="<font color='#ff0000'><b>Edit Barang Bermasalah:</b></font> &nbsp;
													Anda harus memasukan keterangan lengkap barang untuk memasukan barang baru.
													<br><br><br><a href='javascript:history.back(-1)'>Halaman sebelumnya</a>
													";
							}
					else if (empty($harga) || $harga==0)
					{ $msg="<font color='#ff0000'><b>Edit Barang Bermasalah:</b></font> &nbsp;
													Anda harus memasukan harga barang untuk memasukan barang baru.
													<br><br><br><a href='javascript:history.back(-1)'>Halaman sebelumnya</a>
													";
							}
					else if (!eregi($valid_harga, $harga))
					{ $msg="<font color='#ff0000'><b>Edit Barang Bermasalah:</b></font> &nbsp;
													Harga barang yang Anda masukan tidak umum.
													<br><br><br><a href='javascript:history.back(-1)'>Halaman sebelumnya</a>
													";
							}
					else
					{ if(empty($name))
							{ $query="UPDATE product SET nama_barang='$nama', keterangan='$ket_pro', jumlah_poin='".$_POST[poin]."', ";
									$query.="idmatauang='$matauang', harga='$harga', tambah_harga='$tambah_harga', id_kategori='$kategori', tanggal='".$_POST[tanggal_bid]."', jumlah_minimal_koin='".$_POST[jumlah_poin]."' ";
									$query.="WHERE id_product='".$_GET['id_product']."'";
									$result=mysql_query($query);
									if($result)
									{ 
											$msg="<font color='#ff0000'><b>Edit Barang Sukses:</b></font> &nbsp;
																	Data barang telah berhasil diubah.
																	<br><br><br><a href='lihat_barang.php'>Lihat semua barang</a>
																	";
											}
									else
									{ $msg="<font color='#ff0000'><b>Edit Barang Bermasalah:</b></font> &nbsp;
																	Data barang tidak dapat diubah karena sambungan internet bermasalah. Mohon periksa sambungan internet Anda dan coba kembali.
																	<br><br><br><a href='javascript:history.back(-1)'>Halaman sebelumnya</a>
																	";
											}
									}
							else
							{
         $tmp_name=$_FILES["gambar"]["tmp_name"];
									$type=$_FILES["gambar"]["type"];
									if ($type!="image/gif" && $type!="image/pjpeg" && $type!="image/jpeg" && $type!="image/jpg" && $type!="image/png")
									{ $msg="<font color='#ff0000'><b>Tambah Barang Bermasalah:</b></font> &nbsp;
																	Foto/gambar barang yang Anda masukan harus berbentuk JPG, GIF atau PNG.
																	<br><br><br><a href='javascript:history.back(-1)'>Halaman sebelumnya</a>
																	";
											}	
									else	
									{					  
									$namafile=date("Ymdhis").strtolower($name);
									if (move_uploaded_file($tmp_name, "../images_product/".$namafile))
									{ chmod ("../images_product/$namafile", 0777);
											$query="UPDATE product SET nama_barang='$nama', keterangan='$ket_pro', jumlah_poin='".$_POST[poin]."', ";
											$query.="idmatauang='$matauang', harga='$harga', tambah_harga='$tambah_harga', id_kategori='$kategori', gambar_barang='".$namafile."', tanggal='".$_POST[tanggal_bid]."', jumlah_minimal_koin='".$_POST[jumlah_poin]."' ";
											$query.="WHERE id_product='".$_GET['id_product']."'";
											$result=mysql_query($query);
											if($result)
											{ 
													$msg="<font color='#ff0000'><b>Edit Barang Sukses:</b></font> &nbsp;
																			Data barang telah berhasil diubah.
																			<br><br><br><a href='lihat_barang.php'>Lihat semua barang</a>
																			";
													}
											else
											{ $msg="<font color='#ff0000'><b>Edit Barang Bermasalah:</b></font> &nbsp;
																			Data barang tidak dapat diubah karena sambungan internet bermasalah. Mohon periksa sambungan internet Anda dan coba kembali.
																			<br><br><br><a href='javascript:history.back(-1)'>Halaman sebelumnya</a>
																			";
													$msg.=$query."<br>".mysql_error();
													}
											}
									else
									{ $msg="<font color='#ff0000'><b>Edit Barang Bermasalah:</b></font> &nbsp;
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
       	<b><big>EDIT DATA BARANG</big></b><br><br>
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