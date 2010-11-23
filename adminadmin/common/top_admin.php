<?php
session_name("AUTHENUSER");
session_start();
include 'common/function.php';
include "autentifikasi.php";
include "../common/config.php";

//Set all date and time to Jakarta time
date_default_timezone_set("Asia/Jakarta");
?>
<html>
  <head>
    <title><?php echo $namaweb; ?> - <?php echo $slogan; ?></title>
    <link href="style/style.css" rel="stylesheet" type="text/css">
				<link rel="stylesheet" type="text/css" media="all" href="skins/aqua/theme.css" title="Aqua" />
				<script type="text/javascript" src="calendar.js"></script>
				<script type="text/javascript" src="lang/calendar-en.js"></script>
				<script type="text/javascript" src="highslide/highslide-with-html.js"></script>
				
				<script type="text/javascript">
					hs.graphicsDir = 'highslide/graphics/';
					hs.outlineType = 'rounded-white';
					hs.outlineWhileAnimating = true;
				</script>
				
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
  <body topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0">
    <center>
    <table width="800px" cellpadding="6px" cellspacing="0" border="0" height="135px">
      <tr>
        <td align="left" valign="top" width="100%">
          <br><br><br>
          <a href="http://<?php echo $namaweb; ?>">Go to <?php echo $namaweb; ?></a> &nbsp; | &nbsp;
          <?php
          if (authen())
          {
            ?>
            <a href="logout.php"><b>Logout</b></a>
            <?php
          }
          ?>
        </td>
      </tr>
    </table>
    <table border="0" width="800px" cellpadding="5px" cellspacing="0">
      <tr>
        <td width="100%" align="right" valign="bottom" style="padding:0 0 0 0">
          <div id="container">
            <ul id='menu-1' class='menu'>
              <li><a href="index.php">&nbsp; Home &nbsp;</a></li>
                <li>
                  <a class="sub" href="#">Instant Buy</a>
                  <ul>
                    <li><a href="list_ib.php">List Instant Buy</a></li>
                    <li class="last"><a href="rekap_ib.php">Rekap Instant Buy</a></li>
                  </ul>
                </li>
                <li>
                  <a class="sub" href="#">Booking</a>
                  <ul>
                    <li><a href="list_booking.php">List Booking</a></li>
                    <li><a href="rekap_booking.php">Rekap Booking</a></li>
                    <li class="last"><a href="convert_dana.php">Convert Dana Konsumen</a></li>
                  </ul>
                </li>
                <li>
                  <a class="sub" href="#">Payment</a>
                  <ul>
                    <li><a href="payment_tranfer.php">Pemesanan Paket Poin</a></li>
                    <li class="last"><a href="withdraw.php">Withdraw Poin</a></li>
                  </ul>
                </li>
                <li>
                  <a class="sub" href="#">&nbsp;Katalog Barang&nbsp;</a>
                  <ul>
                    <li>
                      <a class="sub" href="#">Kategori Utama</a>
                      <ul>
                        <li><a href="lihat_kategori_utama.php">Lihat Semua</a></li>
                        <li class="last"><a href="add_kategori.php">Tambah</a></li>
                      </ul>
                    </li>
                    <li class="last">
                      <a class="sub" href="#">Barang</a>
                      <ul>
                        <li><a href="lihat_barang.php">Lihat Semua</a></li>
                        <li class="last"><a href="add_barang.php">Tambah</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li>
                  <a class="sub" href="#">&nbsp;Berita dan Kegiatan &nbsp;</a>
                  <ul>
                    <li><a href="lihat_news.php">Lihat Semua</a></li>
                    <li class="last"><a href="add_news.php">Tambah</a></li>
                  </ul>
                </li>
                <li>
                  <a class="sub" href="#">Packages</a>
                  <ul>
                    <li><a href="lihat_packages.php">Lihat Semua</a></li>
                    <li><a href="add_packages.php">Tambah Packages</a></li>
                    <li class="last"><a href="setting_harga_poin.php">Setting Harga Poin</a></li>
                  </ul>
                </li>
                <li>
                  <a class="sub" href="#">More Setting</a>
                  <ul>
                    <li><a href="contact_us.php">Contact Us</a></li>
                    <li><a href="how.php">How does it work</a></li>
                    <li><a href="term.php">Terms Conditions</a></li>
                    <li><a href="testi.php">Testimonial</a></li>
                    <li><a href="detail_contact.php">Detail Contact</a></li>
                    <li>
                      <a class="sub" href="#">Bank</a>
                      <ul>
                        <li><a href="lihat_bank.php">Lihat Semua</a></li>
                        <li class="last"><a href="add_bank.php">Tambah</a></li>
                      </ul>
                    </li>
                    <li><a href="welcome.php">Setting Welcome Note</a></li>
                    <li><a href="setting_email.php">Setting Email</a></li>
                    <li><a href="add_admin.php">Setting Admin</a></li>
                    <li class="last"><a href="about_us.php">Setting About Us</a></li>
                  </ul>
                </li>
            </ul>
          </div>
          <script type='text/javascript' src='script/prototype.js'></script>
          <script type='text/javascript' src='script/protofish.js'></script>
          <script type='text/javascript'>
            document.observe('dom:loaded', function(){
              new ProtoFish('menu-1', '800', 'hover', true, true, false);
            });
          </script>
        </td>
      </tr>
    </table>