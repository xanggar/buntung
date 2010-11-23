<?php
include "../common/config.php";

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

if(empty($name))
{
 ?>
	<script language="javascript">
	 alert("Gambar masih kosong");
		document.location="javascript:history.back(-1)";
	</script>
	<?php
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
			if ((move_uploaded_file($tmp_name, "../images_product/".$namafile)))
			{ 
			 $qu="UPDATE product SET gambar_barang2='$namafile' WHERE id_product='$_GET[id]'";
				$qu2=mysql_query($qu);
				if($qu)
				{
					?>
					<script language="javascript">
						alert("Tambah Barang Sukes. Barang ini sudah mempunyai 2 gambar");
						document.location="lihat_barang.php";
					</script>
					<?php
				}
			}
		}
}
?>