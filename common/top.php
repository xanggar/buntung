<?php
 include "common/session.php";
 include "common/config.php";
 include "common/function.php";
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title><?php echo $namaweb."-".$slogan; ?></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link rel="stylesheet" type="text/css" media="all" href="css/reset.css" />
<link rel="stylesheet" type="text/css" media="all" href="css/960.css" />
<link rel="stylesheet" type="text/css" media="all" href="css/defaultstyle.css" />

<link rel="alternate stylesheet" type="text/css" media="screen" title="blue-theme" href="css/blue_styles.css" />
<link rel="alternate stylesheet" type="text/css" media="screen" title="coffeetan-theme" href="css/coffeetan_styles.css" />
<link rel="alternate stylesheet" type="text/css" media="screen" title="darkbrown-theme" href="css/darkbrown_styles.css" />
<link rel="alternate stylesheet" type="text/css" media="screen" title="green-theme" href="css/green_styles.css" />

<link rel="alternate stylesheet" type="text/css" media="screen" title="grey-theme" href="css/grey_styles.css" />
<link rel="alternate stylesheet" type="text/css" media="screen" title="ivory-theme" href="css/ivory_styles.css" />
<link rel="alternate stylesheet" type="text/css" media="screen" title="orange-theme" href="css/orange_styles.css" />
<link rel="alternate stylesheet" type="text/css" media="screen" title="red-theme" href="css/red_styles.css" />
<link rel="alternate stylesheet" type="text/css" media="screen" title="vista-theme" href="css/vista_styles.css" />
<script src="styleswitch.js" type="text/javascript">
</script>

<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquery.innerfade.js"></script>
<script type="text/javascript">
		$(document).ready(
		function(){
			$('ul#portfolio').innerfade({
				speed: 1000,
				timeout: 5000,
				type: 'sequence',
				containerheight: '220px'
			});
			
	});
	</script>

<link rel="stylesheet" href="css/reset_i.css"  type="text/css" media="all" />
<style type="text/css" media="screen, projection">
			@import url(css/jq_fade.css);
</style>		


<!--[if lt IE 7.]>
<script defer type="text/javascript" src="js/unitpngfix.js"></script>
<![endif]-->
<!-- <script type="text/javascript" src="js/jquery-1.2.6.pack.js"></script> -->

<script type="text/javascript" src="js/stepcarousel.js">

/***********************************************
* Step Carousel Viewer script- (c) Dynamic Drive DHTML code library (www.dynamicdrive.com)
* Visit ../../../dynamicDrive.com%20for%20hundreds%20of%20DHTML%20scripts
* This notice must stay intact for legal use
***********************************************/
</script>

<script src="js/hoverIntent.js" type="text/javascript"></script>
<script src="js/superfish.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function() {
        $('ul.sf-menu').superfish();
});
</script>


</head>
<body>

<?php
 include "common/menu.php";
?>


<div class="clear">&nbsp;</div>
<div class="mainheader">
      <div class="container_16">
            <!-- Slider Start-->
            <div class="grid_8 featured">
												
												<ul id="portfolio">			
													<?php
													$thum=mysql_query("SELECT a.id_product, b.id_product, b.nama_barang, b.gambar_barang, b.status, b.id_kategori FROM log a, product b WHERE a.id_product=b.id_product AND b.status <> '5' AND a.id_product <> '0'");
													while($thum2=mysql_fetch_array($thum))
													{
														if ($thum2[gambar_barang]!="")
														{ 
															$imgSize=getimagesize("images_product/$thum2[gambar_barang]");
															if ($imgSize[0]>300) //lebar
															{ 
																$lebar=300;
																$tinggi=$imgSize[1]*(1-(($imgSize[0]-$lebar)/$imgSize[0]));
																if ($tinggi>300)
																{ 
																	$tinggi=300;
																	$lebar=$imgSize[0]*(1-(($imgSize[1]-$tinggi)/$imgSize[1]));
																}
															}
															else if ($imgSize[1]>300) //tinggi
															{ 
																$tinggi=300;
																$lebar=$imgSize[0]*(1-(($imgSize[1]-$tinggi)/$imgSize[1]));
																if ($lebar>300)
																{ 
																	$lebar=300;
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
													<li>
														<a href="detail_barang.php?id=<?php echo $thum2[id_product]; ?>&ida=<?php echo $thum2[id_kategori]; ?>"><img width="<?php echo $lebar; ?>" height="<?php echo $tinggi; ?>" src="images_product/<?php echo $thum2['gambar_barang']; ?>" alt="<?php echo $thum2['nama_barang']; ?>" title="<?php echo $thum2['nama_barang']; ?>" /></a>
													</li>
													<?php
													}
													?>
												</ul>
												
												
            </div>
            <div class="grid_8 homeinfo">
                  <h1>Fantastic Entertainment <span>Shopping</span></h1>
                  <p class="textright">Sed sollicitudin suscipit purus. In non libero eu leo consectetur aliquam.Nulla Fusce etlibero. Maurismattis. Duis vulpu acilisi cods. </p>
                   <?php if(empty($USERNAME)) { ?><a href="register.php" class="tourbutton tb10 rightalign"></a> <?php } ?> </div>
      </div>
</div>


<div class="clear">&nbsp;</div>
<div class="container_16">
      <!-- 4 Blocks -->
      <div class="grid_4 fbox"> <img src="images/web.png" alt="" class="leftalign" />
            <h6><a href="register.php" class="link_atas">Register Now</a></h6>
            <p><small>Vestibulum blandit Sedeuism od enimeleifend inter.</small></p>
      </div>
      <div class="grid_4 fbox"> <img src="images/print.png" alt="" class="leftalign" />
            <h6><a href="how.php">How does it work?</a></h6>
            <p><small>aoreetet congueeu osuere sit ametelit Sondimentum.</small></p>
      </div>
      <div class="grid_4 fbox"> <img src="images/multimedia.png" alt="" class="leftalign" />
            <h6><a href="news.php?_page=news">Berita Buntung</a></h6>
            <p><small>Loremipsum dolor sit amet, consectetur adipiscing elit.</small></p>
      </div>
      <div class="grid_4 fbox"> <img src="images/seo.png" alt="" class="leftalign" />
            <h6><a href="term.php"> Terms Conditions</a></h6>
            <p><small>Nulla Fusce etlibero. Mauri smattis Duis vulpu acilisi cods.</small></p>
      </div>
      <!-- 4 Blocks -->
</div>
