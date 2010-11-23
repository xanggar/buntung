<?php
include "common/top_admin.php";
?>
<table width="800px" cellpadding="8px" cellspacing="0" border="0">
  <tr>
    <td align="center" valign="middle">
      <?php
      if (!authen())
      {
        ?>
        <font color="#ff0000"><b><big><br># Halaman Error #</big></b></font><br><br>
        Anda harus login untuk mengakses halaman ini.<br><br><br>
        <a href="login.php" class="link_biru">Klik untuk login</a>
        <?php
      }
      else
      {
        ?>
        <table border="0" cellpadding="6px" cellspacing="0" width="800px">
          <tr>
            <td align="center" valign="middle" width="100%">
              <table border="0" cellpadding="5px" cellspacing="1px" style="border:1px solid #acbccc" width="100%">
                <tr bgcolor="#efefff">
                  <td align="center" valign="middle" width="5%" height="45px"><b>No.</b></td>
                  <td align="center" valign="middle" width="28%"><b>Gambar/Foto</b></td>
                  <td align="center" valign="middle" width="10%"><b>Tambah Gambar</b></td>
                  <td align="center" valign="middle" width="10%"><b>Jumlah Poin</b></td>
                  <td align="center" valign="middle" width="20%"><b>Nama Barang</b></td>
                  <td align="center" valign="middle" width="10%px"><b>Aksi</b></td>
                </tr>
                <?php
                $abc="SELECT * FROM product ORDER BY nama_barang ASC";
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
                $abc2="SELECT * FROM product ORDER BY nama_barang ASC LIMIT $offset, $limit";
                $res2=mysql_query($abc2);
                $jumlah2=mysql_num_rows($res2);
                if($jumlah2>0)
                {
                  $n=$offset+1;
                  $bg=0;
                  while($row=mysql_fetch_array($res2))
                  {
                    if ($bg==0)
                    {
                      $bgcolor="#ffffff";
                      $bg++;
                    }
                    else
                    { $bgcolor="#efefef";
                      $bg--;
                    }
                    if ($row['gambar_barang']!="")
                    {
                      $imgSize=getimagesize("../images_product/".$row['gambar_barang']);
                      if ($imgSize[0]>120) //lebar
                      {
                        $lebar=120;
                        $tinggi=$imgSize[1]*(1-(($imgSize[0]-$lebar)/$imgSize[0]));
                        if ($tinggi>120)
                        {
                          $tinggi=120;
                          $lebar=$imgSize[0]*(1-(($imgSize[1]-$tinggi)/$imgSize[1]));
                        }
                      }
                      else if ($imgSize[1]>120) //tinggi
                      {
                        $tinggi=120;
                        $lebar=$imgSize[0]*(1-(($imgSize[1]-$tinggi)/$imgSize[1]));
                        if ($lebar>120)
                        {
                          $lebar=120;
                          $tinggi=$imgSize[1]*(1-(($imgSize[0]-$lebar)/$imgSize[0]));
                        }
                      }
                      else
                      {
                        $tinggi=$imgSize[1];
                        $lebar=$imgSize[0];
                      }
                    }
                    ?>
                    <tr bgcolor="<?php echo $bgcolor; ?>">
                      <td align="center" valign="middle"><?php echo $n ?>.</td>
                      <td align="center" valign="middle">
																						<a href="../images_product/<?php echo $row['gambar_barang']; ?>" rel="lightbox[gallery]" title="<?php echo $row['nama_barang']; ?>"><img width="<?php echo $lebar; ?>" height="<?php echo $tinggi; ?>" src="../images_product/<?php echo $row['gambar_barang']; ?>"></a>
																						<?php
																						if(!empty($row['gambar_barang2'])||!empty($row['gambar_barang3']))
																						{
																						?>
																						<br /><br /><br />
																						<img style="cursor:pointer" align="absmiddle" src="images/hapus.png" onclick="document.location='hapus_gambar.php?id=<?php echo $row['id_product']; ?>'" />
																						2: <a href="../images_product/<?php echo $row['gambar_barang2']; ?>"><?php echo $row['gambar_barang2']; ?></a>
																						<?php	
																						if(!empty($row['gambar_barang3']))
																						{
																						?>
																						<br /><br />	
																						<img style="cursor:pointer" align="absmiddle" src="images/hapus.png" onclick="document.location='hapus_gambar2.php?id=<?php echo $row['id_product']; ?>'" />
																						3: <a href="../images_product/<?php echo $row['gambar_barang3']; ?>"><?php echo $row['gambar_barang3']; ?></a>
																						<?php
																						}
																						}
																						?>
																						</td>
                      <td align="center" valign="middle">
																						<?php
																						if(empty($row['gambar_barang2']))
																						{
																						?>
																						<input type="button" value="Tambah Gambar" onclick="document.location='tambah_gambar.php?id=<?php echo $row['id_product']; ?>'" />
																						<?php
																						}
																						else if(empty($row['gambar_barang3']))
																						{
																						?>
																						<input type="button" value="Tambah Gambar" onclick="document.location='tambah_gambar2.php?id=<?php echo $row['id_product']; ?>'" />
																						<?php
																						}
																						?>
																						</td>
                      <td align="center" valign="middle"><?php echo $row['jumlah_poin']; ?></td>
                      <td align="left" valign="middle"><?php echo $row['nama_barang']; ?></td>
                      <td align="center" valign="middle">
                        <a href="edit_barang.php?id_product=<?php echo $row['id_product']; ?>" class="link_kecil">Edit</a>&nbsp;&nbsp;
                        <a href="konf_hapus_barang.php?id_product=<?php echo $row['id_product']; ?>" class="link_kecil">Hapus</a>
                      </td>
                    </tr>
                    <?php
                    $n++;
                  }
                }
                else
                {
                  ?>
                  <tr>
                    <td align="center" valign="middle" height="80px" colspan="5">
                      Tidak ada barang yang tersedia sampai saat ini.
                    </td>
                  </tr>
                  <?php
                }
                ?>
              </table>
              <?php
              if ($halaman>1)
              {
                ?>
                <p align="center">Halaman: &nbsp;
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
                </p>
                <?php
              }
              ?>
            </td>
          </tr>
        </table><br><br>
        <?php
      }
      ?>
    </td>
  </tr>
</table>
<?php
include "common/footer_admin.php";
?>
