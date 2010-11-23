<table cellpadding="0" cellspacing="0" width="100%" border="0" class="kotak_kiri">
 <!-- Login -->
 <tr>
	 <td align="center" valign="top" class="kotak_login">
		 <table cellpadding="2px" cellspacing="0" width="100%" border="0">
			 <tr><td colspan="3" height="10px"></td></tr>
			 <tr>
				 <td align="left" valign="top" width="30px"></td>
				 <td width="140px" align="left" valign="top" class="login">
					 Login
					</td>
				 <td align="left" valign="top" width="30px"></td>
				</tr>
			 <tr><td colspan="3" height="5px"></td></tr>
				<form action="ceklogin.php" method="post" style="margin:0 0 0 0">
			 <tr>
				 <td align="left" valign="top" width="30px"></td>
				 <td width="140px" align="left" valign="top" class="login2">
					 Username
					</td>
				 <td align="left" valign="top" width="30px"></td>
				</tr>
			 <tr>
				 <td align="left" valign="top" width="30px"></td>
				 <td width="140px" align="left" valign="top" class="login2">
					 <input name="username" type="text" size="31">
					</td>
				 <td align="left" valign="top" width="30px"></td>
				</tr>
			 <tr><td colspan="3" height="10px"></td></tr>
			 <tr>
				 <td align="left" valign="top" width="30px"></td>
				 <td width="140px" align="left" valign="top" class="login2">
					 Password
					</td>
				 <td align="left" valign="top" width="30px"></td>
				</tr>
			 <tr>
				 <td align="left" valign="top" width="30px"></td>
				 <td width="140px" align="left" valign="top" class="login2">
					 <input name="password" type="password" size="31">
					</td>
				 <td align="left" valign="top" width="30px"></td>
				</tr>
			 <tr><td colspan="3" height="10px"></td></tr>
			 <tr>
				 <td align="left" valign="top" width="30px"></td>
				 <td width="140px" align="right" valign="top" class="login2">
					 <input type="image" src="images/login.png" />
					</td>
				 <td align="left" valign="top" width="30px"></td>
				</tr>
				</form>
			 <tr><td colspan="3" height="10px"></td></tr>
			 <tr>
				 <td align="left" valign="top" width="10px"></td>
				 <td width="180px" align="right" valign="top" class="login2">
					 <a href="register.php?_page=regis" class="login3" onmouseover="style.textDecoration='underline'" onmouseout="style.textDecoration='none'">Register</a>
					</td>
				 <td align="left" valign="top" width="10px"></td>
				</tr>
			 <tr><td colspan="3" height="10px"></td></tr>
			 <tr>
				 <td align="left" valign="top" width="10px"></td>
				 <td width="180px" align="right" valign="top" class="login2">
					 <a href="forgetpassword.php" class="login3" onmouseover="style.textDecoration='underline'" onmouseout="style.textDecoration='none'">Forgot Password?</a>
					</td>
				 <td align="left" valign="top" width="10px"></td>
				</tr>
				<?php
				if(!empty($_GET[err]))
				{
				?>
			 <tr><td colspan="3" height="10px"></td></tr>
			 <tr>
				 <td align="left" valign="top" width="10px"></td>
				 <td width="180px" align="left" valign="top" class="login4">
						<?php
						if($_GET[err]==1) { echo "Username atau password Anda masih kosong"; }
						else if($_GET[err]==2) { echo "Username atau password Anda salah"; }
						else if($_GET[err]==3) { echo "Username atau password Anda salah"; }
						?>
					</td>
				 <td align="left" valign="top" width="10px"></td>
				</tr>
				<?php
				}
				?>
			 <tr><td colspan="3" height="15px"></td></tr>
			</table>
		</td>
	</tr>
	<!-- Login -->
	<tr><td height="25px"></td></tr>
	<!-- News -->
	<tr>
	 <td align="center" valign="top">
		 <table cellpadding="2px" cellspacing="0" width="100%" border="0">
			 <tr>
				 <td align="left" valign="top" width="10px"></td>
				 <td align="left" valign="top" width="180px" class="news">
					 <img src="images/news.png" align="absmiddle"> &nbsp; Lastest News
					</td>
					<td align="left" valign="top" width="10px"></td>
				</tr>
			 <tr>
				 <td align="left" valign="top" width="10px"></td>
				 <td align="left" valign="top" width="180px" class="news">
					 <hr>
					</td>
					<td align="left" valign="top" width="10px"></td>
				</tr>
				<?php
				$berita=mysql_query("SELECT * FROM berita_ringan ORDER BY tgl_berita DESC LIMIT 3");
				$berita2=mysql_num_rows($berita);
				if($berita>0)
				{
					while($berita3=mysql_fetch_array($berita))
					{
					?>
					<tr>
						<td align="left" valign="top" width="10px"></td>
						<td align="left" valign="top" width="180px">
							<li><a href="detail_berita.php?id_berita=<?php echo $berita3[brid]; ?>" class="news2" onMouseOver="style.textDecoration='underline'" onMouseOut="style.textDecoration='none'"><?php echo $berita3[judul_berita]; ?></a></li>
						</td>
						<td align="left" valign="top" width="10px"></td>
					</tr>
					<tr><td colspan="3" height="10px"></td></tr>
					<?php 
					}
				}
				else
				{
				?>
				<tr>
					<td align="left" valign="top" width="10px"></td>
					<td align="left" valign="top" width="180px" class="news2">
						Belum ada berita pada saat ini.
					</td>
					<td align="left" valign="top" width="10px"></td>
				</tr>
				<tr><td colspan="3" height="10px"></td></tr>
				<?php
				}
				if($berita>0)
				{
				?>
				<tr><td colspan="3"></td></tr>
				<tr>
					<td align="left" valign="top" width="10px"></td>
					<td align="left" valign="top" width="180px" class="news2">
						<img src="images/more.png" align="absmiddle" /> <a href="all_berita.php" class="news3" onMouseOver="style.textDecoration='underline'" onMouseOut="style.textDecoration='none'">Semua Berita</a>
					</td>
					<td align="left" valign="top" width="10px"></td>
				</tr>
				<?php
				}
				?>
				<tr><td colspan="3" height="10px"></td></tr>
			</table>
		</td>
	</tr>
	<!-- News -->
	<tr><td height="25px"></td></tr>
	<!-- Statistik -->
	<?php
	$members=mysql_fetch_array(mysql_query("SELECT * FROM default_members WHERE id_fm='1'"));
	$ol_member=mysql_fetch_array(mysql_query("SELECT * FROM default_ol_members WHERE id_om='1'"));
	?>
	<tr>
	 <td align="center" valign="top">
		 <table cellpadding="2px" cellspacing="0" width="100%" border="0">
			 <tr>
				 <td align="left" valign="top" width="10px"></td>
				 <td colspan="2" align="left" valign="top" width="180px" class="news">
					 <img src="images/statistik.png" align="absmiddle"> &nbsp; Statistic
					</td>
					<td align="left" valign="top" width="10px"></td>
				</tr>
			 <tr>
				 <td align="left" valign="top" width="10px"></td>
				 <td align="left" valign="top" width="180px" class="news" colspan="2">
					 <hr>
					</td>
					<td align="left" valign="top" width="10px"></td>
				</tr>
			 <tr>
				 <td align="left" valign="top" width="10px"></td>
				 <td align="left" valign="top" width="90px" class="news2">
					 Members
					</td>
				 <td align="center" valign="top" width="90px" class="news2">
					 <b><?php echo $members[jml_members]; ?></b>
					</td>
					<td align="left" valign="top" width="10px"></td>
				</tr>
				<tr><td colspan="4" height="10px"></td></tr>
			 <tr>
				 <td align="left" valign="top" width="10px"></td>
				 <td align="left" valign="top" width="90px" class="news2">
					 Product
					</td>
				 <td align="center" valign="top" width="90px" class="news2">
					 <b>33</b>
					</td>
					<td align="left" valign="top" width="10px"></td>
				</tr>
				<tr><td colspan="4" height="10px"></td></tr>
			 <tr>
				 <td align="left" valign="top" width="10px"></td>
				 <td align="left" valign="top" width="90px" class="news2">
					 Online Member
					</td>
				 <td align="center" valign="top" width="90px" class="news2">
					 <b><?php echo $ol_member[jml_ol_members]; ?></b>
					</td>
					<td align="left" valign="top" width="10px"></td>
				</tr>
				<tr><td colspan="4" height="10px"></td></tr>
			</table>
		</td>
	</tr>
	<!-- Statistik -->
	<tr><td height="25px"></td></tr>
</table>













