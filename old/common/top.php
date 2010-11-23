<?php 
 include "autentifikasi.php";
 include "common/config.php";
 include "common/function.php";
	
	
	function describe($source, $num_word, $start_from)
	{ $text_array=$source;
			return implode(" ", array_slice($text_array, $start_from, $num_word));
			}
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $namaweb; ?> - <?php echo $slogan; ?></title>
<link href="style/style.css" rel="stylesheet" type="text/css">

<link rel="stylesheet" type="text/css" media="all" href="skins/aqua/theme.css" title="Aqua" />

<style type="text/css" media="screen">
H1 { margin-bottom: 2px; }

DIV#home {
border: 1px solid #ccc;
width: 600px;
height: 512px;
overflow: hidden;
}

DIV#term {
border: 1px solid #ccc;
width: 600px;
height: 512px;
overflow: hidden;
}

DIV#home.loading {
background: url(images/loader.white.gif) no-repeat center center;
}

DIV#term.loading {
background: url(images/loader.white.gif) no-repeat center center;
}

</style>

<script src="script/jquery.js" type="text/javascript"></script>


<script type="text/javascript">
<!--
$(function () {
var img = new Image();
$(img).load(function () {
//$(this).css('display', 'none'); // .hide() doesn't work in Safari when the element isn't on the DOM already
$(this).hide();
$('#home').removeClass('loading').append(this);
$(this).fadeIn();
}).error(function () {
// notify the user that the image could not be loaded
}).attr('src', 'images/promo.jpg');
});

$(function () {
var img = new Image();
$(img).load(function () {
//$(this).css('display', 'none'); // .hide() doesn't work in Safari when the element isn't on the DOM already
$(this).hide();
$('#term').removeClass('loading').append(this);
$(this).fadeIn();
}).error(function () {
// notify the user that the image could not be loaded
}).attr('src', 'images/term.jpg');
});

//-->
</script>


<script type="text/javascript" src="calendar.js"></script>
<script type="text/javascript" src="lang/calendar-en.js"></script>

				<script language="javascript">
				var oldLink = null;
				// code to change the active stylesheet
				function setActiveStyleSheet(link, title) {
						var i, a, main;
						for(i=0; (a = document.getElementsByTagName("link")[i]); i++) {
								if(a.getAttribute("rel").indexOf("style") != -1 && a.getAttribute("title")) {
										a.disabled = true;
										if(a.getAttribute("title") == title) a.disabled = false;
								}
						}
						if (oldLink) oldLink.style.fontWeight = 'normal';
						oldLink = link;
						link.style.fontWeight = 'bold';
						return false;
				}
				
				// This function gets called when the end-user clicks on some date.
				function selected(cal, date) {
						cal.sel.value = date; // just update the date in the input field.
						if (cal.dateClicked && (cal.sel.id == "sel1" || cal.sel.id == "sel3"))
								// if we add this call we close the calendar on single-click.
								// just to exemplify both cases, we are using this only for the 1st
								// and the 3rd field, while 2nd and 4th will still require double-click.
								cal.callCloseHandler();
				}
				
				// And this gets called when the end-user clicks on the _selected_ date,
				// or clicks on the "Close" button.  It just hides the calendar without
				// destroying it.
				function closeHandler(cal) {
						cal.hide();                        // hide the calendar
				//  cal.destroy();
						_dynarch_popupCalendar = null;
				}
				
				// This function shows the calendar under the element having the given id.
				// It takes care of catching "mousedown" signals on document and hiding the
				// calendar if the click was outside.
				function showCalendar(id, format, showsTime, showsOtherMonths) {
						var el = document.getElementById(id);
						if (_dynarch_popupCalendar != null) {
								// we already have some calendar created
								_dynarch_popupCalendar.hide();                 // so we hide it first.
						} else {
								// first-time call, create the calendar.
								var cal = new Calendar(1, null, selected, closeHandler);
								// uncomment the following line to hide the week numbers
								// cal.weekNumbers = false;
								if (typeof showsTime == "string") {
										cal.showsTime = true;
										cal.time24 = (showsTime == "24");
								}
								if (showsOtherMonths) {
										cal.showsOtherMonths = true;
								}
								_dynarch_popupCalendar = cal;                  // remember it in the global var
								cal.setRange(1900, 2070);        // min/max year allowed.
								cal.create();
						}
						_dynarch_popupCalendar.setDateFormat(format);    // set the specified date format
						_dynarch_popupCalendar.parseDate(el.value);      // try to parse the text in field
						_dynarch_popupCalendar.sel = el;                 // inform it what input field we use
				
						// the reference element that we pass to showAtElement is the button that
						// triggers the calendar.  In this example we align the calendar bottom-right
						// to the button.
						_dynarch_popupCalendar.showAtElement(el.nextSibling, "Br");        // show the calendar
				
						return false;
				}
				
				
				var MINUTE = 60 * 1000;
				var HOUR = 60 * MINUTE;
				var DAY = 24 * HOUR;
				var WEEK = 7 * DAY;
				
				// If this handler returns true then the "date" given as
				// parameter will be disabled.  In this example we enable
				// only days within a range of 10 days from the current
				// date.
				// You can use the functions date.getFullYear() -- returns the year
				// as 4 digit number, date.getMonth() -- returns the month as 0..11,
				// and date.getDate() -- returns the date of the month as 1..31, to
				// make heavy calculations here.  However, beware that this function
				// should be very fast, as it is called for each day in a month when
				// the calendar is (re)constructed.
				function isDisabled(date) {
						var today = new Date();
						return (Math.abs(date.getTime() - today.getTime()) / DAY) > 10;

				}
				
				function flatSelected(cal, date) {
						var el = document.getElementById("preview");
						el.innerHTML = date;
				}
				
				function showFlatCalendar() {
						var parent = document.getElementById("display");
				
						// construct a calendar giving only the "selected" handler.
						var cal = new Calendar(0, null, flatSelected);
				
						// hide week numbers
						cal.weekNumbers = false;
				
						// We want some dates to be disabled; see function isDisabled above
						cal.setDisabledHandler(isDisabled);
						cal.setDateFormat("%A, %B %e");
				
						// this call must be the last as it might use data initialized above; if
						// we specify a parent, as opposite to the "showCalendar" function above,
						// then we create a flat calendar -- not popup.  Hidden, though, but...
						cal.create(parent);
				
						// ... we can show it here.
						cal.show();
				}
					
				</script>



</head>

<body style="background-color:#000000" topmargin="0px" onLoad="setCountDown();">
<center>
<table cellpadding="0" cellspacing="0" border="0" width="851px" style="background-color:#ffffff">
	<tr>
		<td align="center" valign="top">
			<table cellpadding="0" cellspacing="0" width="851px" height="269px" border="0" style="background-image:url(images/bidfhome22.jpg)">
				<tr>
				 <td align="left" valign="top" height="50px">
				  <table cellpadding="0" cellspacing="0" border="0" width="100%">
						 <tr>
							 <td>&nbsp;</td>
							</tr>
						 <tr>
							 <td width="5%">&nbsp;</td>
							 <td width="95%" align="left" valign="bottom" class="angka_atas">
								 <?php
									 $ju=mysql_num_rows(mysql_query("SELECT username FROM member"));
										$angkaangka=$defa+$ju;
										$angka=$angkaangka;
										
										$angka=str_replace("0","<img src='images/0.png' align='absmiddle'> ", $angka);
										$angka=str_replace("1","<img src='images/1.png' align='absmiddle'> ", $angka);
										$angka=str_replace("2","<img src='images/2.png' align='absmiddle'> ", $angka);
										$angka=str_replace("3","<img src='images/3.png' align='absmiddle'> ", $angka);
										$angka=str_replace("4","<img src='images/4.png' align='absmiddle'> ", $angka);
										$angka=str_replace("5","<img src='images/5.png' align='absmiddle'> ", $angka);
										$angka=str_replace("6","<img src='images/6.png' align='absmiddle'> ", $angka);
										$angka=str_replace("7","<img src='images/7.png' align='absmiddle'> ", $angka);
										$angka=str_replace("8","<img src='images/8.png' align='absmiddle'> ", $angka);
										$angka=str_replace("9","<img src='images/9.png' align='absmiddle'> ", $angka);
										echo $angka." "."Members Now";
									?>
								</td>
							</tr>
						</table>
				 </td>
				</tr>
				<tr>
				 <td height="169px" valign="top" align="right">
				  <table cellpadding="0" cellspacing="0" width="100%" border="0">
						 <tr>
							 <!-- Menu -->
							 <td align="right" valign="top">
								 <table cellpadding="0" cellspacing="0" width="162px" border="0">
									 <tr <?php if(!empty($_GET[_hal])) { ?> style="background-image:url(images/menu1.png)" <?php } else { ?> style="background-image:url(images/menu2.png)" <?php } ?>>
										 <td align="left" valign="top" colspan="2">
											 <table cellpadding="0" cellspacing="0" border="0" width="100%">
												 <tr>
														<td width="7%" align="left" valign="middle">&nbsp;</td>
														<td width="93%" height="25px" align="left" valign="middle"><a href="index.php" class="menu_atas" onMouseOver="style.textDecoration='underline'" onMouseOut="style.textDecoration='none'">Home</a></td>
													</tr>
												</table>
											</td>
										</tr>
										<?php
										if(empty($username))
										{
										?>
										<tr><td height="5px" colspan="2"></td></tr>
									 <tr <?php if($_GET[_hal]=="regis") { ?> style="background-image:url(images/menu2.png)" <?php } else { ?> style="background-image:url(images/menu1.png)" <?php } ?>>
										 <td align="left" valign="top" colspan="2">
											 <table cellpadding="0" cellspacing="0" border="0" width="100%">
												 <tr>
														<td width="7%" align="left" valign="middle">&nbsp;</td>
														<td width="93%" height="25px" align="left" valign="middle"><a href="register1.php?_hal=regis" class="menu_atas" onMouseOver="style.textDecoration='underline'" onMouseOut="style.textDecoration='none'">Register</a></td>
													</tr>
												</table>
											</td>
										</tr>
										<tr><td height="5px" colspan="2"></td></tr>
									 <tr <?php if($_GET[_hal]=="account") { ?> style="background-image:url(images/menu2.png)" <?php } else { ?> style="background-image:url(images/menu1.png)" <?php } ?>>
										 <td align="left" valign="top" colspan="2">
											 <table cellpadding="0" cellspacing="0" border="0" width="100%">
												 <tr>
														<td width="7%" align="left" valign="middle">&nbsp;</td>
														<td width="93%" height="25px" align="left" valign="middle"><a href="login.php?_hal=account" class="menu_atas" onMouseOver="style.textDecoration='underline'" onMouseOut="style.textDecoration='none'">My Account</a></td>
													</tr>
												</table>
											</td>
										</tr>
										<?php
										}
										else
										{
										?>
										<tr><td height="5px" colspan="2"></td></tr>
									 <tr <?php if($_GET[_hal]=="account") { ?> style="background-image:url(images/menu2.png)" <?php } else { ?> style="background-image:url(images/menu1.png)" <?php } ?>>
										 <td align="left" valign="top" colspan="2">
											 <table cellpadding="0" cellspacing="0" border="0" width="100%">
												 <tr>
														<td width="7%" align="left" valign="middle">&nbsp;</td>
														<td width="93%" height="25px" align="left" valign="middle"><a href="main_menu.php?_hal=account" class="menu_atas" onMouseOver="style.textDecoration='underline'" onMouseOut="style.textDecoration='none'">My Account</a></td>
													</tr>
												</table>
											</td>
										</tr>
										<?php
										}
										?>
										<tr><td height="5px" colspan="2"></td></tr>
									 <tr <?php if($_GET[_hal]=="term") { ?> style="background-image:url(images/menu2.png)" <?php } else { ?> style="background-image:url(images/menu1.png)" <?php } ?>>
										 <td align="left" valign="top" colspan="2">
											 <table cellpadding="0" cellspacing="0" border="0" width="100%">
												 <tr>
														<td width="7%" align="left" valign="middle">&nbsp;</td>
														<td width="93%" height="25px" align="left" valign="middle"><a href="term_condition.php?_hal=term" class="menu_atas" onMouseOver="style.textDecoration='underline'" onMouseOut="style.textDecoration='none'">Term & Condition</a></td>
													</tr>
												</table>
											</td>
										</tr>
										<?php
										if(!empty($username))
										{
										?>
										<tr><td height="5px" colspan="2"></td></tr>
									 <tr style="background-image:url(images/menu1.png)">
										 <td align="left" valign="top" colspan="2">
											 <table cellpadding="0" cellspacing="0" border="0" width="100%">
												 <tr>
														<td width="7%" align="left" valign="middle">&nbsp;</td>
														<td width="93%" height="25px" align="left" valign="middle"><a href="logout.php" class="menu_atas" onMouseOver="style.textDecoration='underline'" onMouseOut="style.textDecoration='none'">Logout</a></td>
													</tr>
												</table>
											</td>
										</tr>
										<?php
										}
										?>
									</table>
								</td>
								<!-- menu -->
							 <td width="20px">&nbsp;</td>
							</tr>
						</table>
				 </td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td align="right" valign="top">
			<table cellpadding="0" cellspacing="0" border="0" width="851px" bgcolor="#ffffff">
				<tr>
					<td align="center" valign="top">
					 <table cellpadding="0" cellspacing="0" border="0" width="840px" height="100px">
						 <tr>
							 <td class="kotak" align="center" valign="top">
								 <table cellpadding="0" cellspacing="0" border="0" width="100%" height="100%">
									 <tr>
										 <td width="30px">&nbsp;</td>
										 <td width="250px" align="center" valign="top">
											 <table cellpadding="0" cellspacing="0" width="100%" border="0">
												 <tr>
													 <td align="left" valign="middle" class="menu_item">
														 <font class="angka">1</font> Register
														</td>
													</tr>
												 <tr>
													 <td align="left" valign="top" class="menu_item2">
														 Daftarkan diri anda sekarang
														</td>
													</tr>
												</table>
											</td>
										 <td width="10px">&nbsp;</td>
										 <td width="250px" align="center" valign="top">
											 <table cellpadding="0" cellspacing="0" width="100%" border="0">
												 <tr>
													 <td align="left" valign="top" class="menu_item">
														 <font class="angka">2</font> Invite Friends
														</td>
													</tr>
												 <tr>
													 <td align="left" valign="top" class="menu_item2">
														 Ajak teman-teman kamu untuk bergabung dengan <?php echo $namaweb; ?>
														</td>
													</tr>
												</table>
											</td>
										 <td width="10px">&nbsp;</td>
										 <td width="250px" align="center" valign="top">
											 <table cellpadding="0" cellspacing="0" width="100%" border="0">
												 <tr>
													 <td align="left" valign="top" class="menu_item">
														 <font class="angka">3</font> Win The Price
														</td>
													</tr>
												 <tr>
													 <td align="left" valign="top" class="menu_item2">
														 Nikmati hadiah menarik dari <?php echo $namaweb; ?>.
														</td>
													</tr>
												</table>
											</td>
										 <td width="10px">&nbsp;</td>
										 <td width="30px">&nbsp;</td>
										</tr>
									</table>
								</td>
							</tr>
						</table>
					</td>
				</tr>
			</table>
		</td>
	</tr>
</table>


