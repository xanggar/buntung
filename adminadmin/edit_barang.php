<?php
include "common/top_admin.php";
?>

<table width="800px" cellpadding="8px" cellspacing="0" border="0">
 <tr>
  <td align="center" valign="middle">
			<?php
			if (!authen())
			{ ?>
					<font color="#ff0000"><b><big><br># Halaman Error #</big></b></font><br><br>
					Anda harus login untuk mengakses halaman ini.<br><br><br>
					<a href="login.php" class="link_biru">Klik untuk login</a>
     <?php
					}
			else
			{ ?>
     <table border="0" cellpadding="6px" cellspacing="0" width="800px">
      <tr>
       <td align="left" valign="middle" width="50%" height="35px">
       	<b><big>EDIT DATA BARANG</big></b>
       </td>
       <td align="right" valign="middle" width="50%">
       </td>
      </tr>
     </table>
     <table border="0" cellpadding="6px" cellspacing="0" width="800px">
      <tr>
   	   <td align="left" valign="top" width="100%">
								<script language="JavaScript">
         function checkNum(data)
          { // checks if all characters
            var valid = "0123456789.";
            var ok=1; var checktemp;
            for (var i=0; i<data.length; i++)
            { checktemp = "" + data.substring(i, i+1);
              if (valid.indexOf(checktemp) == "-1")
              return 0;
              }
            return 1;
            }
         function rupAmount(form, field) // idea by David Turley
         { Num1 = eval("document." + form + "." + field + ".value");
           Num2 = Num1.replace(/[.]/g, "");
           Num = ""+parseInt(Num2);
           var temp1 = "";
           var temp2 = "";
           if (checkNum(Num)!=0)
           { var count = 0;
             for (var k = Num.length-1; k >= 0; k--)
             { var oneChar = Num.charAt(k);
               if (count == 3)
               { temp1 += ".";
                 temp1 += oneChar;
                 count = 1;
                 continue;
                 }
               else
               { temp1 += oneChar;
                 count ++;
                 }
               }
             for (var k = temp1.length-1; k >= 0; k--)
             { var oneChar = temp1.charAt(k);
               temp2 += oneChar;
               }
             eval("document." + form + "." + field + ".value = '" + temp2 + "';");
             }
           }
        </script>
        <hr size="1px" color="#acbccc"><br>
								<?php
        $id_product=$_GET['id_product'];
        $qqq="SELECT * FROM product WHERE id_product='".$id_product."'";
        $rrr=mysql_query($qqq);
        $data=mysql_fetch_array($rrr);
        ?>
								<form name="ubah" id="ubah" enctype="multipart/form-data" method="post" action="edit_barang_pro.php?id_product=<?php echo $data['id_product']; ?>">
	     		 <table border="0" cellpadding="4px" cellspacing="0" width="100%">
          <tr>
           <td align="left" valign="middle">Kategori Utama</td>
           <td align="left" valign="middle">:</td>
           <td align="left" valign="middle">
            <select id="kategori" name="kategori">
            	<option value="">-- Klik untuk memilih --</option>
             <?php
             $sql="SELECT * FROM kategori ORDER BY deskripsi ASC";
             $res=mysql_query($sql);
             while ($datt=mysql_fetch_array($res))
             { ?>
               <option value="<?php echo trim($datt['id_kategori']);?>" <?php if ($datt['id_kategori']==$data['id_kategori']) { echo "selected"; } ?>><?php echo trim($datt['deskripsi']) ?></option>
               <?php
               }
             ?>
            </select>
           </td>
          </tr>
          <tr>
           <td align="left" valign="middle">Nama Barang</td>
           <td align="left" valign="middle">:</td>
           <td align="left" valign="middle">
            <input name="nama" type="text" size="54" value="<?php echo $data['nama_barang']; ?>">
           </td>
          </tr>
          <tr>
           <td align="left" valign="middle">Foto/Gambar</td>
           <td align="left" valign="middle">:</td>
           <td align="left" valign="middle">
            <input name="gambar" type="file" size="41"> &nbsp; <b><?php echo $data['gambar_barang']; ?></b><br>
            <small>* Kalau tidak berubah tidak perlu diisi.</small>
           </td>
          </tr>
										<?php 
										$how=str_replace("<br>", "\r\n", $data['keterangan']);
										?>
          <tr>
           <td align="left" valign="top">Keterangan Lengkap Barang</td>
           <td align="left" valign="top">:</td>
           <td align="left" valign="middle">
            <textarea rows="16" cols="51" name="ket_pro"><?php echo $how; ?></textarea>
           </td>
          </tr>
										<tr>
												<td align="left" valign="top">Jumlah Poin</td>
												<td align="left" valign="top">:</td>
												<td align="left" valign="middle">
														<input name="poin" type="text" value="<?php echo $data[jumlah_poin]; ?>" size="3"> Poin
												</td>
										</tr>
										<tr>
												<td align="left" valign="top">Jumlah Poin Minimal</td>
												<td align="left" valign="top">:</td>
												<td align="left" valign="middle">
														<input value="<?php echo $data[jumlah_minimal_koin]; ?>" name="jumlah_poin" type="text" size="3"> Poin (Jumlah Poin untuk Instant Buy)
												</td>
										</tr>
          <tr>
           <td align="left" valign="middle">Harga Awal</td>
           <td align="left" valign="middle">:</td>
           <td align="left" valign="middle">
           	<select name="matauang">
													<?php
             $qq="SELECT * FROM matauang ORDER BY idmatauang ASC";
             $rr=mysql_query($qq);
             while ($dd=mysql_fetch_array($rr))
             { echo "<option value='".$dd['idmatauang']."'>".$dd['matauang']."</option>";
															}
													?>
												</select>
            <?php
												if ($data['idmatauang']==1)
												{ $hargaok=number_format($data['harga'], 0, ",", ".");
														}
												else if ($data['idmatauang']==2)
												{ $hargaok=number_format($data['harga'], 2);
														}
												?>
												<input name="harga" type="text" size="23" value="<?php echo $hargaok; ?>" onkeyup="rupAmount('ubah', 'harga')">
           </td>
          </tr>
										<tr>
												<td align="left" valign="middle">Increase Price</td>
												<td align="left" valign="middle">:</td>
												<td align="left" valign="middle">
														<input name="tambah_harga" value="<?php echo number_format($data['tambah_harga'], 0, ",", "."); ?>" type="text" size="23" onkeyup="rupAmount('tambah', 'tambah_harga')">
												</td>
										</tr>
										<tr>
												<td align="left" valign="middle">Tanggal Tampil</td>
												<td align="left" valign="middle">:</td>
												<td align="left" valign="middle">
													<input value="<?php echo $data[tanggal]; ?>" type="text" name="tanggal_bid" id="sel3" size="15"
													><input type="reset" value=" ... "
													onclick="return showCalendar('sel3', '%Y-%m-%d');">																		
												</td>
										</tr>
          <tr>
           <td colspan="2"></td>
           <td align="left" valign="middle"><br>
            <input type="submit" value=" Ubah " style="cursor:pointer"> &nbsp; &nbsp;
            <input type="button" value=" Batal " onClick="javascript:history.back(-1)" style="cursor:pointer">
           </td>
          </tr>
         </table>
        </form>
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
