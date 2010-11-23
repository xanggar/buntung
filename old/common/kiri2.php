<table cellpadding="0" cellspacing="0" width="100%" border="0" class="kotak_kiri">
	<tr><td height="25px"></td></tr>
	<!-- News -->
	<tr>
	 <td align="center" valign="top">
		 <table cellpadding="2px" cellspacing="0" width="100%" border="0">
			 <tr>
				 <td align="left" valign="top" width="10px"></td>
				 <td align="left" valign="top" width="180px" class="news">
					 <img src="images/account.png" align="absmiddle"> &nbsp; My Account
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
				<tr>
					<td align="left" valign="top" width="10px"></td>
					<td align="left" valign="top" width="180px">
						<img src="images/account2.png" align="absmiddle"> &nbsp;
						<a href="#" class="news2" onMouseOver="style.textDecoration='underline'" onMouseOut="style.textDecoration='none'">My BidBid</a>
					</td>
					<td align="left" valign="top" width="10px"></td>
				</tr>
				<tr><td colspan="3" height="10px"></td></tr>
				<tr>
					<td align="left" valign="top" width="10px"></td>
					<td align="left" valign="top" width="180px">
						<img src="images/account2.png" align="absmiddle"> &nbsp;
						<a href="purchase_bids.php?_page=account" class="news2" onMouseOver="style.textDecoration='underline'" onMouseOut="style.textDecoration='none'">Purchase Bids</a>
					</td>
					<td align="left" valign="top" width="10px"></td>
				</tr>
				<tr><td colspan="3" height="10px"></td></tr>
				<tr>
					<td align="left" valign="top" width="10px"></td>
					<td align="left" valign="top" width="180px">
						<img src="images/account2.png" align="absmiddle"> &nbsp;
						<a href="confirm_payment.php?_page=account" class="news2" onMouseOver="style.textDecoration='underline'" onMouseOut="style.textDecoration='none'">Confirm Payment</a>
					</td>
					<td align="left" valign="top" width="10px"></td>
				</tr>
				<tr><td colspan="3" height="10px"></td></tr>
				<tr>
					<td align="left" valign="top" width="10px"></td>
					<td align="left" valign="top" width="180px">
						<img src="images/account2.png" align="absmiddle"> &nbsp;
						<a href="#" class="news2" onMouseOver="style.textDecoration='underline'" onMouseOut="style.textDecoration='none'">My Bid</a>
					</td>
					<td align="left" valign="top" width="10px"></td>
				</tr>
				<tr><td colspan="3" height="10px"></td></tr>
				<tr>
					<td align="left" valign="top" width="10px"></td>
					<td align="left" valign="top" width="180px">
						<img src="images/account2.png" align="absmiddle"> &nbsp;
						<a href="#" class="news2" onMouseOver="style.textDecoration='underline'" onMouseOut="style.textDecoration='none'">My Robot BidBid</a>
					</td>
					<td align="left" valign="top" width="10px"></td>
				</tr>
				<tr><td colspan="3" height="10px"></td></tr>
				<tr>
					<td align="left" valign="top" width="10px"></td>
					<td align="left" valign="top" width="180px">
						<img src="images/account2.png" align="absmiddle"> &nbsp;
						<a href="#" class="news2" onMouseOver="style.textDecoration='underline'" onMouseOut="style.textDecoration='none'">Won Auction</a>
					</td>
					<td align="left" valign="top" width="10px"></td>
				</tr>
				<tr><td colspan="3" height="10px"></td></tr>
			</table>
		</td>
	</tr>
	<!-- News -->
	<tr><td height="25px"></td></tr>
	<!-- Statistik -->
	<tr>
	 <td align="center" valign="top">
		 <table cellpadding="2px" cellspacing="0" width="100%" border="0">
			 <tr>
				 <td align="left" valign="top" width="10px"></td>
				 <td align="left" valign="top" width="180px" class="news">
					 <img src="images/account4.png" align="absmiddle"> &nbsp; My Details
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
				<tr>
					<td align="left" valign="top" width="10px"></td>
					<td align="left" valign="top" width="180px">
						<img src="images/account3.png" align="absmiddle"> &nbsp;
						<a href="profile.php?_page=account" class="news2" onMouseOver="style.textDecoration='underline'" onMouseOut="style.textDecoration='none'">Edit Profile</a>
					</td>
					<td align="left" valign="top" width="10px"></td>
				</tr>
				<tr><td colspan="3" height="10px"></td></tr>
				<tr>
					<td align="left" valign="top" width="10px"></td>
					<td align="left" valign="top" width="180px">
						<img src="images/account3.png" align="absmiddle"> &nbsp;
						<a href="ubah_password.php?_page=account" class="news2" onMouseOver="style.textDecoration='underline'" onMouseOut="style.textDecoration='none'">Change Password</a>
					</td>
					<td align="left" valign="top" width="10px"></td>
				</tr>
				<tr><td colspan="3" height="30px"></td></tr>
				<tr>
					<td align="left" valign="top" width="10px"></td>
					<td align="left" valign="top" width="180px">
					 <?php
						$ang=mysql_fetch_array(mysql_query("SELECT idid, user_id FROM anggota WHERE user_id='".$SES_USERNAME."'"));
						?>
					 <b>Customer Number : <?php echo $ang[idid]; ?> </b>
					</td>
					<td align="left" valign="top" width="10px"></td>
				</tr>
			</table>
		</td>
	</tr>
	<tr><td height="25px"></td></tr>
</table>













