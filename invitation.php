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
<h2>Invitation History</h2>
<p><strong>Ini adalah rangkuman dari undangan yang telah Anda kirimkan.</strong></p>

<!-- Contact Form Start -->

<table cellpadding="7px" cellspacing="0" width="100%" style="border:1px solid #acbccc">
 <tr>
	 <td align="center" valign="middle" width="50%"><b>Email/Username</b></td>
	 <td align="center" valign="middle" width="25%"><b>Status</b></td>
	 <td align="center" valign="middle" width="25%"><b>Action</b></td>
	</tr>
	<tr>
	 <td colspan="3">&nbsp;</td>
	</tr>
	<?php
	 $abc="SELECT * FROM member WHERE referal='$USERNAME' ORDER BY id_member ASC";
	 $res=mysql_query($abc);
	 $jumlah=mysql_num_rows($res);
	 $limit=10;
	 $offset = val_get('offset', 'int');
	 if (empty($offset))
	 { $offset = 0;
		 }
	 $halaman=intval($jumlah/$limit);
	 if($jumlah%$limit)
	 { $halaman++;
		 }
	 $abc2="SELECT * FROM member WHERE referal='$USERNAME' ORDER BY id_member ASC LIMIT $offset, $limit";
	 $res2=mysql_query($abc2);
	 $jumlah2=mysql_num_rows($res2);
	 if($jumlah2>0)
	 { $n=$offset+1;
	   while($row=mysql_fetch_array($res2))
		 {
	?>
 <tr>
	 <td style="padding-left:10px" align="left" valign="middle" width="50%">
		 <?php echo $row[email]." / <b>".$row[username]."</b>"; ?>
		</td>
	 <td align="center" valign="middle" width="25%">
		 <?php
			if($row[status]==1)
			{
			 echo "Aktif";
			}
			else
			{
			 echo "Belum Register";
			}
			?>
		</td>
	 <td align="center" valign="middle" width="25%">
		 <?php
			if($row[status]==1)
			{
			 echo "&nbsp;";
			}
			else
			{
			 echo "<a href='kirim_ulang.php?tok=$row[page]'>Resend</a>";
			}
			?>
		</td>
	</tr>
	<?php
	 }
	}
	?>
</table>
<br>
<center>
<?php
		for($i=1; $i<=$halaman; $i++)
		{ $newoffset=$limit*($i-1);
			if($offset!=$newoffset)
			{ echo "<a class='button2 centertalign' href=\"".$_SERVER['PHP_SELF']."?_page=myaccount&offset=$newoffset&halamanke=$i\" class=\"num\">$i</a> &nbsp; ";
				}
			else
			{ echo "<b>".$i."</b> &nbsp; ";
				}
		}
?>
</center>
<br /><br />
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
